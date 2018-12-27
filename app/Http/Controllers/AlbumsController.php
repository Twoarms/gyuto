<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Imagepage;

// Façade Image de intervention image
use Image; 

class AlbumsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::orderBy('updated_at', 'desc')->paginate(5);
        return view('albums.index')->with('albums', $albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theimages = Imagepage::orderBy('updated_at', 'desc')->paginate(20);
        return view('albums.create', compact('theimages'));
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
            'titleEn' => 'required',
            'titleIFr',
            'titleIEn',
            'legendIFr',
            'legendIEn',
            'nameImage',
            'cover',
        ]);

        $album = new Album;
        $album->titleFr = $request->input('titleFr');
        $album->titleEn = $request->input('titleEn');
        $theimages = Imagepage::all();
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
            Image::make($myImage)->resize(800,400)->save($location);
            $theimage->nameImage = $filename;
        }
        if (($request->input('confirmer')) == 'confirmer') {       
            $album->save();
            return redirect()->action('AlbumsController@edit', $album)->with('success', 'Album créé!');    
        }
        if (($request->input('action')) == 'save' && is_null($album->id))  {
            $album->save();
            $theimage->save();
            $album->imagepages()->sync($theimage->id, false);
            return redirect()->action('AlbumsController@edit', $album)->with('success', 'Image créée!');
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
        $album = Album::find($id);
        $theimages = Imagepage::all();
        $myimages = $album->imagepages;
        return view('albums.show')->with('album', $album)->with('myimages',$myimages)->with('theimages',$theimages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        $theimages = Imagepage::all();
        $myimages = $album->imagepages;
        return view('albums.edit')->with('album', $album)->with('theimages', $theimages)->with('myimages',$myimages);        
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
        $album = Album::find($id);
        if (($request->input('action')) == 'save')  {
            $theimage = Imagepage::find($request->input('didImg'));
            if ($theimage)
            {
                $theimage->id = $request->input('didImg');    
            }
            else {
                $theimage = new Imagepage;    
            }          
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
                Image::make($myImage)->resize(800,400)->save($location);
                $theimage->nameImage = $filename;
            }          
            $album = Album::find($album->id);
            $theimage->save();
            $album->imagepages()->sync($theimage->id, false);
            return redirect()->action('AlbumsController@edit', $album);
        }        
        if (($request->input('confirmer')) == 'confirmer') {    
            $this->validate($request, [
            'titleFr' => 'required',
            'titleEn' => 'required',
            ]);
            $album->titleFr = $request->input('titleFr');
            $album->titleEn = $request->input('titleEn');
            $album->save();
            return back()->withInput()->with('success', 'Album créé!');
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
