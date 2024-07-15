<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Projectservice;

use App\User;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function startProject($id)
     {
         $projectsCount = Project::where("user_id",$id)->where("state","publish")->count();
         $numberProject = $projectsCount + 1;
         $verifyName = 0;
         while ($verifyName == 0) {
             $count = Project::where("user_id",$id)->where("state","publish")->where("name","Proyecto ".$numberProject)->count();
             if($count == 0){
                 $verifyName = 1;
             }else{
                 $numberProject = $numberProject + 1;
             }
             // code...
         }
         $project = new Project;
         $project->name = "Proyecto ".$numberProject;
         $project->user_id = $id;
         $project->state = 'unpublish';
         $project->created_by = Auth::user()->id;
         $project->save();
         $user = User::find($id);

         return response()->json(["result"=>"ok","project"=>$project,'user'=>$user]);
     }
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
        $request->validate([
            'name'=>'required|max:90',
            'project_id'=>'required',
        ]);

        $project = Project::find($request->project_id);
        $project->fill($request->all());
        $project->state = 'publish';

        $project->save();

        return response()->json(["result"=>"ok","message"=>"Se ha creado el Projecto: ".$project->name." con Éxito."]);
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
        // devuelve los servicios del Projecto
        $services = Projectservice::where("project_id",$id)->orderBy('id','desc')->get();
        $project = Project::find($id);
        return response()->json(["result"=>"ok","services"=>$services,'project'=>$project]);
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


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
