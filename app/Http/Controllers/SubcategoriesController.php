<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subcategories;


class SubcategoriesController extends Controller
{
    public function loadsubcategories(){
        $subcategories = subcategories::query();  
        if(request()->category_id){
            $subcategories = $subcategories->where('category_id',request()->category_id)->get();

        }elseif(request()->category_name){
                $category_id = \App\Models\Category::query()->where('category',request()->category_name)->pluck('id')->firstorFail();
                $subcategories = $subcategories->where('category_id',$category_id)->get();
        }else{
              $subcategories = subcategories::all()->random(8);  

        }     
        return([
            'subcategories' => $subcategories
        ]);
    }
}
