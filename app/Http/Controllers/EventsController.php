<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Imagepage;

use Image;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(5);
        return view('events.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theimages = Imagepage::orderBy('updated_at', 'desc')->paginate(20);
        return view('events.create', compact('theimages'));        
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
            'title' => 'required',
            'datestart' => 'required|date',
            'dateend' => 'required|date',
            'hourstart' => 'required',            
            'hourend' => 'required',
            'place' => 'required',
            'number' => 'required',
            'street' => 'required',
            'zipCode' => 'required',
            'city' => 'required',
            'country' => 'required',
            'descriptionfr' => 'required',
            'descriptionen' => 'required',
            // 'nameImage' => 'mimes:gif',
            'titleIFr',
            'titleIEn',
            'legendIFr',
            'legendIEn',
            'nameImage',
            'cover',
        ]);

        $event = new Event;
        $event->title = $request->input('title');   
        $event->datestart = $request->input('datestart');
        $event->dateend = $request->input('dateend');
        $event->hourstart = $request->input('hourstart');     
        $event->hourend = $request->input('hourend');
        $event->place = $request->input('place');
        $event->number = $request->input('number');
        $event->street = $request->input('street');
        $event->zipCode = $request->input('zipCode');
        $event->city = $request->input('city');
        $event->country = $request->input('country');
        $event->descriptionfr = $request->input('descriptionfr');
        $event->descriptionen = $request->input('descriptionen'); 

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
        // dd($request->input('nameImage'));
        if ($request->hasFile('nameImage')) {
        //   dd($request->input('nameImage'));
            $myImage = $request->file('nameImage');
            $filename = time() . '.' . $myImage->getClientOriginalExtension();
            $location = public_path('myimages/' . $filename);
            Image::make($myImage)->resize(800,400)->save($location);
            $theimage->nameImage = $filename;
        }

       // $weight = filesize($filename);
        // $size = getimagesize($filename);
        // $dimensions = $size[3];
        // dd($filename);
        
        if (($request->input('confirmer')) == 'confirmer') {   
            $event->save();            
            return redirect()->action('EventsController@edit', $event)->with('success', 'Evènement créé!');
        }

        if (($request->input('action')) == 'save')  {
            $theimage->save();            
            $event->imagepage()->associate($theimage);
            $event->save();
            return redirect()->action('EventsController@edit', $event)->with('success', 'Image créée!');
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
        $event = Event::find($id);
        $theimages = Imagepage::all();
        $theimage = $event->imagepage;
        return view('events.show')->with('event', $event)->with('theimage',$theimage)->with('theimages',$theimages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $theimage = $event->imagepage;
        $theimages = Imagepage::all();

        return view('events.edit')->with('event', $event)->with('theimages', $theimages)->with('theimage', $theimage);
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
        $event = Event::find($id);

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
                Image::make($myImage)->resize(800,400)->save($location);
                $theimage->nameImage = $filename;
            }
            
            $event = Event::find($event->id);
            $theimage->save();
            return redirect()->action('EventsController@edit', $event);
        }
        
        if (($request->input('confirmer')) == 'confirmer') {    
            $this->validate($request, [
            'title' => 'required',
            'datestart' => 'required|date',
            'dateend' => 'required|date',
            'hourstart' => 'required',            
            'hourend' => 'required',
            'place' => 'required',
            'number' => 'required',
            'street' => 'required',
            'zipCode' => 'required',
            'city' => 'required',
            'country' => 'required',
            'descriptionfr' => 'required',
            'descriptionen' => 'required',           
        ]);

        $event->title = $request->input('title');   
        $event->datestart = $request->input('datestart');
        $event->dateend = $request->input('dateend');
        $event->hourstart = $request->input('hourstart');     
        $event->hourend = $request->input('hourend');
        $event->place = $request->input('place');
        $event->number = $request->input('number');
        $event->street = $request->input('street');
        $event->zipCode = $request->input('zipCode');
        $event->city = $request->input('city');
        $event->country = $request->input('country');
        $event->descriptionfr = $request->input('descriptionfr');
        $event->descriptionen = $request->input('descriptionen');
        $event->save();
        return redirect('/events')->with('success', 'Evènement créé!');
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
