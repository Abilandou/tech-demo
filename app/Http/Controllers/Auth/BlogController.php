<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Blog;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    //

    public function categories()
    {

        $categories = Category::all();
        return view('auth.admin.cms.categories')->with(compact('categories'));
    }


    public function deleteCategory(Request $request)
    {

        $category_id = $request->category_id;
        $category = Category::where(['id'=>$category_id])->delete();
        if($category){
            
            session()->flash('success', "Category Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete Category. possible internet error');
            return redirect()->back();
        }

    }


    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|unique:categories',
        ]);

        $category = new Category();
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

    public function updateCategory(Request $request, $category_id)
    {
        
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);
       $category = Category::where(['id'=>$category_id])->update([
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


    public function blogs()
    {

        $blogs = Blog::all();
        $categories = Category::all();
        return view('auth.admin.cms.blogs')->with(compact('blogs', 'categories'));
    }

    public function blogDetail($blog_id)
    {
        $blog = Blog::where(['id'=>$blog_id])->first();
        if($blog){
            return view('auth.admin.cms.blog_detail')->with(compact('blog'));
        }else{
            abort(404);
        }
    }

    public function deleteBlog(Request $request)
    {

        $blog_id = $request->blog_id;
        $blog = Blog::where(['id'=>$blog_id])->delete();
        if($blog){
            
            session()->flash('success', "Blog Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete blog. possible internet error');
            return redirect()->back();
        }

    }


    public function addBlog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|unique:blogs',
            'category' => 'required',
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
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->category_id = $request->category;
            $blog->url = Str::slug($request->title).'-'.time();
            if($request->hasFile('avatar')){
                 // filename with extension
                 $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
                 // filename
                 $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                 // extension
                 $extension = $request->file('avatar')->getClientOriginalExtension();
                 // filename to store
                 $fileNameToStore = $filename.'_'.time().'.'.$extension;
    
                 $path = $request->file('avatar')->move('avatars/blogs/', $fileNameToStore);
    
                 $path_name = $path->getPathname();
            }
            $blog->avatar = $path_name;
            $blog->save();
            session()->flash('success', 'Blog Added successfully');
            return redirect()->back();
        }else{
            $validator->errors()->add('avatar', "Avatar Should be of either type , ['jpg','png','bmp', 'jpeg', 'gif', 'svg']");
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
    }

    public function updateBlog(Request $request, $blog_id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'category' => 'required',
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

                $char = Blog::where(['id'=>$blog_id])->first();
                if($char){
                    $avatar = $char->avatar;
                    unlink($avatar);
                }
                // filename with extension
                $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
                // filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // extension
                $extension = $request->file('avatar')->getClientOriginalExtension();
                // filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;

                $path = $request->file('avatar')->move('avatars/blogs/', $fileNameToStore);

                $path_name = $path->getPathname();
            }
            // Incase no image was not selected when trying to update profile information, maintain the previous image.
            if(empty($path_name)){
                $the_path = Blog::where(['id'=>$blog_id])->first();
                $get_path = $the_path->avatar;
                $path_name = $get_path;
            }
            Blog::where(['id'=>$blog_id])->update([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category,
                'url'  => Str::slug($request->title).'-'.time(),
                'avatar' => $path_name
            ]);
            session()->flash('success', 'Blog Updated successfully');
            return redirect()->back();
         }else{
            $validator->errors()->add('avatar', "Avatar Should be of either type , ['jpg','png','bmp', 'jpeg', 'gif', 'svg']");
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
         }

    }




}