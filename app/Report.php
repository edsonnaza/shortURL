<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Click;
use App\Url;
use DB;

class Report
{
    protected $daily_clicks=[];
    protected $browser_clicks=[];
    protected $platform_clicks=[];

        /** Get daily Click */

        public static function getdailyClicks()
        {
            $urls=Url::select('id','clicks_count')->get();
            foreach ($urls as $value) {
                $daily_clicks[]=["$value->id",$value->clicks_count];
            }
            return $daily_clicks;
        }

        /** Get Browser Stats */
         public static function getBrowser()
        {
            $clicks=DB::table('clicks')
            ->select('browser',DB::raw('count(*) as clicks'))
            ->groupBy('browser')->get();
            
            foreach ($clicks as $value) {
                $browser_clicks[]=["$value->browser",(int)$value->clicks];
            }
            return $browser_clicks;
        }

        /** Get Platform Stats */
          public static function getPlatform()
        {
            $platforms=DB::table('clicks')
            ->select('platform',DB::raw('count(*) as clicks'))
            ->groupBy('platform')->get();
            
            foreach ($platforms as $value) {
                $platforms_clicks[]=["$value->platform",(int)$value->clicks];
            }
            return $platforms_clicks;
        }
        
}

