<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projectservice;
use App\Project;
use Auth;
class ProjectServicesController extends Controller
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
            'type'=>'required',
        ]);
        // return response()->json(["result"=>"error","message"=>$request->name]);
        if($request->type == 'Adicional'){
            $request->validate([
                'project_id'=>'required',
                'name'=>'required',
                'priceAgreed'=>'required',
            ]);

            $service = new Projectservice;

            $service->project_id = $request->project_id;
            $service->name = $request->name;

            $priceAgreed = $request->priceAgreed;
            $priceAgreed = str_replace(",", ".",$priceAgreed);
            $priceAgreed = number_format($priceAgreed,2,',','');
            $service->priceAgreed =  $priceAgreed;
            $service->price =  Null;

        }else{
            // Predeterminado
            $request->validate([
                'project_id'=>'required',
                'name'=>'required',
                'price'=>'required',
                'priceAgreed'=>'required',
            ]);

            $service = new Projectservice;
            $service->service_id = $request->service_id;

            $service->project_id = $request->project_id;
            $service->name = $request->name;

            $price = $request->price;
            $price = str_replace(",", ".",$price);
            $price = number_format($price,2,',','');
            $service->price =  $price;

            $priceAgreed = $request->priceAgreed;
            $priceAgreed = str_replace(",", ".",$priceAgreed);
            $priceAgreed = number_format($priceAgreed,2,',','');
            $service->priceAgreed =  $priceAgreed;

        }
        $service->createdBy = Auth::user()->id;
        $service->type = $request->type;
        $service->save();


        $services = Projectservice::where("project_id",$request->project_id)->orderby('id','asc')->get();

        $project = Project::find($request->project_id);

        $totalAgreed = 0;
        $totalPrice = 0;

        foreach ($services as $key => $service) {

            // total acordado
            $totalAgreed = str_replace(",", ".",$totalAgreed);
            $totalAgreed = floatval($totalAgreed);

            $priceAgreed = $service->priceAgreed;
            $priceAgreed = str_replace(",", ".",$priceAgreed);
            $priceAgreed = floatval($priceAgreed);

            $totalAgreed = $totalAgreed + $priceAgreed;
            $totalAgreed = number_format($totalAgreed,2,',','');
            // fin total acordado

            $totalPrice = str_replace(",", ".",$totalPrice);
            $totalPrice = floatval($totalPrice);

            $price = $service->price;
            $price = str_replace(",", ".",$price);
            $price = floatval($price);

            $totalPrice = $totalPrice + $price;
            $totalPrice = number_format($totalPrice,2,',','');

        }

        $project->totalAgreed = $totalAgreed;
        $project->totalprice = $totalPrice;
        $project->save();
        return response()->json(["result"=>"ok","data"=>$services,'totalAgreed'=>$totalAgreed,'totalPrice'=>$totalPrice,'message'=>'Se ha Agergado el Servicio con Éxito']);
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
        $request->validate([
            'type'=>'required',
        ]);
        // return response()->json(["result"=>"error","message"=>$request->name]);
        if($request->type == 'Adicional'){
            $request->validate([
                'name'=>'required',
                'priceAgreed'=>'required',
            ]);

            $service = Projectservice::find($id);
            $service->name = $request->name;
            $service->price =  Null;
            $priceAgreed = $request->priceAgreed;
            $priceAgreed = str_replace(",", ".",$priceAgreed);
            $priceAgreed = number_format($priceAgreed,2,',','');
            $service->priceAgreed =  $priceAgreed;


        }else{
            // Predeterminado
            $request->validate([

                'name'=>'required',
                'price'=>'required',
                'priceAgreed'=>'required',
            ]);

            $service = Projectservice::find($id);
            $service->name = $request->name;
            $service->service_id = $request->service_id;
            $price = $request->price;
            $price = str_replace(",", ".",$price);
            $price = number_format($price,2,',','');
            $service->price =  $price;

            $priceAgreed = $request->priceAgreed;
            $priceAgreed = str_replace(",", ".",$priceAgreed);
            $priceAgreed = number_format($priceAgreed,2,',','');
            $service->priceAgreed =  $priceAgreed;

        }
        $service->createdBy = Auth::user()->id;
        $service->type = $request->type;
        $service->save();

        $services = Projectservice::where("project_id",$service->project_id)->orderby('id','asc')->get();

        $project = Project::find($service->project_id);

        $totalAgreed = 0;
        $totalPrice = 0;

        foreach ($services as $key => $service) {

            // total acordado
            $totalAgreed = str_replace(",", ".",$totalAgreed);
            $totalAgreed = floatval($totalAgreed);

            $priceAgreed = $service->priceAgreed;
            $priceAgreed = str_replace(",", ".",$priceAgreed);
            $priceAgreed = floatval($priceAgreed);

            $totalAgreed = $totalAgreed + $priceAgreed;
            $totalAgreed = number_format($totalAgreed,2,',','');
            // fin total acordado

            $totalPrice = str_replace(",", ".",$totalPrice);
            $totalPrice = floatval($totalPrice);

            $price = $service->price;
            $price = str_replace(",", ".",$price);
            $price = floatval($price);

            $totalPrice = $totalPrice + $price;
            $totalPrice = number_format($totalPrice,2,',','');

        }

        $project->totalAgreed = $totalAgreed;
        $project->totalprice = $totalPrice;
        $project->save();


        return response()->json(["result"=>"ok","data"=>$services,'totalAgreed'=>$totalAgreed,'totalPrice'=>$totalPrice,'message'=>'Se ha Actualizado el Servicio con Éxito']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Projectservice::find($id);
        $project_id = $service->project_id;
        $service->delete();

        $services = Projectservice::where("project_id",$project_id)->orderby('id','asc')->get();

        $project = Project::find($service->project_id);

        $totalAgreed = 0;
        $totalPrice = 0;

        foreach ($services as $key => $service) {

            // total acordado
            $totalAgreed = str_replace(",", ".",$totalAgreed);
            $totalAgreed = floatval($totalAgreed);

            $priceAgreed = $service->priceAgreed;
            $priceAgreed = str_replace(",", ".",$priceAgreed);
            $priceAgreed = floatval($priceAgreed);

            $totalAgreed = $totalAgreed + $priceAgreed;
            $totalAgreed = number_format($totalAgreed,2,',','');
            // fin total acordado

            $totalPrice = str_replace(",", ".",$totalPrice);
            $totalPrice = floatval($totalPrice);

            $price = $service->price;
            $price = str_replace(",", ".",$price);
            $price = floatval($price);

            $totalPrice = $totalPrice + $price;
            $totalPrice = number_format($totalPrice,2,',','');

        }

        $project->totalAgreed = $totalAgreed;
        $project->totalprice = $totalPrice;

        $project->save();

        return response()->json(["result"=>"ok","data"=>$services,"message"=>"Se ha Eliminado el Servicio con Éxito.",'totalAgreed'=>$totalAgreed,'totalPrice'=>$totalPrice,]);
    }
}
