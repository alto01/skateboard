<?php

namespace App\Http\Controllers;

use App\Place;
use App\Prefecture;
use App\Tag;
use Illuminate\Http\Request;
use Storage;

class PlaceController extends Controller
{
    public function index(Prefecture $prefectures)
    {
        return view('places/index')->with(['prefectures' => $prefectures->get()]);
    }
    
    public function serch(Request $request)
    {
         $keyword = $request->input('keyword');
        // $query = Place::query();

           
        // if(!empty($keyword)) {
        //     $query->where('prefecture', 'LIKE', "%{$keyword}%")
        //         ->orwhere('name','LIKE',"%{$keyword}%")
        //         ->orwhere('adress','LIKE',"%{$keyword}%");
        // }
        
        // $places = $query->get();
        
        $places=Place::whereHas('prefecture', function($query) use ($keyword){
            $query ->where('name','LIKE',$keyword);
        })->get();
        

        return view('places/result')->with([
            'places' => $places,
            'keyword' => $keyword,
            ]);
    }
    
    public function show(Place $place){
         return view('places/show')->with(['place' => $place]);
    }
    
    public function create(Prefecture $prefectures, Tag $tags){
       return view ('places/create')->with([
           'prefectures' => $prefectures->get(),
           'tags' => $tags->get(),
           ]);
   }
   
    public function store(Request $request, Place $place){
        $input = $request['place'];
        $image = $request->file('image');
        $prefecture =$request['place_prefecture'];
        $tag = $request['place_tag'];
        
       
        if ($image != null){
            $path = Storage::disk('s3')->putFile('posts_image', $image, 'public');
            $input['image']=Storage::disk('s3')->url($path);
        }
        
        $query_prefecture = Prefecture::query()->where('name', 'LIKE', "%{$prefecture}%");
        $prefecture = $query_prefecture->get();
        $input['prefecture_id'] = $prefecture[0]->id;
        
        $input['prefecture'] = $prefecture[0]->name;
        
        $query_tag = Tag::query()->where('name', 'LIKE', "%{$tag}%");
        $tag = $query_tag->get();
        $input['tag_id'] = $tag[0]->id;
        
       
        $place -> fill($input) -> save();
        
        return redirect ('/places/'.$place->id);
    }
}
