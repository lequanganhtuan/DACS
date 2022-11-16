<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Episode;

class IndexController extends Controller
{
    public function home(){
        $phimhot=Movie::where('hot',1)->where('status',1)->get();
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1)->get();
        $country = Country::orderBy('id','DESC')->where('status',1)->get();
        $category_home = Category::with('movie')->orderBy('id','DESC')->where('status',1)->get();
        return view('Clients.Home', compact('category', 'genre', 'country','category_home','phimhot'));
    }

    public function category($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $cate_slug = Category::where('slug',$slug)->first();
        $movie = Movie::where('category_id', $cate_slug->id)->paginate(40);
        return view('Clients.Category', compact('category', 'genre', 'country', 'cate_slug','movie'));
    }
    public function genre($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1)->get();
        $country = Country::orderBy('id','DESC')->where('status',1)->get();
        $gen_slug = Genre::where('slug',$slug)->where('status',1)->first();
        $movie = Movie::where('genre_id', $gen_slug->id)->paginate(40);
        return view('Clients.Genre', compact('category', 'genre', 'country','gen_slug','movie'));
    }
    public function country($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1)->get();
        $country = Country::orderBy('id','DESC')->where('status',1)->get();
        $coun_slug = Country::where('slug',$slug)->where('status',1)->first();
        $movie = Movie::where('country_id', $coun_slug->id)->paginate(40);
        return view('Clients.Country', compact('category', 'genre', 'country', 'coun_slug','movie'));
    }
    public function movie($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1)->get();
        $country = Country::orderBy('id','DESC')->where('status',1)->get();
        $movie = Movie::with('category','genre','country')->where('slug',$slug)->where('status',1)->first();
        $releated = Movie::with('category','genre','country')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        return view('Clients.Movie',compact('category', 'genre', 'country','movie','releated'));
    }
    public function watch(){
        return view('Clients.Watch');
    }

    public function episode(){
        return view('Clients.Episode');
    }
}
