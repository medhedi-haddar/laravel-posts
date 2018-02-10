<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected  $fillable = ['title','description','status','post_type',
        'categorie_id','nbr_students','date_end','date_start'];

    public  function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public  function picture(){
        return $this->hasOne(Picture::class);
    }

    public function getDateStartFrAttribute()
    {
        $date_start = Carbon::parse($this->date_start);
        return $date_start->format('Y-m-d');
    }

    public function getDateEndFrAttribute()
    {
        $date_End = Carbon::parse($this->date_End);
        return $date_End->format('Y-m-d');
    }
}
