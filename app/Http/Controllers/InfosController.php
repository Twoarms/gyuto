<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\Imagepage;

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

        // $infos = Info::orderBy('updated_at','desc')->paginate(20);
        // return view('infos.index')->with('infos', $infos);
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titleInFr' => 'required' ,
            'titleInEn' => 'required' ,
            'textInFr' => 'required' ,
            'textInEn' => 'required' ,
            'titleIFr',
            'titleIEn',
            'legendIFr',
            'legendIEn',
            'nameImage',
            'cover',
        ]);

        $info = new Info;
        $info->titleInFr = $request->input('titleInFr');
        $info->titleInEn = $request->input('titleInEn');
        $info->textInFr = $request->input('textInFr');
        $info->textInEn = $request->input('textInEn');
        if (null !== $request->input('parent_id'))
        {
            $info->parent_id = $request->input('parent_id');    
        }
        else {
            $info->parent_id = 0;    
        }
        
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
            // $info->parent()->associate($info);   
            $info->save();            
            return redirect()->action('InfosController@edit', $info)->with('success', 'Info créée!');
        }

        if (($request->input('action')) == 'save' && is_null($info->id))  {
            // $info->children()->associate($info);
            $info->save();
            $theimage->save();
            $info->imagepages()->sync($theimage->id, false);
            return redirect()->action('InfosController@edit', $info)->with('success', 'Image créée!');
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
        $theimages = Imagepage::all();
        return view('infos.show')->with('info', $info)->with('theimages',$theimages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $info = Info::find($id);
        $theimages = Imagepage::all();

        return view('infos.edit')->with('info', $info)->with('theimages', $theimages);
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
            
            $info = Info::find($info->id);
            $theimage->save();
            $info->imagepages()->sync($theimage->id, false);
            return redirect()->action('InfosController@edit', $info);
        }
        
        if (($request->input('confirmer')) == 'confirmer') {    
            $this->validate($request, [
            'titleInFr' => 'required' ,
            'titleInEn' => 'required' ,
            'textInFr' => 'required' ,
            'textInEn' => 'required' ,              
        ]);

        $info->titleInFr = $request->input('titleInFr');
        $info->titleInEn = $request->input('titleInEn');
        $info->textInFr = $request->input('textInFr');
        $info->textInEn = $request->input('textInEn');
        // dd($infoparentid);
        if (null !== $request->input('parent_id'))
        {
            $info->parent_id = $request->input('parent_id');    
        }
        else {
            $info->parent_id = 0;    
        }
        // $info->parent_id = $request->input('parent_id');
        // if (!empty($infoparentid->id) && ($infoparentid->id !== 0))
        // {
        //     $info->parent_id = $request->input('parent_id');
        // }
        // else
        // {
        //     $info->parent_id = 0;
        // }
        $info->save();
        return back()->withInput()->with('success', 'Info créée!');
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
           // dd($infoparentid);
        // $this->set('infoparentid', $infoparentid);
        // return view('infos.create')->with('infoparent', $infoparent)->with('theimages', $theimages);
        // $theimages = Imagepage::all();
        // $theimages = Imagepage::all();

        // $infos = Info::where('parent_id', '=', $id)->get();

        // $allinfos = Info::pluck('titleInFr','id')->all();
        return view('infos.create', compact('infoparentid', 'theimages'));
        // return redirect()->action('InfosController@create', $infoparent,$theimages);
        // return redirect()->action('InfosController@create', $theimages)->with('infoparentid', $infoparentid);
        // return view('infos.caview');
    }

    public function addCategoryinfo(Request $request)
    {

        $this->validate($request, [
            'titleInFr' => 'required' ,
            'titleInEn' => 'required' ,
            'textInFr' => 'required' ,
            'textInEn' => 'required'
        ]);

        $input = $request->all();
        $theimages = Imagepage::all();

        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];        

        Info::create($input);

        return back()->with('success', 'New Sub Category added successfully.');

    }

}