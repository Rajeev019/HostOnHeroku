<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Session;
use Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $photos=Photo::orderBy('id','desc')->paginate(3);
            return view('Admin.Form.photo')->with('photos', $photos)->with('no', '1');
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
        $photos = new Photo;
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $image) {
                $name = $image->getClientOriginalName();
                //$image->move(public_path().'rc/img/',$name);
                $location = public_path('portfolio/img/' . $name);
                Image::make($image)->save($location);
                $data[] = $name;
            }
        }


        $photos->image = json_encode($data);
        $photos->save();

        //Set Flash message aand return view
        return redirect('adminlog/photo')->with('success', "Your health Content Is Saved Successfully!!!");
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photos = Photo::where('id', $id)->first();
       return redirect('adminlog/photo')->with('photos', $photos);
   }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $photos = Photo::find($id);

     
        if ($request->hasfile('image'))
        {
            foreach($request->file('image')as $image)
            {
                $name=$image->getClientOriginalName();
                //$image->move(public_path().'rc/img/',$name);
                $location = public_path('portfolio/img/'.$name);
                Image::make($image)->save($location);
                $data[] = $name;
               
            }
            $photos->image = json_encode($data);
            
        }  

        $photos->save();
        //Set Flash message aand return view
        return redirect('adminlog/photo')->with('success', "Successfully Updated!!!!");
    }
    
        //
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $photos = Photo::find($id);
            Storage::delete($photos->image);
            $photos->delete();
            return redirect('adminlog/photo')->with('delete', "Your Data Has Been Deleted!!!!");
        }
    }
}
