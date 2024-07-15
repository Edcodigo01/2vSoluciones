<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
class TagsController extends Controller
{

    public function disabledTag($id)
    {
        $category = Tag::find($id);
        $category->disabled = 'si';
        $category->save();
        
        return response()->json(["result"=>"ok","message"=>"Se ha deshabilitado la etiqueta con éxito."]);
    }
    public function enabledTag($id)
    {
        $category = Tag::find($id);
        $category->disabled = 'no';
        $category->save();
        return response()->json(["result"=>"ok","message"=>"Se ha deshabilitado la etiqueta con éxito."]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function list_admintags(Request $request) {
       $dataTags = Tag::Disabled($request->filtro1)->orderBy('id','asc')->get();
       return $dataTags;
     }

    public function index()
    {
        $dataTags = Tag::Disabled('no')->orderBy('id','asc')->get();
        return view('tags.tags',compact('dataTags'));
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

        ]);

        $tag = new Tag;
        $tag->name = $request->name;

        $tag->save();

        return response()->json(["result"=>"ok","message"=>"Se ha creado la etiqueta con éxito"]);

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
        ]);

        $tag = Tag::find($id);
        $tag->name = $request->name;

        $tag->save();

        return response()->json(["result"=>"ok","message"=>"Se ha actualizado la etiqueta"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        return response()->json(["result"=>"ok","message"=>"Se ha eliminado la etiqueta con éxito."]);
    }
}
