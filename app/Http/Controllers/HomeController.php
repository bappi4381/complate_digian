<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Header;
use App\Models\Contact;
use App\Models\Service;

class HomeController extends Controller
{
    public function index(){
        $headers=Header::all();
        $services = Service::latest()->take(4)->get();
        return view('front.index.index',compact('headers','services'));
    }

    public function service(){
        $services = Service::all();
        return view('front.service.service',compact('services'));
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
