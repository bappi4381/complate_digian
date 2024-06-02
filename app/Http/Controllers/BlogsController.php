<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Blog;

class BlogsController extends Controller
{
    public function create(){
        $catagories = Catagory::all();
        return view('admin.blog.createblog',compact('catagories'));
    }
    //catagory
    public function catagoyCreate(Request $request){
        $catagory = new Catagory();
        $catagory->name = $request->name;
        $catagory->save();

        return redirect()->route('blog.create');
    }
    
    public function catagoriRemove($id){
        $catagory = Catagory::find($id);
        $catagory->delete();
        return redirect('/blogs/create');
    }
    //blog create

    public function store(Request $request)
    { 
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = 'blog_' . time() . '.' . $extension;
            $file->storeAs('public/blogs', $imageName);
        
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->category_id = $request->category_id;
            $blog->short_description = $request->short_description;
            $blog->description = $request->description;
            $blog->image = $imageName;
            $blog->created_by_name = $request->created_by_name;
            $blog->save();
        
            $request->session()->flash('status', 'Blog added successfully');
            return redirect()->route('blog.create');
        } else {
            // Handle case where no file is uploaded
            $request->session()->flash('error', 'No image uploaded');
            return redirect()->back();
        }
    }
    public function manage(  ){
        $blogs = Blog::all(); 
        return view('admin.blog.manage',compact('blogs'));
    }
    public function edit( $id ){
        $blog = Blog::find($id);
        $catagories = Catagory::all();
        return view('admin.blog.edit',compact('blog','catagories'));
    }
    public function update(Request $request, $id ){
        // Validate the request
    

        // Find the header record by ID
        $blog = Blog::findOrFail($id);

        // Update other fields
            $blog->title = $request->title;
            $blog->category_id = $request->category_id;
            $blog->short_description = $request->short_description;
            $blog->description = $request->description;
            $blog->created_by_name = $request->created_by_name;

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Get the original file name
            $imageName = $request->file('image')->getClientOriginalName();
            // Store the new image
            $request->file('image')->storeAs('public/blogs', $imageName);
            // Update the image field
            $blog->image = $imageName;
        }

        // Save the changes
        $blog->save();

        // Redirect back with a success message
         return redirect()->back()->with('status', 'Blog updated successfully');
    }
    public function remove($id){
        $blog = Blog::find($id);

        if (file_exists( $blog->image))
        {
            unlink($blog->image);
        }
        $blog->delete();
        return redirect('/blogs/manage');
    }

}
