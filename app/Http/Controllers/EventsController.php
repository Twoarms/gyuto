<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Purifier;

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
        return view('events.create');
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
            'dateFrom' => 'required|date',
            'dateEnd' => 'required|date',
            'timeStart' => 'required|date_format:"H:i"',            
            'timeEnd' => 'required|date_format:"H:i"',
            'numberStreet' => 'required',
            'nameStreet' => 'required',
            'zipCode' => 'required',
            'city' => 'required',
            'country' => 'required',
            'descriptionFr' => 'required',
            'descriptionEn' => 'required',

        ]);

        $event = new Event;
        $event->title = $request->input('title');   
        $event->dateFrom = $request->input('dateFrom');
        $event->dateEnd = $request->input('dateEnd');
        $event->timeStart = $request->input('timeStart');      
        $event->timeEnd = $request->input('timeEnd');
        $event->numberStreet = $request->input('numberStreet');
        $event->nameStreet = $request->input('nameStreet');
        $event->zipCode = $request->input('zipCode');
        $event->city = $request->input('city');
        $event->country = $request->input('country');
        $event->descriptionFr = Purifier::clean($request->input('descriptionFr'));
        $event->descriptionEn = Purifier::clean($request->input('descriptionEn'));        

        $event->save();

        return redirect('/events')->with('success', 'Votre évènement a été créé !');
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
        return view('events.show')->with('event', $event);
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
