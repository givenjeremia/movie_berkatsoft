<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Category;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::all();
        $category_first_klik = Category::first();
        
        return view('frontend.dashboard',compact('category','category_first_klik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }

  

    public function getMovieDetail(Request $request)
    {
        $client = new Client();
        $id = $request->get('id');
        $api_key = "cac3e076373be063b875780a52f38963";
        $url = "https://api.themoviedb.org/3/movie/".$id."?api_key=".$api_key;

        $response = $client->request('GET', $url);

        $responseBody = json_decode($response->getBody());
        // dd($responseBody);
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('frontend.getDetailMovie',compact('responseBody'))->render()
        ),200);
    }

}
