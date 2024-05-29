<?php

namespace App\Http\Controllers;
use App\Models\Header;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class Admincontroller extends Controller
{
    public function headerCreate()
    {
        return view('admin.header.create');
    }
    public function headerStore(Request $request)
    { 
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = 'header_' . time() . '.' . $extension;
            $file->storeAs('public/header', $imageName);
        
            $header = new Header();
            $header->header_title = $request->header_title;
            $header->short_description = $request->short_description;
            $header->image = $imageName;
            $header->save();
        
            $request->session()->flash('status', 'Header information added successfully');
            return redirect()->route('header.create');
        } else {
            // Handle case where no file is uploaded
            $request->session()->flash('error', 'No image uploaded');
            return redirect()->back();
        }
    }

    public function headerManage()
    {
        $headers = Header::all();
        return view('admin.header.show',compact('headers'));
    }
    public function headerEdit($id)
    {
        $headers = Header::find($id);
        return view('admin.header.edit',compact('headers'));
    }
    public function headerUpdate(Request $request,$id)
    {
     
    // Validate the request
   

    // Find the header record by ID
            $header = Header::findOrFail($id);

            // Update other fields
            $header->header_title = $request->header_title;
            $header->short_description = $request->short_description;

            // Check if a new image is uploaded
            if ($request->hasFile('image')) {
                // Get the original file name
                $imageName = $request->file('image')->getClientOriginalName();
                // Store the new image
                $request->file('image')->storeAs('public/header', $imageName);
                // Update the image field
                $header->image = $imageName;
            }

            // Save the changes
            $header->save();

            // Redirect back with a success message
            return redirect()->back()->with('status', 'Header information updated successfully');

    }

    public function headerRemove($id){
        $header = Header::find($id);

        if (file_exists( $header->image))
        {
            unlink($header->image);
        }
        $header->delete();
        return redirect('/header/manage')->with('message','Delete header information');
    }
}
