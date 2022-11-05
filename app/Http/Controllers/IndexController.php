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
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        return view('Clients.Home', compact('category', 'genre', 'country'));
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
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $gen_slug = Genre::where('slug',$slug)->first();
        return view('Clients.Genre', compact('category', 'genre', 'country','gen_slug'));
    }
    public function country($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $coun_slug = Country::where('slug',$slug)->first();
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
