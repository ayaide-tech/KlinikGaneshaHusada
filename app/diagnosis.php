<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diagnosis extends Model
{
    //
    public function registration(){
        return $this->belongsTo(Registration::class);
        //return $this->belongsTo(Patient::class);
    }

   
    
}