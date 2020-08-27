<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Session;
use Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { {
            $abouts = About::all();
            return view('Admin.form.about')->with('abouts', $abouts)->with('no', '1');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'photographer' => 'required',
            'wedding' => 'required',
            'event' => 'required',
            'conference'=>'required',
            'description'=>'required',


        ]);
        $abouts = new About;
        $abouts->photographer = $request->photographer;
        $abouts->wedding = $request->wedding;
        $abouts->event = $request->event;
        $abouts->conference = $request->conference;
        $abouts->description =$request->description;

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('portfolio/img/'.$filename);
            Image::make($image)->resize(540,356)->save($location);
            $abouts->image = $filename;
        
        }
        $abouts->save();
        return redirect('adminlog/about')->with('success',"Your introduction Content Is Saved Successfully!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        {
            $abouts= About::find($id);
            return view('Admin.form.about')->with('abouts',$abouts);
         }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'photographer' => 'required',
            'wedding' => 'required',
            'event' => 'required',
            'conference'=>'required',
            'description'=>'required',

        ]);
            //Save the data in database
            $abouts=About::find($id);
            $abouts->photographer = $request->input('photographer');
            $abouts->wedding = $request->input('wedding');
            $abouts->event = $request->input('event');
            $abouts->conference = $request->input('conference');
            $abouts->description = $request->input('description');
             if($request->hasFile('image'))
            {
                //add the new photo or image
                $image = $request->file('image');
                $filename = time(). '.' . $image->getClientOriginalExtension();
                $location = public_path('portfolio/img/'.$filename);
                Image::make($image)->resize(540,356)->save($location);
                $oldFilename =$abouts->image;
                //update to database
                $abouts->image = $filename;
                //delete the old file or image
                Storage::delete($oldFilename);
            }

            $abouts->save();
            //Set Flash message aand return view
            return redirect('adminlog/about')->with('success',"Successfully Updated!!!!");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abouts=About::find($id);
        Storage::delete($abouts->image);
        $abouts->delete();
         return redirect('adminlog/about')->with('delete',"Your Data Has Been Deleted!!!!");
    }
}
