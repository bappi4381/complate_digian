<?php

namespace App\Http\Controllers;
use App\Models\Testimonial; 
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function create(){
        return view('admin.test.create');
    }
    public function store(Request $request)
    { 
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = 'test_' . time() . '.' . $extension;
            $file->storeAs('public/testes', $imageName);
        
            $test = new Testimonial();
            $test->name = $request->name;
            $test->short_description = $request->short_description;
            $test->image = $imageName;
            $test->save();
        
            $request->session()->flash('status', ' Testmonial added successfully');
            return redirect()->route('test.create');
        } else {
            // Handle case where no file is uploaded
            $request->session()->flash('error', 'No image uploaded');
            return redirect()->back();
        }
    }
    public function manage(  ){
        $tests = Testimonial::all(); 
        return view('admin.test.manage',compact('tests'));
    }
    public function edit( $id ){
        $tests =  Testimonial::find($id);
        return view('admin.test.edit',compact('tests'));
    }
    public function update(Request $request, $id ){
        // Validate the request
    

        // Find the header record by ID
        $test = Testimonial::findOrFail($id);

        // Update other fields
        $test->name = $request->name;
        $test->short_description = $request->short_description;

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Get the original file name
            $imageName = $request->file('image')->getClientOriginalName();
            // Store the new image
            $request->file('image')->storeAs('public/testes', $imageName);
            // Update the image field
            $test->image = $imageName;
        }

        // Save the changes
        $test->save();

        // Redirect back with a success message
         return redirect()->back()->with('status', ' Testmonial updated successfully');
    }
    public function remove($id){
        $tests =  Testimonial::find($id);

        if (file_exists(  $tests->image))
        {
            unlink($tests->image);
        }
        $tests->delete();
        return redirect('/test/manage');
    }

}
