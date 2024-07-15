<?php
use App\Category;
// use Auth;
function Categories(){
    $categories = Category::orderBy('name','asc')->get();
    return $categories;
}

// Funciones Auditoria Cruds
function createdFor($variable){
    $variable->cretated_for_id = Auth::user()->id;
    return $variable;
}

function updatedFor($variable){
    $variable->updated_for_id = Auth::user()->id;
    return $variable;
}

function disabled($variable){
    $variable->disabled = 'si';
    $variable->disabled_at = \Carbon\Carbon::now();
    $variable->save();
}
