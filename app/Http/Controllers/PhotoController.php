<?php

namespace App\Http\Controllers;
use App\Photo;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\PhotoRequest;
class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoRequest $request)
    {
       //return 'foto download1';
      
      //dd($request->all());
      //return view('project.index');
        $project_id = $request->input('project_id');
        //dd($project_id);
        
         if($request->hasfile('name'))
         {
            foreach($request->file('name') as $image)
            {

                $name = $image->getClientOriginalName();

                $count = Photo::where('name', $name)->count();
                if($count < 1){
                    $image->move(public_path().'/images/' .$project_id, $name);  
                    $photo = new Photo();
                    $photo->name = ($name);
                    $photo->path = public_path().'/images/' .$project_id;
                    $photo->project_id = $project_id;
                    $photo->save();

                }
                



                
            }
         }

        return redirect()->route('project.index')->with('message', 'Photo has been saved successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {

        unlink(public_path().'/images/'.$photo->project_id .'/' .$photo->name);
        $photo->delete();
        return redirect()->route('project.index')->with('message', 'Photo has been deleted successfully');

    }
}
