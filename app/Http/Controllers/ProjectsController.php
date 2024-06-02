<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function create(){
        return view('admin.project.create');
    }
    public function store(Request $request)
    { 
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = 'blog_' . time() . '.' . $extension;
            $file->storeAs('public/projects', $imageName);
        
            $project = new Project();
            $project->project_title = $request->project_title;
            $project->project_description = $request->project_description;
            $project->image = $imageName;
            $project->save();
        
            $request->session()->flash('status', 'Project added successfully');
            return redirect()->route('project.create');
        } else {
            // Handle case where no file is uploaded
            $request->session()->flash('error', 'No image uploaded');
            return redirect()->back();
        }
    }
    public function manage(  ){
        $projects = Project::all(); 
        return view('admin.project.manage',compact('projects'));
    }
    public function edit( $id ){
        $projects = Project::find($id);
        return view('admin.project.edit',compact('projects'));
    }
    public function update(Request $request, $id ){
        // Validate the request
    

        // Find the header record by ID
        $projects = Project::findOrFail($id);

        // Update other fields
        $projects->project_title = $request->project_title;
        $projects->project_description = $request->project_description;

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Get the original file name
            $imageName = $request->file('image')->getClientOriginalName();
            // Store the new image
            $request->file('image')->storeAs('public/projects', $imageName);
            // Update the image field
            $projects->image = $imageName;
        }

        // Save the changes
        $projects->save();

        // Redirect back with a success message
         return redirect()->back()->with('status', 'Blog updated successfully');
    }
    public function remove($id){
        $projects = Project::find($id);

        if (file_exists( $projects->image))
        {
            unlink($projects->image);
        }
        $projects->delete();
        return redirect('/project/manage');
    }

}
