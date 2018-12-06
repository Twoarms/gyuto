<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use Purifier;

class MusicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musics = Music::orderBy('updated_at', 'desc')->paginate(5);
        return view('musics.index')->with('musics', $musics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('musics.create');
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
            'urlVideoMusic' => 'required|url',
            'legendFr' => 'required',
            'legendEn' => 'required',
            'titleFr' => 'required',
            'titleEn' => 'required',
            'textFr' => 'required',
            'textEn' => 'required',
            'titleAlbumFr' => 'required',
            'titleAlbumEn' => 'required',
            'urlAlbumMusic' => 'required|url',
            'urlMusic' => 'required|url',
            'titleMusic' => 'required',
                      
        ]);

        $music = new Music;
        $music->urlVideoMusic = $request->input('urlVideoMusic');
        $music->legendFr = $request->input('legendFr');
        $music->legendEn = $request->input('legendEn');
        $music->titleFr = $request->input('titleFr');
        $music->titleEn = $request->input('titleEn');
        $music->textFr = Purifier::clean($request->input('textFr'));
        $music->textEn = Purifier::clean($request->input('textEn'));
        $music->titleAlbumFr = $request->input('titleAlbumFr');
        $music->titleAlbumEn = $request->input('titleAlbumEn');
        $music->urlAlbumMusic = $request->input('urlAlbumMusic');
        $music->urlMusic = $request->input('urlMusic');
        $music->titleMusic = $request->input('titleMusic');        

        $music->save();

        return redirect('/musics')->with('success', 'Votre image a été créée !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $music = Music::find($id);
        return view('musics.show')->with('music', $music);
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
