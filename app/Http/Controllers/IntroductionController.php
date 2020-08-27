<?php

namespace App\Http\Controllers;

use App\Introduction;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image ;
use Session;
use Storage;

class IntroductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $introductions=Introduction::all();
            return view('Admin.form.introduction')->with('introductions',$introductions)->with('no','1');
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
            'designation' =>'required',
            'description'=>'required',
            'image' => 'mimes:jpeg,png,jpg,gif,pdf,tiff,svg,ai,psd',
        ]);
        $introductions = new Introduction;
        $introductions->name = $request->name;
        $introductions->designation = $request->designation;
        $introductions->description =$request->description;

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('portfolio/img/'.$filename);
            Image::make($image)->save($location);
            $introductions->image = $filename;
        
        }
        $introductions->save();
        return redirect('adminlog/introduction')->with('success',"Your introduction Content Is Saved Successfully!!!");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function show(Introduction $introduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        {
            $introductions= Introduction::find($id);
            return view('Admin.form.introduction')->with('introductions',$introductions);
         }
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' =>'required',
            'designation'=>'required',
            'description'=>'required',
            'image' => 'mimes:jpeg,png,jpg,gif,pdf,tiff,svg,ai,psd|max:800000',

        ]);
            //Save the data in database
            $introductions=Introduction::find($id);
            $introductions->name = $request->input('name');
            $introductions->designation = $request->input('designation');
            $introductions->description = $request->input('description');
             if($request->hasFile('image'))
            {
                //add the new photo or image
                $image = $request->file('image');
                $filename = time(). '.' . $image->getClientOriginalExtension();
                $location = public_path('portfolio/img/'.$filename);
                Image::make($image)->resize(2134,1568)->save($location);
                $oldFilename =$introductions->image;
                //update to database
                $introductions->image = $filename;
                //delete the old file or image
                Storage::delete($oldFilename);
            }

            $introductions->save();
            //Set Flash message aand return view
            return redirect('adminlog/introduction')->with('success',"Successfully Updated!!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $introductions=Introduction::find($id);
        Storage::delete($introductions->image);
        $introductions->delete();
         return redirect('adminlog/introduction')->with('delete',"Your Data Has Been Deleted!!!!");
    }
}

