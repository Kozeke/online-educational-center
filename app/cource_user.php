<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cource_user extends Model
{
    protected $table = 'cource_user';


    public $fillable = ['cource_id','student_id'];
    public function user(){
            return $this->belongsTo("App\User");
        }
}
