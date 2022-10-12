<?php

namespace App\Http\Controllers;

use App\Place;
use App\Prefecture;
use App\Tag;
use Illuminate\Http\Request;
use Storage;

class PlaceController extends Controller
{
    public function index(Prefecture $prefectures,Tag $tags)
    {
        return view('places/index')->with([
            'prefectures' => $prefectures->get(),
            'tags' => $tags->get()
            ]);
    }
    
    public function serchPrefecture(Request $request)
    {
        $input=$request['keyword'];
        
        //検索ボックスが両方ともnullではないとき
        if(!empty($input['prefecture']) && !empty($input['tag'])){
            $prefecture=$input['prefecture'];
            $tag= $input['tag'];
            $prefecture=Place::whereHas('prefecture', function($query) use ($prefecture){
                $query ->where('name','LIKE',$prefecture);
            })->first();
            $tag=Place::whereHas('tag', function($query) use ($tag){
                $query ->where('name','LIKE',$tag);
            })->first();
        
            $places=Place::wherePrefecture_id($prefecture->prefecture_id)->whereTag_id($tag->tag_id)->get();
            
            return view('places/result')->with([
                'keyword' => $input,
                'places' => $places
                ]);
                
        }elseif(!empty($input['prefecture'])){
            $prefecture=$input['prefecture'];
            $places=Place::whereHas('prefecture', function($query) use ($prefecture){
                $query ->where('name','LIKE',$prefecture);
            })->get();
            
            return view('places/result')->with([
                'keyword' => $input,
                'places' => $places
                ]);
                
        }elseif(!empty($input['tag'])){
            $tag= $input['tag'];
            $places=Place::whereHas('tag', function($query) use ($tag){
                $query ->where('name','LIKE',$tag);
            })->get();
            
            return view('places/result')->with([
                'keyword' => $input,
                'places' => $places
                ]);
        }
        
    }
    
    public function serchKeyword(Request $request)
    {
        
        $keyword = $request->input('keyword');
        $query = Place::query();

        if(!empty($keyword)) {
            $query->where('adress', 'LIKE', "%{$keyword}%")
                ->orwhere('name','LIKE',"%{$keyword}%");
        }
        
        $places = $query->get();
     
        $tags=Place::whereHas('tag', function($query2) use ($keyword){
            $query2 ->where('name','LIKE',$keyword);
        })->get();
        
        if($places->isNotEmpty()){
            return view('places/result')->with([
                'places' => $places,
                'keyword' => $keyword,
                ]);
        }elseif($tags->isNotEmpty()){
            return view('places/result')->with([
                'places' => $tags,
                'keyword' => $keyword,
                ]);
        }else{
            return redirect ('/places/');
        }
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
        $tag = $request['place_tag'];
       
        if ($image != null){
            $path = Storage::disk('s3')->putFile('posts_image', $image, 'public');
            $input['image']=Storage::disk('s3')->url($path);
        }
        
        //adressから都道府県を抽出
        $regex = '/東京都|北海道|(?:京都|大阪)府|.{6,9}県/';
        preg_match_all($regex, $input["adress"], $matches);
        //dd($matches[0][0]);
        
        $prefecture = Prefecture::whereName($matches)->first();
        $input['prefecture_id'] = $prefecture->id;
        
        $query_tag = Tag::query()->where('name', 'LIKE', "%{$tag}%");
        $tag = $query_tag->get();
        $input['tag_id'] = $tag[0]->id;
        
       
        $place -> fill($input) -> save();
        
        return redirect ('/places/'.$place->id);
    }
}
