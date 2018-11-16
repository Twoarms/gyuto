<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('updated_at', 'desc')->paginate(5);
        return view('videos.index')->with('videos', $videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.create');
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
            'titleFr' => 'required' ,
            'titleEn' => 'required' ,
            'category' => 'required' ,
            'citationFr' => 'required' ,
            'citationEn' => 'required' ,
            'legendFr' => 'required' ,
            'legendEn' => 'required' ,
            'gif' => 'required' ,
            'urlVideo' => 'required|url' ,

        ]);

        $video = new Video;
        $video->titleFr = $request->input('titleFr');
        $video->titleEn = $request->input('titleEn');
        $video->category = $request->input('category');
        $video->citationFr = $request->input('citationFr');
        $video->citationEn = $request->input('citationEn');
        $video->legendFr = $request->input('legendFr');
        $video->legendEn = $request->input('legendEn');
        $video->gif = $request->input('gif');
        $video->urlVideo = $request->input('urlVideo');

        $video->save();

        return redirect('/videos')->with('success', 'Votre vidéo a été créé !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);
        return view('videos.show')->with('video', $video);
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
