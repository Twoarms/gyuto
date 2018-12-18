<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use App\Models\Imagepage;

// Façade Image de intervention image
use Image;

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
        $theimages = Imagepage::orderBy('updated_at', 'desc')->paginate(20);
        return view('musics.create', compact('theimages'));        
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
            'legendMFr' => 'required',
            'legendMEn' => 'required',
            'titleMFr' => 'required',
            'titleMEn' => 'required',
            'textMFr' => 'required',
            'textMEn' => 'required',
            'titleAlbum' => 'required',
            'urlAlbumMusicCdeFr' => 'required|url',
            'urlAlbumMusicCdeEn' => 'required|url',
            'titleIFr',
            'titleIEn',
            'legendIFr',
            'legendIEn',
            'nameImage',
            'cover',
        ]);

        $music = new Music;
        $music->urlVideoMusic = $request->input('urlVideoMusic');
        $music->legendMFr = $request->input('legendMFr');
        $music->legendMEn = $request->input('legendMEn');
        $music->titleMFr = $request->input('titleMFr');
        $music->titleMEn = $request->input('titleMEn');
        $music->textMFr = $request->input('textMFr');
        $music->textMEn = $request->input('textMEn');
        $music->titleAlbum = $request->input('titleAlbum');
        $music->urlAlbumMusicCdeFr = $request->input('urlAlbumMusicCdeFr');
        $music->urlAlbumMusicCdeEn = $request->input('urlAlbumMusicCdeEn');

        $theimages = Imagepage::orderBy('updated_at', 'desc')->paginate(20);
        $theimage = new Imagepage;
        $theimage->titleIFr = $request->input('titleIFr');
        $theimage->titleIEn = $request->input('titleIEn');
        $theimage->legendIFr = $request->input('legendIFr');
        $theimage->legendIEn = $request->input('legendIEn');
        $theimage->cover = $request->input('cover');

        if($theimage->cover == 'no'){
          // logic
        }
          else{
          // logic
        } 

        $theimage->nameImage = $request->input('nameImage');
        if ($request->hasFile('nameImage')) {
                $myImage = $request->file('nameImage');
                $filename = time() . '.' . $myImage->getClientOriginalExtension();
                $location = public_path('myimages/' . $filename);
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                if (PATHINFO_EXTENSION == "mp3") {
                   $myImage->move($location,$filename);                   
                }
                else {
                    Image::make($myImage)->resize(800,400)->save($location);
                }                
                $theimage->nameImage = $filename;
            }
        
        // $weight = filesize($filename);
        // $size = getimagesize($filename);
        // $dimensions = $size[3];
        // dd($filename);
        
        if (($request->input('confirmer')) == 'confirmer') {       
            $music->save();
            return redirect()->action('MusicsController@edit', $music)->with('success', 'Page Musique créée!');
        }

        if (($request->input('action')) == 'save' && is_null($music->id))  {
            $music->save();
            $theimage->save();
            $music->imagepages()->sync($theimage->id, false);
            return redirect()->action('MusicsController@edit', $music)->with('success', 'Image créée!');
            }    
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
        $music = Music::find($id);
        $theimages = Imagepage::all();

        return view('musics.edit')->with('music', $music)->with('theimages', $theimages);
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
        $music = Music::find($id);

        if (($request->input('action')) == 'save')  {
            $theimage = new Imagepage;
            $theimage->titleIFr = $request->input('titleIFr');
            $theimage->titleIEn = $request->input('titleIEn');
            $theimage->legendIFr = $request->input('legendIFr');
            $theimage->legendIEn = $request->input('legendIEn');
            $theimage->cover = $request->input('cover');
            $theimage->nameImage = $request->input('nameImage');

            if ($request->hasFile('nameImage')) {
                $myImage = $request->file('nameImage');
                $filename = time() . '.' . $myImage->getClientOriginalExtension();
                $location = public_path('myimages/' . $filename);
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                if (PATHINFO_EXTENSION == "mp3") {
                   $myImage->move($location,$filename);                   
                }
                else {
                    Image::make($myImage)->resize(800,400)->save($location);
                }                
                $theimage->nameImage = $filename;
            }
                      
            $music = Music::find($music->id);
            $theimage->save();
            $music->imagepages()->sync($theimage->id, false);
            return redirect()->action('MusicsController@edit', $music);
        }
        
        if (($request->input('confirmer')) == 'confirmer') {    
            $this->validate($request, [
            'urlVideoMusic' => 'required|url',
            'legendMFr' => 'required',
            'legendMEn' => 'required',
            'titleMFr' => 'required',
            'titleMEn' => 'required',
            'textMFr' => 'required',
            'textMEn' => 'required',
            'titleAlbum' => 'required',
            'urlAlbumMusicCdeFr' => 'required|url',
            'urlAlbumMusicCdeEn' => 'required|url',
            ]);

            $music->urlVideoMusic = $request->input('urlVideoMusic');
        $music->legendMFr = $request->input('legendMFr');
        $music->legendMEn = $request->input('legendMEn');
        $music->titleMFr = $request->input('titleMFr');
        $music->titleMEn = $request->input('titleMEn');
        $music->textMFr = $request->input('textMFr');
        $music->textMEn = $request->input('textMEn');
        $music->titleAlbum = $request->input('titleAlbum');
        $music->urlAlbumMusicCdeFr = $request->input('urlAlbumMusicCdeFr');
        $music->urlAlbumMusicCdeEn = $request->input('urlAlbumMusicCdeEn');

            $music->save();
            return back()->withInput()->with('success', 'Page Music créée!');
        }
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
