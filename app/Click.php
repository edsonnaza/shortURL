<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Url;
class Click extends Model
{
    protected $table="clicks";
    protected $fillable=['url_id','browser','platform','created_at','updated_at'];

        public function Urls()
        {
            return $this->belongsTo(Url::class,'url_id');
        }
}
