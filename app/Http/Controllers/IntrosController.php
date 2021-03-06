<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intro;

class IntrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intros = Intro::orderBy('updated_at', 'desc')->paginate(20);
        return view('intros.index')->with('intros', $intros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('intros.create');
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
            'legendVideoFr' => 'required',
            'legendVideoEn' => 'required',
            'quoteVideoFr' => 'required',
            'quoteVideoEn' => 'required',
            'urlVideoFr' => 'required|url',
            'urlVideoEn' => 'required|url',

       ]);

       $intro = new Intro;
       $intro->legendVideoFr = $request->input('legendVideoFr');
       $intro->legendVideoEn = $request->input('legendVideoEn');
       $intro->quoteVideoFr = $request->input('quoteVideoFr');
       $intro->quoteVideoEn = $request->input('quoteVideoEn');
       $intro->urlVideoFr = $request->input('urlVideoFr');
       $intro->urlVideoEn = $request->input('urlVideoEn');

       $intro->save();

       return redirect('/intros')->with('success', 'Votre Introduction a été créée !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $intro = Intro::find($id);
        return view('intros.show')->with('intro', $intro);
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
