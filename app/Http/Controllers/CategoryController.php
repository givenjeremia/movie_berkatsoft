<?php

namespace App\Http\Controllers;

use App\Category;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $name = $request->get('category');
        $slug =  strtolower(str_replace(" ","_",$name));
        $cek_categori = Category::where('slug',$slug )->get();
        if(count($cek_categori) > 0){
            return redirect()->route('home')->with('status', 'Gagal Tambah Kategori, Kategori Ada Yang Sama');
        }
        else{
            $new = new Category();
            $new->name = $name;
            $new->slug = $slug;
            $new->save();
            return redirect()->route('home')->with('status', 'Berhasil Tambah Categori');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        //
        $id = $request->get('id');
        $name = $request->get('category');
        $slug =  strtolower(str_replace(" ","_",$name));
        $cek_categori = Category::where('slug',$slug )->get();
        if(count($cek_categori) > 0){
            return redirect()->route('home')->with('status', 'Gagal Update Kategori, Kategori Ada Yang Sama');
        }
        else{
            $new = Category::find($category);
            $new->name = $name;
            $new->slug = $slug;
            $new->save();
            return redirect()->route('home')->with('status', 'Berhasil Update Categori');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('home')->with('status', 'Berhasil Dihapus');
    }

    public function getEditForm(Request $request)
    {
        //
        $id = $request->get('id');
        $data = Category::find($id);
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('category.getEditForm',compact('data'))->render()
        ),200);
    }

    public function getMovieByCategory(Request $request)
    {
        //
        $client = new Client();
        $slug = $request->get('slug');
        $api_key = "cac3e076373be063b875780a52f38963";
        $url = "https://api.themoviedb.org/3/movie/".$slug."?api_key=".$api_key;

        $response = $client->request('GET', $url);

        $responseBody = json_decode($response->getBody());
        // dd($responseBody);
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('frontend.category',compact('responseBody'))->render()
        ),200);
    }
}
