<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;

use Illuminate\Validation\Rule;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function list_admincategories(Request $request) {
        $dataCategories = Category::orderBy('id','desc')->get();
       return $dataCategories;
     }

    public function index()
    {
        $dataCategories = Category::Disabled('no')->orderBy('id','desc')->get();
        return view('category.category',compact('dataCategories'));
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
            'name'=>'required|'.Rule::unique('categories')->whereNull('disabled'),
        ]);


        $category = new Category;
        $category = createdFor($category);
        $category->name = $request->name;
        $category->save();

        return response()->json(["result"=>"ok","message"=>"Se ha creado la categoría con éxito"]);

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
            'name'=>'required|'.Rule::unique('categories')->whereNull('disabled')->ignore($id),
        ]);

        $category = Category::find($id);
        $category = updatedFor($category);
        $category->name = $request->name;
        $category->save();

        return response()->json(["result"=>"ok","message"=>"Se ha actualizado la categoría"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     public function disabledCategory($id)
     {
         $category = Category::find($id);
         disabled($category);

         return response()->json(["result"=>"ok","message"=>"Se ha deshabilitado la categoría con éxito."]);
     }
     public function enabledCategory($id)
     {
         $category = Category::find($id);
         $category->disabled = 'no';
         $category->save();
         return response()->json(["result"=>"ok","message"=>"Se ha deshabilitado la categoría con éxito."]);
     }
    public function destroy($id)
    {
        $category = Category::find($id);
        $articles = Article::where("category_id",$id)->count();
        if($articles != 0){
            return response()->json(["result"=>"error","message"=>"Imposible borrar categoría debido a que algunos artículos dependen de esta categoría."]);
        }
        $category->delete();

        return response()->json(["result"=>"ok","message"=>"Se ha eliminado la categoría con éxito."]);
    }
}
