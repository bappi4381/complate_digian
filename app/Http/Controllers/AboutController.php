<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class AboutController extends Controller
{
    
    public function create(){
        return view('admin.teams.addTeam');
    }
    public function manage(){
        $teams = Team::all();
        return view('admin.teams.manageTeam',compact('teams'));
    }
    public function store(Request $request){
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = 'Teams_' . time() . '.' . $extension;
            $file->storeAs('public/teams', $imageName);
        
            $team = new Team();
            $team->name = $request->name;
            $team->email = $request->email;
            $team->phone_number = $request->phone_number;
            $team->image = $imageName;
            $team->designation = $request->designation ;
            $team->save();
        
            $request->session()->flash('status', 'Team  information added successfully');
            return redirect()->route('team.create');
        } else {
            // Handle case where no file is uploaded
            $request->session()->flash('error', 'No image uploaded');
            return redirect()->back();
        }
    }
    public function teamEdit($id)
    {
        $team = Team::find($id);
        return view('admin.teams.edit',compact('team'));
    }
    public function teamUpdate(Request $request,$id)
    {
     
    // Validate the request
   

    // Find the header record by ID
            $team = Team::findOrFail($id);

            // Update other fields
            $team->name = $request->name;
            $team->email = $request->email;
            $team->phone_number = $request->phone_number;
            $team->designation = $request->designation ;
            // Check if a new image is uploaded
            if ($request->hasFile('image')) {
                // Get the original file name
                $imageName = $request->file('image')->getClientOriginalName();
                // Store the new image
                $request->file('image')->storeAs('public/teams', $imageName);
                // Update the image field
                $team->image = $imageName;
            }

            // Save the changes
            $team->save();

            // Redirect back with a success message
            return redirect()->back()->with('status', 'Team member information updated successfully');

    }

    public function teamRemove($id){
        $team = Team::find($id);

        if ($team !== null) {
            if (file_exists($team->image)) {
                unlink($team->image);
            }
            $team->delete();
            return redirect('/teams/manage')->with('message', 'Deleted Team member information');
        } else {
            // Handle the case where the team with the given ID doesn't exist
            return redirect('/teams/manage')->with('error', 'Team not found');
        }
    }


}
