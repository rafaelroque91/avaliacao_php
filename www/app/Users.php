<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    protected $fillable = ['id','name','email'];

    function PreencheDadosUsers($dados)
    {    
        foreach ($dados as $i) {           
            $users = Users::updateOrCreate(
                ['id' =>  $i->id],
                ['name' => $i->name,
                'email' => $i->email]
            );
        }
    }  
}
