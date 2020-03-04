<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Blog;

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
        $this->validate($request, [
            'title' => 'required|min:3|unique:blogs',
            'avatar' => 'required',
            'category_id' => 'required'
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;
        $blog->url = strtolower(str_replace(' ', '-', $request->title));
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
        if($blog){
            session()->flash('success', 'Blog Added successfully');
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to add blog, possible internet error');
            return redirect()->back();
        }
    }

    public function updateBlog(Request $request, $blog_id)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
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

            $path = $request->file('avatar')->move('avatars/blogs/', $fileNameToStore);

            $path_name = $path->getPathname();
       }
       // Incase no image was not selected when trying to update profile information, maintain the previous image.
       if(empty($path_name)){
           $the_path = Blog::where(['id'=>$blog_id])->first();
           $get_path = $the_path->avatar;
           $path_name = $get_path;
       }
       $blog = Blog::where(['id'=>$blog_id])->update([
           'title' => $request->title,
           'description' => $request->description,
           'category_id' => $request->category_id,
           'url'  => strtolower(str_replace(' ', '-', $request->title)),
           'avatar' => $path_name
       ]);
       if($blog){
           session()->flash('success', 'Blog Updated successfully');
           return redirect()->back();
       }else{
           session()->flash('error', 'Unable to update blog, Possible internet error');
           return redirect()->back();
       }

    }




}