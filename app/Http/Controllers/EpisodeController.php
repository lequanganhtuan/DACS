<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Movie;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Episode::with('movie')->orderBy('id','DESC')->get();
        return view('admincp.episode.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movie = Movie::pluck('title','id');
        $list = Episode::with('movie')->orderBy('id','DESC')->get();
        return view('admincp.episode.form', compact('movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $episode =  new Episode();
        $episode -> movie_id = $data['movie_id'];
        $episode -> linkphim = $data['linkphim'];
        $episode -> episode = $data['episode'];
        $episode->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $episode = Episode::find($id);
        $movie = Movie::pluck('title','id');
        $list = Episode::with('movie')->orderBy('id','DESC')->get();
        return view('admincp.episode.form', compact('movie','episode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $episode =  Episode::find($id);
        $episode -> movie_id = $data['movie_id'];
        $episode -> linkphim = $data['linkphim'];
        $episode -> episode = $data['episode'];
        $episode->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $episode = Episode::find($id)->delete();
        return redirect()->back();
    }
    public function select_movie()
    {
        $id = $_GET['id'];
        $movie_by_id = Movie::find($id);
        $output ='<option value="">---Chọn tập phim---</option>';
        for ($i=1;$i<=$movie_by_id->sotap;$i++)
        {
            $output .='<option value="'.$i.'">'.$i.'</option>';

        }
        echo $output;
    }
}
