<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::orderBy('updated_at', 'desc')->paginate(5);
        return view('images.index')->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titleFr' => 'required',
            'titleEn' => 'required' ,
            'galery' => 'required' ,
            'legendFr' => 'required' ,
            'legendEn' => 'required' ,
            'cover' => 'required' ,
            'urlImage' => 'required|url' ,
        ]);

        $image = new Image;
        $image->titleFr = $request->input('titleFr');
        $image->titleEn = $request->input('titleEn');
        $image->galery = $request->input('galery');
        $image->legendFr = $request->input('legendFr');
        $image->legendEn = $request->input('legendEn');
        $image->cover = $request->input('cover');
        $image->urlImage = $request->input('urlImage');

        $image->save();

        return redirect('/images')->with('success', 'Votre image a été créée !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::find($id);
        return view('images.show')->with('image', $image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
