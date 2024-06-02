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

}
