<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function list_videos(){
         $videos = Video::orderBy('id','desc')->paginate(6);
         return view("videos.videos_ajax",compact("videos"));
     }


    public function index()
    {
        $videos = Video::orderBy('id','desc')->paginate(6);
        return view("videos.videos",compact('videos'));
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
            'title'=>'required|unique:videos',
            'description'=>'nullable',
            'url'=>'required',
        ]);

        $url = $request->url;

        if (strpos($url, 'www.youtube.com/watch?v=') != false) {
            $url = str_replace('https://www.youtube.com/watch?v=','', $url);
        }else{
            $url = str_replace('https://youtu.be/','', $url);
        }
        // ubica la posicion de & para cortar parametros extras si existen
        $urlPos = strpos($url,'&list');

        if($urlPos != null or $urlPos != 0){
            $url = mb_substr($url, 0, $urlPos);

        }
        // www.youtube.com/embed/
        $video  = new Video;
        $video->title = $request->title;
        $video->description = $request->description;
        $video->url = $url;
        $video->save();

        return response()->json(["result"=>"ok","message"=>"Se ha agregado el video con éxito"]);
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
            'title'=>'required|unique:videos,title,'.$id.'',
            'description'=>'nullable',
            'url'=>'required',
        ]);

        $url = $request->url;
        if (strpos($url, 'www.youtube.com/watch?v=') != false) {
            $url = str_replace('https://www.youtube.com/watch?v=','', $url);
        }else{
            $url = str_replace('https://youtu.be/','', $url);

        }
        // ubica la posicion de & para cortar parametros extras si existen
        // ubica la posicion de & para cortar parametros extras si existen
        $urlPos = strpos($url,'&list');
        if($urlPos != null or $urlPos != 0){
            $url = mb_substr($url, 0, $urlPos);

        }

        $video  = Video::find($id);
        $video->title = $request->title;
        $video->description = $request->description;
        $video->url = $url;
        $video->save();

        return response()->json(["result"=>"ok","message"=>"Se ha actualizado el video con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        if($video != Null){
            $video->delete();
        }
        return response()->json(["result"=>"delete","message"=>"El video ha sido eliminado con éxito"]);

    }
}
