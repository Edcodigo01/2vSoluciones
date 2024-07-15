<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

use App\Tag;
use App\Tagsarticle;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function enabled_article($id){
        $article = Article::find($id);
        $article->disabled = 'no';
        $article->save();
        return response()->json(["result"=>"ok","message"=>"Artículo publicado con éxito"]);
    }
    public function disable_article($id){
        $article = Article::find($id);
        $article->disabled = 'si';
        $article->save();
        return response()->json(["result"=>"ok","message"=>"Artículo deshabilitado con éxito"]);
    }

    public function articulos_ajax(Request $request){

        $articles = Article::Published('no')->Search($request->search)
        ->Categories($request->category)
        ->Tag($request->tag)
        ->orderBy('created_at','desc')->distinct()->paginate(6);
        $articlesCount = Article::count();
        return view("front.articles.articles_ajax",compact('articles','articlesCount'));

    }


    public function articles(Request $request){

        $articlesLast = Article::Published('no')->orderBy('created_at','desc')->take(3)->get();
        $category = Category::where('name',$request->categoria)->first();
        $tag = Tag::where('name',$request->tag)->first();

        $tags = Tag::orderBy('name','asc')->get();
        $categories = Category::orderBy('name','asc')->get();
        if($category == Null){
            $category = '';
        }else{
            $category = $category->id;
        }
        if($tag == Null){
            $tag = '';
        }else{
            $tag = $tag->id;
        }
         $articlesCount = Article::count();
        $articles = Article::Published('no')->where('title','like', '%'.$request->titulo.'%')->Categories($category)->Tag($tag)->orderBy('created_at','desc')->paginate(6);
        return view("front.articles.articles",compact('tags','articles','categories','articlesLast','articlesCount'));
    }

    public function article($id){

        $article = Article::find($id);
        $tags = Tag::orderBy('name','asc')->get();
        $articles = Article::Published('no')->orderBy('created_at','desc')->take(4)->get();
        $categories = Category::orderBy('name','asc')->get();
        $tagsArticle = Tagsarticle::where("article_id",$id)->get();

        if($tagsArticle->count() == 0){
            $articlesRelated = Article::Published('no')->where("category_id",$article->category_id)->where("id","!=",$id)->take(4)->get();
        }elseif ($tagsArticle->count() == 1) {
            $tag1 = $tagsArticle[0]['tag_id'];
            $articlesRelated = Article::Published('no')->join('tagsarticles', 'tagsarticles.article_id', '=', 'articles.id')
            ->select('articles.*')->take(4)->where("articles.id","!=",$id)
            ->where(function($query) use($article,$id){
                $query->where("articles.category_id",$article->category_id)->where("articles.id","!=",$id);
            })
            ->orWhere(function($query) use($tag1,$id){
                  $query->where("tagsarticles.tag_id",$tag1)->where("articles.id","!=",$id);
            })
            ->orderBy('created_at','desc')->distinct()
            ->get();
        }elseif ($tagsArticle->count() == 2) {
            $tag1 = $tagsArticle[0]['tag_id'];
            $tag2 = $tagsArticle[1]['tag_id'];

            $articlesRelated = Article::Published('no')->join('tagsarticles', 'tagsarticles.article_id', '=', 'articles.id')
            ->select('articles.*')->take(4)->where("articles.id","!=",$id)
            ->where(function($query) use($article,$id){
                $query->where("articles.category_id",$article->category_id)->where("articles.id","!=",$id);
            })
            ->orWhere(function($query) use($tag1,$tag2,$id){
                  $query->where("tagsarticles.tag_id",$tag1)->where("articles.id","!=",$id)
                  ->orWhere("tagsarticles.tag_id",$tag2)->where("articles.id","!=",$id);

            })
            ->orderBy('created_at','desc')->distinct()

            ->get();

        }elseif ($tagsArticle->count() == 3) {
            $tag1 = $tagsArticle[0]['tag_id'];
            $tag2 = $tagsArticle[1]['tag_id'];
            $tag3 = $tagsArticle[2]['tag_id'];

            $articlesRelated = Article::Published('no')->join('tagsarticles', 'tagsarticles.article_id', '=', 'articles.id')
            ->select('articles.*')->take(4)->where("articles.id","!=",$id)
            ->where(function($query) use($article,$id){
                $query->where("articles.category_id",$article->category_id)->where("articles.id","!=",$id);
            })
            ->orWhere(function($query) use($tag1,$tag2,$tag3,$id){
                  $query->where("tagsarticles.tag_id",$tag1)->where("articles.id","!=",$id)
                  ->orWhere("tagsarticles.tag_id",$tag2)->where("articles.id","!=",$id)
                  ->orWhere("tagsarticles.tag_id",$tag3)->where("articles.id","!=",$id);

            })
            ->orderBy('created_at','desc')->distinct()

            ->get();


        }elseif ($tagsArticle->count() == 4) {
            $tag1 = $tagsArticle[0]['tag_id'];
            $tag2 = $tagsArticle[1]['tag_id'];
            $tag3 = $tagsArticle[2]['tag_id'];
            $tag4 = $tagsArticle[3]['tag_id'];

            $articlesRelated = Article::Published('no')->join('tagsarticles', 'tagsarticles.article_id', '=', 'articles.id')
            ->select('articles.*')->take(4)->where("articles.id","!=",$id)
            ->where(function($query) use($article,$id){
                $query->where("articles.category_id",$article->category_id);
            })
            ->orWhere(function($query) use($tag1,$tag2,$tag3,$tag4,$id){
                  $query->where("tagsarticles.tag_id",$tag1)->where("articles.id","!=",$id)
                  ->orWhere("tagsarticles.tag_id",$tag2)->where("articles.id","!=",$id)
                  ->orWhere("tagsarticles.tag_id",$tag3)->where("articles.id","!=",$id)
                  ->orWhere("tagsarticles.tag_id",$tag4)->where("articles.id","!=",$id);
            })
            ->orderBy('created_at','desc')->distinct()

            ->get();


        }elseif ($tagsArticle->count() >= 5) {
            $tag1 = $tagsArticle[0]['tag_id'];
            $tag2 = $tagsArticle[1]['tag_id'];
            $tag3 = $tagsArticle[2]['tag_id'];
            $tag4 = $tagsArticle[3]['tag_id'];
            $tag5 = $tagsArticle[4]['tag_id'];
            $articlesRelated = Article::Published('no')->join('tagsarticles', 'tagsarticles.article_id', '=', 'articles.id')
            ->select('articles.*')->take(4)->where("articles.id","!=",$id)
            ->where(function($query) use($article,$id){
                $query->where("articles.category_id",$article->category_id);
            })
            ->orWhere(function($query) use($tag1,$tag2,$tag3,$tag4,$tag5,$id){
                  $query->where("tagsarticles.tag_id",$tag1)
                  ->orWhere("tagsarticles.tag_id",$tag2)
                  ->orWhere("tagsarticles.tag_id",$tag3)
                  ->orWhere("tagsarticles.tag_id",$tag4)
                  ->orWhere("tagsarticles.tag_id",$tag5);

            })
            ->orderBy('created_at','desc')->distinct()

            ->get();

        }


        return view("front.article.article",compact('article','tags','articles','categories','articlesRelated','tagsArticle','articlesRelated'));
    }

    public function list_articles(Request $request)
    {
        $dataArticles = Article::orderBy('created_at','desc')->get();

        $tagsArtclies = Tagsarticle::all();
        foreach ($dataArticles as $key => $article) {
            $articlesArray = [];
            foreach ($tagsArtclies as $key => $tag) {
                if($tag->article_id == $article->id){
                    $articlesArray[] = $tag->tag_id;
                }
            }
            // return $articlesArray;
            if(!empty($articlesArray)){
                $article->tags = $articlesArray;
            }
        }
        return $dataArticles;

    }

    // Administrar Articulos
    public function index()
    {

        $tags = Tag::orderBy('name','asc')->get();
        $dataArticles = Article::orderBy('created_at','desc')->get();
        $tagsArtclies = Tagsarticle::all();
        foreach ($dataArticles as $key => $article) {
            $articlesArray = [];
            foreach ($tagsArtclies as $key => $tag) {
                if($tag->article_id == $article->id){
                    $articlesArray[] = $tag->tag_id;
                }
            }
            // return $articlesArray;
            if(!empty($articlesArray)){
                $article->tags = $articlesArray;
            }
        }
        $categories = Category::orderBy('name','asc')->get();
        return view("articles.articles",compact("dataArticles","tags","categories"));
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
            'title'=>'required|unique:articles',
            'content'=>'required',
            'imageP'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageA1 = $request->imageA1;
        $imageA2 = $request->imageA2;
        $imageA3 = $request->imageA3;
        $imageA4 = $request->imageA4;


        if($imageA1 != Null){
            $request->validate([
                'imageA1'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
        }
        if($imageA2 != Null){
            $request->validate([
                'imageA2'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
        }
        if($imageA3 != Null){
            $request->validate([
                'imageA3'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
        }
        if($imageA4 != Null){
            $request->validate([
                'imageA4'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
        }

        $article = new Article;
        $article->fill($request->all());
        $article->save();

        $image = $request->file('imageP');
        $new_name = 'Article_'.$article->id.'_'.rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/articles/Article_'.$article->id), $new_name);

        $article->imageP = 'public/images/articles/Article_'.$article->id.'/'.$new_name;

        if($imageA1 != Null){
            // return response()->json(["result"=>"error","message"=>"dif"]);
            $new_name = 'Article_'.$article->id.'_'.rand() . '.' . $imageA1->getClientOriginalExtension();
            $imageA1->move(public_path('images/articles/Article_'.$article->id), $new_name);
            $article->imageA1 = 'public/images/articles/Article_'.$article->id.'/'.$new_name;
        }

        if($imageA2 != Null){
            // return response()->json(["result"=>"error","message"=>"dif"]);
            $new_name = 'Article_'.$article->id.'_'.rand() . '.' . $imageA2->getClientOriginalExtension();
            $imageA2->move(public_path('images/articles/Article_'.$article->id), $new_name);
            $article->imageA2 = 'public/images/articles/Article_'.$article->id.'/'.$new_name;
        }

        if($imageA3 != Null){
            // return response()->json(["result"=>"error","message"=>"dif"]);
            $new_name = 'Article_'.$article->id.'_'.rand() . '.' . $imageA3->getClientOriginalExtension();
            $imageA3->move(public_path('images/articles/Article_'.$article->id), $new_name);
            $article->imageA3 = 'public/images/articles/Article_'.$article->id.'/'.$new_name;
        }

        if($imageA4 != Null){
            // return response()->json(["result"=>"error","message"=>"dif"]);
            $new_name = 'Article_'.$article->id.'_'.rand() . '.' . $imageA4->getClientOriginalExtension();
            $imageA4->move(public_path('images/articles/Article_'.$article->id), $new_name);
            $article->imageA4 = 'public/images/articles/Article_'.$article->id.'/'.$new_name;
        }
        $article->save();
        if($request->tags != Null){
            foreach ($request->tags as $key => $tr) {
                $tag = new Tagsarticle;
                $tag->article_id = $article->id;
                $tag->tag_id = $tr;
                $tag->save();
            }
        }


        return response()->json(["result"=>"ok","message"=>"El artículo ha sido creado con éxito"]);
    }
    // se crea esta funcion ya q el form file no admite PUT
    public function articleUpdate(Request $request,$id)
    {
        $request->validate([
            'title'=>'required|unique:articles,title,'.$id.'',
            'autor'=>'required',
            'content'=>'required',
        ]);

        $imageP = $request->imageP;
        $imageA1 = $request->imageA1;
        $imageA2 = $request->imageA2;
        $imageA3 = $request->imageA3;
        $imageA4 = $request->imageA4;
        $article = Article::find($id);
        // si es dif null pide cambio
        if($imageP != Null){
            $request->validate([
                'imageP'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $imageP = $request->file('imageP');
            if(File::exists(base_path($article->imageP))) {
                File::delete(base_path($article->imageP));
            }
            $new_name = 'Article_'.$article->id.'_'.rand() . '.' . $imageP->getClientOriginalExtension();
            $imageP->move(public_path('images/articles/Article_'.$article->id), $new_name);
            $article->imageP = 'public/images/articles/Article_'.$article->id.'/'.$new_name;
        }

        if($imageA1 != Null){
            $request->validate([
                'imageA1'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $imageA1 = $request->file('imageA1');

            if(File::exists(base_path($article->imageA1))) {
                File::delete(base_path($article->imageA1));
            }
            $new_name = 'Article_'.$article->id.'_'.rand() . '.' . $imageA1->getClientOriginalExtension();
            $imageA1->move(public_path('images/articles/Article_'.$article->id), $new_name);
            $article->imageA1 = 'public/images/articles/Article_'.$article->id.'/'.$new_name;
        }
        if($imageA2 != Null){
            $request->validate([
                'imageA2'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $imageA2 = $request->file('imageA2');

            if(File::exists(base_path($article->imageA2))) {
                File::delete(base_path($article->imageA2));
            }
            $new_name = 'Article_'.$article->id.'_'.rand() . '.' . $imageA2->getClientOriginalExtension();
            $imageA2->move(public_path('images/articles/Article_'.$article->id), $new_name);
            $article->imageA2 = 'public/images/articles/Article_'.$article->id.'/'.$new_name;
        }
        if($imageA3 != Null){
            $request->validate([
                'imageA3'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $imageA3 = $request->file('imageA3');

            if(File::exists(base_path($article->imageA3))) {
                File::delete(base_path($article->imageA3));
            }
            $new_name = 'Article_'.$article->id.'_'.rand() . '.' . $imageA3->getClientOriginalExtension();
            $imageA3->move(public_path('images/articles/Article_'.$article->id), $new_name);
            $article->imageA3 = 'public/images/articles/Article_'.$article->id.'/'.$new_name;
        }
        if($imageA4 != Null){
            $request->validate([
                'imageA4'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $imageA4 = $request->file('imageA4');

            if(File::exists(base_path($article->imageA4))) {
                File::delete(base_path($article->imageA4));
            }
            $new_name = 'Article_'.$article->id.'_'.rand() . '.' . $imageA4->getClientOriginalExtension();
            $imageA4->move(public_path('images/articles/Article_'.$article->id), $new_name);
            $article->imageA4 = 'public/images/articles/Article_'.$article->id.'/'.$new_name;
        }

        // si acciona borrar imagesetthickness
        if($request->deleteImageA1 == 'si'){
            if(File::exists(base_path($article->imageA1))) {
                File::delete(base_path($article->imageA1));
            }
            $article->imageA1 = Null;
        }
        if($request->deleteImageA2 == 'si'){
            if(File::exists(base_path($article->imageA2))) {
                File::delete(base_path($article->imageA2));
            }
            $article->imageA2 = Null;
        }
        if($request->deleteImageA3 == 'si'){
            if(File::exists(base_path($article->imageA3))) {
                File::delete(base_path($article->imageA3));
            }
            $article->imageA3 = Null;
        }

        if($request->deleteImageA4 == 'si'){
            if(File::exists(base_path($article->imageA4))) {
                File::delete(base_path($article->imageA4));
            }
            $article->imageA4 = Null;
        }

        $article->fill($request->all());
        $article->save();

        $tagsArticles = Tagsarticle::where('article_id',$article->id)->get();

        foreach ($tagsArticles as $key => $value) {
            $value->delete();
        }

        if($request->tags != Null){
            foreach ($request->tags as $key => $tr) {
                $tag = new Tagsarticle;
                $tag->article_id = $article->id;
                $tag->tag_id = $tr;
                $tag->save();
            }
        }

        return response()->json(["result"=>"ok","message"=>"El artículo ha sido actualizado con éxito"]);

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
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return response()->json(["result"=>"ok","message"=>"Artículo eliminado con éxito"]);
    }
}