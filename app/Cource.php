<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cource extends Model
{
    public $fillable = ['name','teacher_id'];
        public function tag(){
            return $this->belongsToMany("App\User");
        }
        public function user(){
            return $this->belongsTo("App\User");
        }
       

}
