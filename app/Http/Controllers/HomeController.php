<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Header;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Project;

class HomeController extends Controller
{
    public function index(){
        $headers = Header::all();
        $services = Service::latest()->take(4)->get();
        $testes = Testimonial::latest()->take(3)->get();
        $projects = Project::latest()->take(2)->get();
        return view('front.index.index',compact('headers','services','testes','projects'));
    }
    public function details($id){
        $project = Project::find($id);
    
        if (!$project) {
            // Handle the case where the project is not found, maybe redirect or show an error message
            return abort(404);
        }
    
        return view('front.details.details', ['project' => $project]);
    }
    public function servicedetails($id){
        $service = Service::find($id);
    
        if (!$service) {
            // Handle the case where the project is not found, maybe redirect or show an error message
            return abort(404);
        }
    
        return view('front.servicedetails.servicedetails', ['service' => $service]);
    }
    public function indexContact(Request $request){
        $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone_number = $request->phone_number;
            $contact->message = $request->message;
            $contact->save();
        
        $request->session()->flash('status', 'Contact successfully plz wait');
        return redirect('/home');
    }

    public function service(){
        $services = Service::all();
        return view('front.service.service',compact('services'));
    }
    public function about(){
        $teams = Team::all();
        return view('front.about.about',compact('teams')); 
    }



    //contact
    public function contact(){
       
        return view('front.contact.contact');
    }
    public function homeContact(Request $request){
        $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone_number = $request->phone_number;
            $contact->message = $request->message;
            $contact->save();
        
        $request->session()->flash('status', 'Contact successfully plz wait');
        return view('front.contact.contact');
    }
    //end contact

    
}
