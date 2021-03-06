<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Movie;
use phpDocumentor\Reflection\DocBlock\Description;
use PhpParser\Node\Expr\AssignOp\Mod;
use voku\helper\ASCII;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Auth;




class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies=Movie::all()->toArray();
        return view('/movie.index',compact('movies'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movie.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id' =>'required',
            'name' =>'required',
            'description' =>'required',
            'rating' =>'required'
            ]);
        $movie=new Movie([
            'id' => $request->get('id'),
            'name' => $request->get('name'),
            'description'=>$request->get('description'),
            'rating' => $request->get('rating'),
        ]);
        $movie->save();
        return redirect()->route('movie.index')->with('success','Data Added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*$movie=Movie::exists($id);
        echo ($movie->name);
        return view('movie.edit',compact('movie','id'));*/
        $movies=Movie::find($id);
        return view('movie.edit',compact('movies','id'));
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


            $movie=Movie::find($id);
            $movie->id=$request->get('id');
            $movie->name=$request->get('name');
            $movie->description=$request->get('description');
            $movie->rating=$request->get('rating');
            $movie->save();
            return redirect()->route('movie.index')->with('success','Data Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie=Movie::find($id);
        $movie->delete();
        return redirect()->route('movie.index')->with('success','Data Deleted');

    }
}
