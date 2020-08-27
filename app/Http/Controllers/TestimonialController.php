<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use Session;
use Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $testimonials=Testimonial::all();
            return view('Admin.form.testimonial')->with('testimonials',$testimonials)->with('no','1');
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
            'name' => 'required',
         
            'description'=>'required',


        ]);
        $testimonials = new Testimonial;
        $testimonials->name = $request->name;
     
        $testimonials->description =$request->description;

        $testimonials->save();
        return redirect('adminlog/testimonial')->with('success',"Your introduction Content Is Saved Successfully!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        {
            $testimonials= Testimonial::find($id);
            return view('Admin.form.testimonial')->with('testimonials',$testimonials);
         }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' =>'required',
            'description'=>'required',

        ]);
            //Save the data in database
            $introductions=Testimonial::find($id);
            $introductions->name = $request->input('name');
            $introductions->description = $request->input('description');
          
            $introductions->save();
            //Set Flash message aand return view
            return redirect('adminlog/testimonial')->with('success',"Successfully Updated!!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonials=Testimonial::find($id);
        
        $testimonials->delete();
         return redirect('adminlog/testimonial')->with('delete',"Your Data Has Been Deleted!!!!");
    }
}
