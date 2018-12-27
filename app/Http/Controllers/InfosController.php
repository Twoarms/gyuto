<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\Imagepage;
use App\Models\Paragraph;
use Session;
use Image; 

class InfosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theinfos = Info::where('parent_id', '=', 0)->get();
        $allinfos = Info::pluck('titleInFr','id')->all();
        $infos = Info::orderBy('updated_at','desc')->paginate(20);         
        return view('infos.index',compact('theinfos','allinfos', 'infos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theimages = Imagepage::orderBy('updated_at', 'desc')->paginate(20);
        return view('infos.create', compact('theimages', 'infoparentid'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [    
            'titleInFr' => 'required' ,
            'titleInEn' => 'required' ,
        ]);
        $info = new Info;
        $info->index_title = $request->input('index_title');
        $info->titleInFr = $request->input('titleInFr');
        $info->titleInEn = $request->input('titleInEn');
        if (null !== $request->input('parent_id'))
        {
            $info->parent_id = $request->input('parent_id');    
        }
        else {
            $info->parent_id = 0;    
        }
        if ($request->input('ajoutpar') == 'ajoutparagraph')  {
            $theimages = Imagepage::orderBy('updated_at', 'desc')->paginate(20);
            return view('infos.createparagraph', compact('theimages', 'infoparentid', 'info'));
        }
        if (($request->input('confirmer')) == 'confirmer') {    
            $info->save();
            return redirect()->action('InfosController@index')->with('success', 'Info 1 créée!');
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
        $info = Info::find($id);
        $paragraphs = Paragraph::with('info')->get();
        $theimages = Imagepage::all();
        return view('infos.show')->with('info', $info)->with('paragraphs',$paragraphs)->with('theimages',$theimages);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $info = Info::find($id);
        $theparagraphs = $info->paragraphs;
        $theimages = Imagepage::all();
        return view('infos.edit')->with('info', $info)->with('theparagraphs',$theparagraphs)->with('theimages', $theimages);
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
       $info = Info::find($id);
       $theparagraphs = $info->paragraphs;
       $theimages = Imagepage::all();
        if ($request->input('ajoutpar') == 'ajoutparagraph')  {
           return view('infos.createparagraph', compact('theimages', 'infoparentid', 'info'));
        }
        if (($request->input('confirmer')) == 'confirmer') {    
            $this->validate($request, [
            'titleInFr' => 'required' ,
            'titleInEn' => 'required' ,        
        ]);
        $info->index_title = $request->input('index_title');    
        $info->titleInFr = $request->input('titleInFr');
        $info->titleInEn = $request->input('titleInEn');
        $info->parent_id = $request->input('parent_id');
        $info->save();
        return redirect()->action('InfosController@edit', $info)->with('success', 'Info 0 créée!');
        }     
    }

    public function createparagraph()
    {
       $theimages = Imagepage::orderBy('updated_at', 'desc')->paginate(20);
        return view('infos.createparagraph', compact('theimages', 'infoparentid', 'info')); 
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeparag(Request $request)
    {
        $this->validate($request, [
            'index_title',
            'titleInFr',
            'titleInEn',
            'titleParFr',
            'titleParEn',
            'textParFr',
            'textParEn',
            'titleIFr',
            'titleIEn',
            'legendIFr',
            'legendIEn',
            'nameImage',
        ]);

        $paragraph = new Paragraph;
        $paragraph->titleParFr = $request->input('titleParFr');
        $paragraph->titleParEn = $request->input('titleParEn');
        $paragraph->textParFr = $request->input('textParFr');
        $paragraph->textParEn = $request->input('textParEn');

         if (null == $request->input('id'))
        {
            $info = new Info;    
        }
        else 
            {
               $info = Info::find($request->input('id')); 
            }
        $info->index_title = $request->input('index_title');
        $info->titleInFr = $request->input('titleInFr');
        $info->titleInEn = $request->input('titleInEn');
        $info->parent_id = $request->input('parent_id'); 
        $theimages = Imagepage::orderBy('updated_at', 'desc')->paginate(20);
        if (null !== $request->input('infoID')) {
            $info->id = $request->input('infoID');
        }
        if (($request->input('saveparagraph')) == 'saveparagraph')  {
            $info->save();
            $paragraph->info()->associate($info);
            $paragraph->save();
            $theparagraphs = $info->paragraphs;            
            return redirect()->action('InfosController@edit', $info)->with('success', 'Paragraphe créé!');
        }
        if ($request->input('action') == 'save')  {
            $info->save();
            $paragraph->info()->associate($info);
            $paragraph->save();          
            $theimage = Imagepage::find($request->input('didImg'));
            $theimage->id = $request->input('didImg');
            $paragraph->imagepages()->sync($theimage->id, false);  
            return redirect()->action('InfosController@editparag', $paragraph )->withInput()->with('info', $info)->with('success', 'Image ajoutée!');
        }
    }

    public function editparag($id)
    {
        $paragraph = Paragraph::find($id);
        $info = $paragraph->info();
        $theimages = Imagepage::all();
        $myimages = $paragraph->imagepages;
        return view('infos.editparag')->with('paragraph',$paragraph)->with('info', $info)->with('theimages', $theimages)->with('myimages', $myimages);
    }

    public function updateparag(Request $request, $id)
    {      
        $paragraph = Paragraph::find($id);
        $info = $paragraph->info;
        $theimages = Imagepage::all();
        $myimages = $paragraph->imagepages();
        if (null !== $request->input('infoID')) {
            $info->id = $request->input('infoID');
        }
        if (($request->input('saveparagraph')) == 'saveparagraph')  {
            $paragraph->titleParFr = $request->input('titleParFr');
            $paragraph->titleParEn = $request->input('titleParEn');
            $paragraph->textParFr = $request->input('textParFr');
            $paragraph->textParEn = $request->input('textParEn');
            $paragraph->save();
            return redirect()->action('InfosController@edit', $info)->with('success', 'Paragraphe modifié!');
        } 
        if ($request->input('action') == 'save')  {
            $theimage = Imagepage::find($request->input('didImg'));
            $theimage->id = $request->input('didImg');
            $paragraph->imagepages()->sync($theimage->id, false); 
            return back()->withInput()->with('info', $info)->with('success', 'Image ajoutée!');
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


    public function manageCategoryinfo($parentid)
    {
        $infoparent = Info::find($parentid);
        $theimages = Imagepage::orderBy('updated_at', 'desc')->paginate(20);
        $infoparentid = $infoparent->id;
        return view('infos.create', compact('infoparentid', 'theimages'));
    } 
}