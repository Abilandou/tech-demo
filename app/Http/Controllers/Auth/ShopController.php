<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Http\Request;
use App\ItemCategory;
use App\ItemAttribute;
use Illuminate\Support\Facades\Storage;
use App\Enquiry;

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

    public function deleteShopItem(Request $request){

        $shop_item_id = $request->shop_item_id;
        $shopItem = Item::where(['id'=>$shop_item_id])->delete();
        if($shopItem){
            
            session()->flash('success', "shop Item Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete shop Item. possible internet error');
            return redirect()->back();
        }

    }


    public function addShopItem(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|unique:items',
            'avatar' => 'required'
        ]);

        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->url = strtolower(str_replace(' ', '-', $request->name));
        $item->item_category_id = $request->item_category_id;
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
        
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);

         //Handle file upload for the avatar
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
       // Incase no image was not selected when trying to update profile information, maintain the previous image.
       if(empty($path_name)){
           $the_path = Item::where(['id'=>$shop_item_id])->first();
           $get_path = $the_path->avatar;
           $path_name = $get_path;
       }
       $item = Item::where(['id'=>$shop_item_id])->update([
           'name' => $request->name,
           'description' => $request->description,
           'url'  => strtolower(str_replace(' ', '-', $request->name)),
           'item_category_id' => $request->item_category_id,
           'avatar' => $path_name
       ]);
       if($item){
           session()->flash('success', 'item Updated successfully');
           return redirect()->back();
       }else{
           session()->flash('error', 'Unable to update item, Possible internet error');
           return redirect()->back();
       }

    }

    public function addItemAttribute(Request $request, $item_id) {

        $this->validate($request, [
            'the_image' => 'required'
        ]);

        if ($request->hasFile('the_image')) {
            dd($request->the_image);
            foreach ($request->the_image as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();

                $fileNameToStore = $filename.'.'.time().'.'.$extension;

                // $path = $request->file('the_image')->move('avatars/items/', $fileNameToStore);
                $path = $file->storeAs('public/avatars/items/', $fileNameToStore);

                // $path_name = $path->getPathname();
    
                $attribute = new ItemAttribute();
    
                $size = Storage::size($path);
                if ($size >= 1000000) {
                    $attribute->size = round($size/1000000) . 'MB';
                } elseif ($size >= 1000) {
                    $attribute->size = round($size/1000) . 'KB';
                } else {
                    $attribute->size = $size;
                }
                $attribute->item_id = $item_id;
                $attribute->the_image = $path;
                $attribute->save();
            }
        
        }
        if($attribute){
            session()->flash('success', 'Item attributes added successfully');
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to add item attributes');
            return redirect()->back();
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

}
