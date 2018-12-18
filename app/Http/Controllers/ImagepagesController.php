<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagepage;
use Image;

class ImagepagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theimages = Imagepage::all();
        // $theimages = Imagepage::get();
        return view('imagepages.index', compact('theimages'));
        // return view('imagepages.index')->withTheimages($theimages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $theimages = Imagepage::orderBy('updated_at', 'desc')->paginate(20);
        return view('albums.create', compact('theimages'));
        // return view('pageimages.create');          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $album = Album::find($ids['albumid']);
        $this->validate($request, [
            // 'titleFr' => 'required',
            // 'titleEn' => 'required',
            // 'legendFr' => 'required',
            // 'legendEn' => 'required',
            'nameImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $theimage = new Imagepage;
        $theimage->titleIFr = $request->input('titleIFr');
        $theimage->titleIEn = $request->input('titleIEn');
        $theimage->legendIFr = $request->input('legendIFr');
        $theimage->legendIEn = $request->input('legendIEn');
        $theimage->nameImage = $request->input('nameImage');

        if ($request->hasFile('nameImage')) {
            $myImage = $request->file('nameImage');
            $filename = time() . '.' . $myImage->getClientOriginalExtension();
            $location = public_path('myimages/' . $filename);
            Image::make($myImage)->resize(800,400)->save($location);

            $theimage->nameImage = $location;
            // dd($location);
        }


        var_dump($request);
        if ( $theimage->save()) {
            $theimage->albums()->sync($request->albums, false);
                    return back()->with('album', $album)->withInput()->with('success', 'Image uploaded successfully !');            
        }
        // return redirect()->route('inc.imagemodale');
        // Imagepage::create($theimage);
        // $fetcheImage = Imagepage::find($theimage->id);
        // var_dump($fetcheImage);

        // return back()
        //         ->with('success', 'Image uploaded successfully !');
        // return back()
        //          ->with('theimage', $theimage);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $theimage = Imagepage::find($id);
        return view('imagepages.index')->with('theimage', $theimage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($albumid,$imageid)
    {
        $album = Album::find($albumid);
        $theimage = Imagepage::find($imageid);
        return view('inc.imagemodale')->with('theimage', $theimage)->with('album', $album);
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
        Imagepage::find($id)->delete();
        return back()
                ->with('success', 'Image removed successfully !');
    }
}
