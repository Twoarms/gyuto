<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Imagepage;

use Image;

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
        $theimages = Imagepage::all();
        return view('videos.create', compact('theimages'));
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
            'titleVFr' => 'required' ,
            'titleVEn' => 'required' ,
            'category' => 'required' ,
            'citationVFr' => 'required' ,
            'citationVEn' => 'required' ,
            'legendVFr' => 'required' ,
            'legendVEn' => 'required' ,
            'urlVideoFr' => 'required|url',
            'urlVideoEn' => 'required|url',
            'durationVideo',
            'nameImage',
            'titleIFr',
            'titleIEn',
            'legendIFr',
            'legendIEn',
            'nameImage',
        ]);

        $video = new Video;
        $video->titleVFr = $request->input('titleVFr');
        $video->titleVEn = $request->input('titleVEn');
        $video->category = $request->input('category');
        $video->citationVFr = $request->input('citationVFr');
        $video->citationVEn = $request->input('citationVEn');
        $video->legendVFr = $request->input('legendVFr');
        $video->legendVEn = $request->input('legendVEn');
        $video->urlVideoFr = $request->input('urlVideoFr');
        $video->urlVideoEn = $request->input('urlVideoEn');
        $video->durationVideo = $request->input('durationVideo');
        $theimages = Imagepage::all();
        $theimage = new Imagepage;
        $theimage->titleIFr = $request->input('titleIFr');
        $theimage->titleIEn = $request->input('titleIEn');
        $theimage->legendIFr = $request->input('legendIFr');
        $theimage->legendIEn = $request->input('legendIEn');
        $theimage->cover = 1;    
        $theimage->nameImage = $request->input('nameImage');
        if ($request->hasFile('nameImage')) {
            $myImage = $request->file('nameImage');
            $filename = time() . '.' . $myImage->getClientOriginalExtension();
            $location = public_path('myimages/' . $filename);
            if ($myImage->getClientOriginalExtension() == 'gif') {
                copy($myImage->getRealPath(), $location);        
            } 
            else {
                $img = Image::make($myImage)->resize(800,400);
                $img->save($location);
                $width = $img->width();
                $height = $img->height();
                $img->destroy();                
            }    
            $theimage->nameImage = $filename;
            
        }        
        if (($request->input('confirmer')) == 'confirmer') {   
            $video->save();            
            return redirect()->action('VideosController@edit', $video)->with('success', 'Vidéo créée!');
        }
        if (($request->input('action')) == 'save')  {
            $theimage->save();            
            $video->imagepage()->associate($theimage);
            $video->save();
            return redirect()->action('VideosController@edit', $video)->with('success', 'Image créée!');
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
        $video = Video::find($id);
        $theimages = Imagepage::all();
        $theimage = $video->imagepage;
        return view('videos.show')->with('video', $video)->with('theimage',$theimage)->with('theimages',$theimages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        $theimage = $video->imagepage;
        $theimages = Imagepage::all();
        return view('videos.edit')->with('video', $video)->with('theimages', $theimages)->with('theimage', $theimage);
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
        $video = Video::find($id);
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
            $theimage->cover = 1;
            $theimage->nameImage = $request->input('nameImage');
            if ($request->hasFile('nameImage')) {
                $myImage = $request->file('nameImage');
                $filename = time() . '.' . $myImage->getClientOriginalExtension();
                $location = public_path('myimages/' . $filename);
                if ($myImage->getClientOriginalExtension() == 'gif') {
                    copy($myImage->getRealPath(), $location);        
                } 
                else {
                    $img = Image::make($myImage)->resize(800,400);
                    $img->save($location);
                    $width = $img->width();
                    $height = $img->height();
                    $img->destroy();                
                }    
                $theimage->nameImage = $filename;                
            }  
            $video = Video::find($video->id);
            $theimage->save();
            $video->imagepage()->associate($theimage);
            $video->save();
            return redirect()->action('VideosController@edit', $video);
        }        
        if (($request->input('confirmer')) == 'confirmer') {    
            $this->validate($request, [
            'titleVFr' => 'required' ,
            'titleVEn' => 'required' ,
            'category' => 'required' ,
            'citationVFr' => 'required' ,
            'citationVEn' => 'required' ,
            'legendVFr' => 'required' ,
            'legendVEn' => 'required' ,
            'urlVideoFr' => 'required|url',
            'urlVideoEn' => 'required|url',
            'durationVideo',            
        ]);
        $video->titleVFr = $request->input('titleVFr');
        $video->titleVEn = $request->input('titleVEn');
        $video->category = $request->input('category');
        $video->citationVFr = $request->input('citationVFr');
        $video->citationVEn = $request->input('citationVEn');
        $video->legendVFr = $request->input('legendVFr');
        $video->legendVEn = $request->input('legendVEn');
        $video->urlVideoFr = $request->input('urlVideoFr');
        $video->urlVideoEn = $request->input('urlVideoEn');
        $video->durationVideo = $request->input('durationVideo');
        $video->save();
        return redirect('/videos')->with('success', 'Vidéo créée!');
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