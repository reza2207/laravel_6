<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
//use App\summernote;
use App\Postnote;
use Illuminate\Support\Str;

class PostnoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Bangkok");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $postnote = new Postnote;
        $list = Postnote::all(); //$postnote->user();
        //dump($list);
        $data['lists'] = $list;
        $data['title'] = 'Post Note';


        return view('post_note', $data);
    }


    public function store(Request $request)
    {   
        if($request->title !== NULL){
            $detail=$request->summernoteInput;
            
            $dom = new \domdocument();
            $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getelementsbytagname('img');
     
            //loop over img elements, decode their base64 src and save them to public folder,
            //and then replace base64 src with stored image URL.
            foreach($images as $k => $img){
                $data = $img->getattribute('src');
     
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                
                $data = base64_decode($data);
                $image_name= '/picture-summernote/'.time().$k.'.png';
                $path = public_path() . $image_name;
     
                file_put_contents($path, $data);
     
                $img->removeattribute('src');
                $img->setattribute('src', $image_name);
            }
            $title = $request->title;
            $detail = $dom->savehtml();
            $by = Auth::user()->username;
            $user_id = Auth::user()->id;
            $postnote = new Postnote;
            $postnote->content = $detail;
            $slug = Str::slug($title, '-');
            $postpone = $request->datepost;
            $postnote::create(['title'=>$title, 'content'=>$detail, 'user_id'=>$user_id, 'slug'=>$slug]);
            //$postnote->save();
            //return view('post_note',compact('postnote'));
            return redirect()->route('profile',[$by]);
        }else{
            $data['alert'] = 'data kosong';
            return view('post_note', $data);
        }
    }
}
