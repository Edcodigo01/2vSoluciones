<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\Messagescontact;

use Mail;
use Auth;
use App\Video;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function home(Request $request){
        $articles = Article::Published('no')->orderBy('created_at','desc')->take(3)->get();
        return view("front.home.index",compact("articles"));
    }

    public function viewmail($view){

        return view("mails.".$view);
    }
    function messageContact(Request $request){
       
        $request->validate([
            'email'=>'required|email',
            // 'whatsapp'=>'nullable',
            // 'affair'=>'nullable',
            'message'=>'required'
        ]);

        if($request->affair == Null){
            $request->affair = 'Pregunta desde sitio web 2v Soluciones';
        }
        $data = ['data'=>$request];

        // try{
        //
        //
        //     $message = new Messagescontact;
        //     $message->email = $request->email;
        //     $message->whatsapp = $request->whatsapp;
        //     $message->affair = $request->affair;
        //     $message->message = $request->message;
        //     $message->send = 'si';
        //     $message->error = 'no';
        //     $message->save();
        // }
        // catch(\Exception $e){
        //     $message = new Messagescontact;
        //     $message->email = $request->email;
        //     $message->whatsapp = $request->whatsapp;
        //     $message->affair = $request->affair;
        //     $message->message = $request->message;
        //     $message->send = 'no';
        //     $message->error = $e;
        //     $message->save();
        //
        //     return response()->json(["result"=>"error","message"=>"No se pudo enviar el mensaje!, por favor verifique haber escrito su correo correctamente, si esto no funciona por favor contáctenos por whatsapp o nuestras redes sociales."]);
        // }

       try {
           Mail::send('mails.messageContact',$data,function($message) use($request){
            $message->subject('Mensaje de visitante a 2V: '.$request->email);
            // $message->to('eavc53189@gmail.com');
            $message->to('tulogroesnuestroexito2v@gmail.com');

            });
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
           
        

        return response()->json(["result"=>"ok","message"=>"El mensaje ha sido enviado con éxito."]);
    }

    function testimonios(){
        return view('front.testimonios');
    }

    function admin(){
        return view('admin.panelAdmin');
    }

    function AdminIni(){
        return view('admin.adminIni');
    }

    // function message(Request $request){
    //     $data = ['data'=>$request];
    //     Mail::send('mails.messageContact',$data,function($message){
    //         $message->subject('Pregunta Cliente 2v Soluciones formulario contáctenos');
    //         $message->to('tulogroesnuestroexito2v@gmail.com'));
    //     });
    //     return response()->json(["result"=>"ok","message"=>"El mensaje ha sido enviado con éxito, pronto contactaremos con usted."]);
    // }


    function videosSearch(Request $request){
      $videos = Video::where('title','like', '%'.$request->search.'%')->orderBy('created_at','desc')->paginate(8);
      $videoSelect = '';
      return view("front.videos.videosSearch",compact('videos','videoSelect'));

    }


    function videos(Request $request){
        $videos = Video::orderBy('created_at','desc')->paginate(8);
        return view("front.videos.videos",compact('videos'));
    }
    function list_videos_front(Request $request){
        $videos = Video::orderBy('created_at','desc')->paginate(8);
        return view("front.videos.videos_ajax",compact('videos'));
    }

    function contactanos(Request $request){
        return view("front.contactenos");
    }

    function somos(Request $request){
        return view("front.somos");
    }

    function servicios(Request $request){
        return view("front.servicios.servicios");
    }


    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $user = User::where('email',$request->email)->first();

        if($user == Null){
            return response()->json(['result'=>'error','message'=>'El correo agregado no existe en la base de datos']);
        }else{
            $credentials = $request->only('email', 'password');

            if(Auth::attempt($credentials)) {
                // return redirect()->route('users.index');
                return response()->json(['result'=>'ok','url'=>route('admin')]);
            }else{
                // return back()->with('error','no pudo iniciar');
                return response()->json(['result'=>'error','message'=>'Has ingresado una contraseña invalida']);
            }
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

}