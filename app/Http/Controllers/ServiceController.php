<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image ;
use Session;
use Storage;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $services=Service::all();
            return view('Admin.form.service')->with('services',$services)->with('no','1');
        }
        //
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
            'logo' => 'required',
            'title' =>'required',
            'description'=>'required',


        ]);
        $services = new Service();
        $services->logo = $request->logo;
        $services->title = $request->title;
        $services->description =$request->description;

        $services->save();
        return redirect('adminlog/service')->with('success',"Your introduction Content Is Saved Successfully!!!");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        {
            $services= Service::find($id);
            return view('Admin.form.service')->with('services',$services);
         }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'logo' =>'required',
            'title'=>'required',
            'description'=>'required',

        ]);
            //Save the data in database
            $services=Service::find($id);
            $services->logo = $request->input('logo');
            $services->title = $request->input('title');
            $services->description = $request->input('description');
           

            $services->save();
            //Set Flash message aand return view
            return redirect('adminlog/service')->with('success',"Successfully Updated!!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services=Service::find($id);
        Storage::delete($services->image);
        $services->delete();
         return redirect('adminlog/service')->with('delete',"Your Data Has Been Deleted!!!!");
    }
}
