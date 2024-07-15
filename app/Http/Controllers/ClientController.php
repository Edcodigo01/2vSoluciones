<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Project;




class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function list_clients(Request $request) {
       $dataClients = User::where("role","Cliente")->get();
       $projects = Project::where("state","publish")->get();


       foreach ($dataClients as $key => $client) {
           $numberProject = 0;
           $projectsClient = [];

           foreach ($projects as $key => $project) {
               if($client->id == $project->user_id){
                   $projectsClient[] =  $project;
                   $numberProject = $numberProject + 1;
               }
           }
           if($numberProject == 0){
               $client->projects = '';
           }else{
               $client->projects = $projectsClient;
           }

       }
       return $dataClients;
     }

    public function index()
    {
        // return view("layoutsAdmin.index");
        $services = Service::orderby('name','asc')->get();
        $dataClients = User::where("role","Cliente")->get();
        $projects = Project::where("state","publish")->orderby('id','desc')->get();
        foreach ($dataClients as $key => $client) {
            $numberProject = 0;
            $projectsClient = [];
            foreach ($projects as $key => $project) {
                if($client->id == $project->user_id){
                    $projectsClient[] =  $project;
                    $numberProject = $numberProject + 1;
                }
            }
            if($numberProject == 0){
                $client->projects = '';
            }else{
                $client->projects = $projectsClient;
            }

        }

        // return $dataClients;
        return view('clients.clients',compact('dataClients','services'));
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
          'email'=>'required|unique:clients',
          'name'=>'required',
          'lastName'=>'required',
          'typeIdentification'=>'required',
          'identification'=>'required',
          'phone1'=>'required',
          'password'=>'required',
          'university'=>'required',
          'career'=>'required',
      ]);

      $client = new User;
      $client->fill($request->all());
      $client->role = 'Cliente';
      $client->nameComplete = $request->name.' '.$request->lastName;
      $client->save();


      return response()->json(["result"=>"ok","message"=>"Se a agregado el nuevo cliente de forma satisfactoria."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('clientes.clientes');
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
        $request->validate([
            'email'=>'required|unique:clients',
            'name'=>'required',
            'lastName'=>'required',
            'typeIdentification'=>'required',
            'identification'=>'required',
            'phone1'=>'required',
            'university'=>'required',
            'career'=>'required',
        ]);

        $client = User::find($id);
        $client->fill($request->all());
        $client->nameComplete = $request->name.' '.$request->lastName;
        $client->save();


        return response()->json(["result"=>"ok","message"=>"Se ha realizado la petición con exito."]);
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
