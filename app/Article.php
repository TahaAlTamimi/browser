<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','expert','body'];


    public function user()
    {

        return $this->belongsTo(User::class);
        // return $this->belongsTo('App\User');
    }


    public function tags()
    {

        return $this->belongsToMany(Tag::class);
        
    }
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function guestReports()
    {
        return $this->hasMany(GuestReport::class);
    }
}
