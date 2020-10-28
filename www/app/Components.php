<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Components extends Model
{
    protected $fillable = ['id','name'];

    function PreencheDadosComponents($dados)
    {    
        foreach ($dados as $i) {           
            $components = Components::updateOrCreate(
                ['id' =>  $i->id],
                ['name' => $i->name]
            );
        }
    }   
}
