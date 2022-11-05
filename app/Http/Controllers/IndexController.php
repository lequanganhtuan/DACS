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
        $category = Category::orderBy('id','DESC')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        return view('Clients.Home', compact('category', 'genre', 'country'));
    }

    public function category($slug){
        $category = Category::orderBy('id','DESC')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        return view('Clients.Category', compact('category', 'genre', 'country'));
    }
    public function genre($slug){
        $category = Category::orderBy('id','DESC')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        return view('Clients.Genre', compact('category', 'genre', 'country'));
    }
    public function country($slug){
        $category = Category::orderBy('id','DESC')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        return view('Clients.Country', compact('category', 'genre', 'country'));
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
