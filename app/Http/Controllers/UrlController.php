<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Urldata;
use Auth;
class UrlController extends Controller
{
    public function showform(){
        $userauth = Auth::check();
         if($userauth == true){
            $id = Auth::user()->id;
            $urldata_cs = Urldata::where('user_id',$id)->get();
            $user_name = Auth::user()->name;
            return view('show_form',compact('urldata_cs'));
        }
        else{
            return view('show_form');
        }
    }
    public function getdata(Request $request){
         $userauth = Auth::check();
         if($userauth == true){
            $id = Auth::user()->id;
        }
        else{
            $id = null;
        }
         $this->validate($request,[
         'actual_url'=>'required|regex:/^https?:\\/\\/(?:www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b(?:[-a-zA-Z0-9()@:%_\\+.~#?&\\/=]*)$/'
      ]);
        $api_url = 'https://tinyurl.com/api-create.php?url=' . $request->actual_url;
        $curl = curl_init();
        $timeout = 10;
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $api_url);
        $new_url = curl_exec($curl);
        curl_close($curl);
        if($new_url != ''){
            $urldata = new Urldata();
            $urldata->actual_url = $request->actual_url;
            $urldata->tiny_url = $new_url;
            $urldata->user_id = $id;
            $urldata->save();
            return redirect()->route('showform')->with('new_url',$new_url);
      }
    }
    public function adminshow(){
        $admindata = Urldata::get();
        $analyticsdata=Urldata::orderby('created_at')->get();
        return view('adminshow',compact('admindata','analyticsdata'));
    }
  }

