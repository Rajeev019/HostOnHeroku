<?php

namespace App\Http\Controllers;

use App\About;
use App\Introduction;
use App\Mail\sendMail;
use App\Photo;
use App\Service;
use App\Testimonial;
use Illuminate\Http\Request;
use Mail;
 

class PublicController extends Controller
{
    public function Index()

    {
        $introduction = Introduction::orderBy('id', 'desc')->limit(1)->get();
        $service = Service::orderBy('id', 'desc')->limit(6)->get();
        $about = About::orderBy('id', 'desc')->limit(1)->get();
        $photos = Photo::orderBy('id', 'desc')->paginate(3);
        $testimonial = Testimonial::all();

        
        

        return view('Clients.index')->with('introduction', $introduction)->with('service', $service)
        ->with('about', $about)->with('photos', $photos)->with('testimonial', $testimonial)->with('no','1');
    }

    public function mail()
    {
        
        Mail::send(new SendMail());
        return back()->with('success','Thank for contacting us...');
    }

}
