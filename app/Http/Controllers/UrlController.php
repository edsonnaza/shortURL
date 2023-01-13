<?php

namespace App\Http\Controllers;

use App\Url;
use App\Click;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Report;
use Validator;

class UrlController extends Controller
{
    public function index(Request $request)
    {
        /* $request->session()->flash('notice', 'Task was successful!'); */
       $url=new Url;
       $urls=Url::All();

        return view('user.index', ['url' =>$url, 'urls' => $urls]);
    }

    public function create(Request $request)
    {
        /* Create a new URL record */
        // validate de original_url 

            $validator= Validator::make($request->all(),[
                    'original_url' => 'required|unique:urls|max:255',
            ]);
            
            if ($validator->fails()){
                return redirect('/')
                ->withErrors($validator)
                ->withInput();
            }

            try {
                /**It must be 5 characters in length */
                $short_url=strtoupper(str_random(5));
                //** Save the data to the DDBB */
                $url=Url::create([
                    'short_url'=>$short_url,
                    'original_url' =>$request->original_url,
                ]);
                
                $request->session()->flash('notice','Data was saved!')    ;
                return redirect('/');

            } catch (\Throwable $th) {
                //throw $th;
                session()->flash('notice', 'There was a trouble, please try again!');
                return redirect('/');    
            }
        
    }

    public function visit($url)
    { 
        /* $agent = new Agent(); */
        // $url = find record a clicks, update irl clicks count and redirect to original url
        
        try {
                $counter_incremented=Url::where('short_url',$url)->increment('clicks_count');
                $urldata= Url::where('short_url',$url)->first();
                //dd($urldata);
                /** Get the browser and the platform */
                $agent=new Agent();
                $platform=$agent->platform();
                $browser= $agent->browser();

            /** Save the data */
            $click=Click::create([
                'url_id'=>$urldata->id,
                'browser' =>$browser,
                'platform' =>$platform,
            ]);

            //Open the web site with the original url saved
            return redirect($urldata->original_url);
        } catch (\Throwable $th) {
            throw $th;
        }
      


    }


    public function show($url)
    {
        /**Get all url counted */
        
        $url=Url::where('short_url',$url)->first();

       /** Get Daily Clicks */
        $daily_clicks=Report::getdailyClicks();
       
        /** Get Browser click */     
        $browsers_clicks=Report::getBrowser(); 
      
        /** Get Platforms */
        $platform_clicks=Report::getPlatform();
 

        return view('user.show', ['url' =>$url, 'browsers_clicks' => $browsers_clicks, 'daily_clicks' => $daily_clicks, 'platform_clicks' => $platform_clicks]);
    }
}
