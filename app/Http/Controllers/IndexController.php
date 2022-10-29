<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(){
        return view('Clients.Home');
    }

    public function category(){
        return view('Clients.Category');
    }
    public function genre(){
        return view('Clients.Genre');
    }
    public function country(){
        return view('Clients.Country');
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
