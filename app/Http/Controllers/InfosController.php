<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use Purifier;

class InfosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = Info::orderBy('updated_at','desc')->paginate(5);
        return view('infos.index')->with('infos', $infos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('infos.create');
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
            'textFr' => 'required',
            'textEn' => 'required',
            'urlImage' => 'required|url',
        ]);

        $info = new Info;
        $info->titleFr = $request->input('titleFr');
        $info->titleEn = $request->input('titleEn');
        $info->textFr = $request->input('textFr');
        $info->textEn = $request->input('textEn');
        $info->urlImage = $request->input('urlImage');

        $info->save();

        return redirect('/infos')->with('success', 'Votre information a été créée !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = Info::find($id);
        return view('infos.show')->with('info', $info);
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
