<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\IssuesComponents;

class Issues extends Model
{
    protected $fillable = ['id','code'];

    function PreencheDadosIssues($dados)
    {    
        foreach ($dados as $i) {           
            $issues = Issues::updateOrCreate(
                ['id' =>  $i->id],
                ['code' => $i->code]
            );

            IssuesComponents::where('issue_id', $i->id)->delete();

            foreach ($i->components as $c) { 
                IssuesComponents::create([
                    'issue_id' => $i->id,
                    'component_id' => $c
                ]);
            }

        }
    }    

}
