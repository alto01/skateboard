<?php

namespace App\Http\Controllers;

use App\Place;
use App\Prefecture;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index(Prefecture $prefectures)
    {
        return view('places/index')->with(['prefectures' => $prefectures->get()]);
    }
    
    public function serch(Request $request)
    {
        $keyword =  $request->input('keyword');
        $query = Place::query();

           
        if(!empty($keyword)) {
            $query->where('prefecture', 'LIKE', "%{$keyword}%")
                ->orwhere('name','LIKE',"%{$keyword}%")
                ->orwhere('adress','LIKE',"%{$keyword}%");
        }
        
        $places = $query->get();
        
        // $places=Place::whereHas('prefecture', function($query) use ($keyword){
        //     $query ->where('name','LIKE',"%{$keyword}%");
        // })->get();
        

        return view('places/result')->with([
            'places' => $places,
            'keyword' => $keyword,
            ]);
    }
    
   public function create(){
       return view ('places/create');
   }
}
