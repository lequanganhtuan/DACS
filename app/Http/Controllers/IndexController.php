<?php

namespace App\Http\Controllers;

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
       
        return view('Clients.Category', compact('category', 'genre', 'country', 'cate_slug'));
    }
    public function genre($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1)->get();
        $country = Country::orderBy('id','DESC')->where('status',1)->get();
        $gen_slug = Genre::where('slug',$slug)->where('status',1)->first();
        return view('Clients.Genre', compact('category', 'genre', 'country','gen_slug'));
    }
    public function country($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1)->get();
        $country = Country::orderBy('id','DESC')->where('status',1)->get();
        $coun_slug = Country::where('slug',$slug)->where('status',1)->first();
        return view('Clients.Country', compact('category', 'genre', 'country', 'coun_slug'));
    }
    public function movie(){
        return view('Clients.Movie');
    }
    public function watch(){
        return view('Clients.Watch');
    }

    public function episode(){
        return view('Clients.Episode');
    }
}
