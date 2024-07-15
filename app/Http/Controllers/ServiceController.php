<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function list_adminservices(Request $request) {
       $dataServices = Service::orderBy('id','asc')->get();
       return $dataServices;
     }

    public function index()
    {
        $dataServices = Service::orderBy('id','asc')->get();
        return view('services.services',compact('dataServices'));
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
            'name'=>'required',
            'price'=>'required'
        ]);

        $service = new Service;
        $service->name = $request->name;
        $price = $request->price;
        $price = str_replace(",", ".",$price);
        $price = number_format($price,2,',','');
        $service->price = $price;
        $service->save();

        return response()->json(["result"=>"ok","message"=>"Se ha creado el nuevo servicio"]);

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
            'name'=>'required',
            'price'=>'required'
        ]);

        $service = Service::find($id);
        $service->name = $request->name;
        $price = $request->price;
        $price = str_replace(",", ".",$price);
        $price = number_format($price,2,',','');
        $service->price = $price;
        $service->save();

        return response()->json(["result"=>"ok","message"=>"Se han actualizado los datos del servicio"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();

        return response()->json(["result"=>"ok","message"=>"Se ha eliminado el servicio con Éxito."]);
    }
}
