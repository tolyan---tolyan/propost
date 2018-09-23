<?php

namespace App\Http\Controllers;
use App\Project;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProjectRequest;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {

        $project_id = Project::create(['title' => $request->input('title')])->id;
        mkdir(public_path().'/images/' .$project_id);
        
       
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

         
          

        
        return redirect()->route('project.index')->with('message','Проект создан!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //return'show';
        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->all());
        return redirect()->route('project.index')->with('message', 'Project has been updated successfully!');
    }


 
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $flag = self::delete_directory(public_path().'/images/' .$project->id);
        $project->delete();
        return redirect()->route('project.index')->with('message', 'Project has been deleted successfully');

    }

    public function delete_directory($path)
    {
       
        $files = glob($path . '/*');
        foreach ($files as $file) {
            is_dir($file) ? removeDirectory($file) : unlink($file);
        }
        rmdir($path);
        return;
    }

   


}
