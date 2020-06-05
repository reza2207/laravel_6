<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postnote extends Model
{
    protected $table = "postnotes";
 
    protected $fillable = ['title', 'content', 'user_id', 'slug'];

    public function user()
    {   
        
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function user_post()
    {   
        
        return $this->belongsTo('App\User', 'user_id');
    }





}
