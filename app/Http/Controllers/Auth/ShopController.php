<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\ItemCategory;
use App\ItemAttribute;
use Illuminate\Support\Facades\Storage;
use App\Enquiry;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    //
    public function shopItemCategories(){
        $itemCategories = ItemCategory::all();
        return view('auth.admin.shop.item_categories')->with(compact('itemCategories'));
    }

    public function deleteItemCategory(Request $request)
    {

        $category_id = $request->item_category_id;
        $category = ItemCategory::where(['id'=>$category_id])->delete();
        if($category){
            
            session()->flash('success', "Category Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete Category. possible internet error');
            return redirect()->back();
        }

    }


    public function addItemCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|unique:item_categories',
        ]);

        $category = new ItemCategory();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        if($category){
            session()->flash('success', 'Category Added successfully');
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to add Category, possible internet error');
            return redirect()->back();
        }
    }

    public function updateItemCategory(Request $request, $category_id)
    {
        
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);
       $category = ItemCategory::where(['id'=>$category_id])->update([
           'name' => $request->name,
           'description' => $request->description,
       ]);
       if($category){
           session()->flash('success', 'Category Updated successfully');
           return redirect()->back();
       }else{
           session()->flash('error', 'Unable to update Category, Possible internet error');
           return redirect()->back();
       }

    }


    public function allShopItems()
    {
        $shopItems = Item::all();
        $itemCategories = ItemCategory::all();
        return view('auth.admin.shop.shop_items')->with(compact('shopItems', 'itemCategories'));
    }

    public function deleteShopItem(Request $request)
    {

        $shop_item_id = $request->shop_item_id;
        $shopItem = Item::where(['id'=>$shop_item_id])->first();
        if($shopItem){
            //get the image and delete it from the server
            $item_image = $shopItem->avatar;
            unlink($item_image);

            //also look for this items images on the item attribute table and delete the images from the server
            $iAttributes = ItemAttribute::where(['item_id'=>$shop_item_id])->get();
            foreach($iAttributes as $attr){
                $images = $attr->the_image;
                //remove all of them from the server
                unlink($images);
                //delete all of them from the database
                $attr->delete();
            }
            //finally delete the shop item.
            $shopItem->delete();
            session()->flash('success', "shop Item Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete shop Item. possible internet error');
            return redirect()->back();
        }

    }


    public function addShopItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:items',
            'item_category' => 'required',
            'description' => 'required',
            'avatar'  => 'required|max:5068'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
         //Get all the clients uploaded files and validate them to make sure they are of correct type.
        $extension =$request->file('avatar')->getClientOriginalExtension();
        $allowedFileExtension=['jpg','png', 'jpeg', 'gif', 'svg'];
        $check = in_array($extension, $allowedFileExtension);

        if($check){
            $item = new Item();
            $item->name = $request->name;
            $item->description = $request->description;
            $item->url = Str::slug($request->name).'-'.time();
            $item->item_category_id = $request->item_category;
            if($request->hasFile('avatar')){
                 // filename with extension
                 $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
                 // filename
                 $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                 // extension
                 $extension = $request->file('avatar')->getClientOriginalExtension();
                 // filename to store
                 $fileNameToStore = $filename.'_'.time().'.'.$extension;
    
                 $path = $request->file('avatar')->move('avatars/items/', $fileNameToStore);
    
                 $path_name = $path->getPathname();
            }
            $item->avatar = $path_name;
            $item->save();
            session()->flash('success', 'Item Added successfully');
            return redirect()->back();

        }else{
            $validator->errors()->add('avatar', "Avatar Should be of either type , ['jpg','png','bmp', 'jpeg', 'gif', 'svg']");
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

       
        if($item){
            session()->flash('success', 'item Added successfully');
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to add item, possible internet error');
            return redirect()->back();
        }
    }

    public function updateShopItem(Request $request, $shop_item_id)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'item_category' => 'required',
            'description' => 'required',
            'avatar'  => 'max:5068'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
         //Give a default image extension of png
         $extension = $request->avatar == null ? 'png': $request->avatar->getClientOriginalExtension();
 
         $allowedFileExtension=['jpg','png', 'jpeg', 'gif', 'svg'];
         $check = in_array($extension, $allowedFileExtension);
         if($check){
            //Handle file upload for the avatar
            if($request->hasFile('avatar')){

                //get item old image and delete it from the server
                $char = Item::where(['id'=>$shop_item_id])->first();
                if($char){
                    $image = $char->avatar;
                    unlink($image);
                }

                // filename with extension
                $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
                // filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // extension
                $extension = $request->file('avatar')->getClientOriginalExtension();
                // filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;

                $path = $request->file('avatar')->move('avatars/items/', $fileNameToStore);

                $path_name = $path->getPathname();
            }
            // Incase no image was not selected when trying to update profile information, maintain the previous image.
            if(empty($path_name)){
                $the_path = Item::where(['id'=>$shop_item_id])->first();
                $get_path = $the_path->avatar;
                $path_name = $get_path;
            }
            Item::where(['id'=>$shop_item_id])->update([
                'name' => $request->name,
                'description' => $request->description,
                'url'  => Str::slug( $request->name).'-'.time(),
                'item_category_id' => $request->item_category,
                'avatar' => $path_name
            ]);
            session()->flash('success', 'item Updated successfully');
           return redirect()->back();
         }else{
            $validator->errors()->add('avatar', "Avatar Should be of either type , ['jpg','png','bmp', 'jpeg', 'gif', 'svg']");
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
         }
    }

    public function itemDetail($item_id){
        
        $item = Item::where(['id'=>$item_id])->first();
        if($item){
            //item images
            $iImages = ItemAttribute::where(['item_id'=>$item_id])->get();
            $itemCategories = ItemCategory::all();
            return view('auth.admin.shop.item-detail')->with(compact('item', 'iImages', 'itemCategories'));
        }else{
            abort(404);
        }
    }

    public function addItemAttribute(Request $request, $item_id) 
    {
        $validator = Validator::make($request->all(), [
            'filename' => 'required|max:5096',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        //GEt all the clients uploaded files and validate them to make sure they are of correct type.
        foreach ($request->filename as $file) {
            $extension =$file->getClientOriginalExtension();
        }
        $allowedFileExtension=['jpg','png', 'jpeg', 'gif', 'svg'];
        $check = in_array($extension, $allowedFileExtension);

        if($check){
            try{
                DB::beginTransaction();
                if ($request->hasFile('filename')) {
                    foreach ($request->filename as $file) {
                        $filename = $file->getClientOriginalName();
                        $extension = $file->getClientOriginalExtension();
        
                        $fileNameToStore = $filename.'.'.time().'.'.$extension;
                        $path = $file->move('avatars/item-image/', $fileNameToStore);
                        $path_name = $path->getPathname();
            
                        $attribute = new ItemAttribute();
            
                       
                        $attribute->item_id = $item_id;
                        $attribute->image_name = $filename;
                        $attribute->the_image = $path_name;
                        $attribute->save();
                    }
                
                }
                DB::commit();
                session()->flash('success', 'Item Images added successfully');
                return redirect()->back();
            }catch(\Illuminate\Database\QueryException $e){
                DB::rollBack();
                session()->flash('error', 'Unable to process Database query, Check and make sure your fields are all correct');
                return redirect()->back()->withInput();
            }
        }else{
            $validator->errors()->add('filename', "Item Images Should be of either type , ['jpg','png','bmp', 'jpeg', 'gif', 'svg']");
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        
    }

    public function allEnquiries()
    {
        $enquiries = Enquiry::orderBy('id','DESC')->get();
        return view('auth.admin.shop.enquiries')->with(compact('enquiries'));
    }

    public function deleteEnquiry(Request $request){

        $enquiry_id = $request->enquiry_id;
        $enquiry = Enquiry::where(['id'=>$enquiry_id])->delete();
        if($enquiry){
            
            session()->flash('success', "Enquiry Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete Enquiry. possible internet error');
            return redirect()->back();
        }

    }

    public function deleteItemImage(Request $request)
    {
        $image_id = $request->image_id;
        $img = ItemAttribute::where(['id'=>$image_id])->first();
        if($img){
            //get the image and delete it from the server
            $the_image = $img->the_image;
            unlink($the_image);
            $img->delete();
            session()->flash('success', 'Item Image deleted Successfully');
            return redirect()->back();
        }else{
            abort(404);
        }
    }

}
