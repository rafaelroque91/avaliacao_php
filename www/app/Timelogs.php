<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TimeLogs extends Model
{

    protected $table = 'timelogs';
    protected $fillable = ['id','issue_id','user_id','seconds_logged'];

    function getUserTimeLogs()
    {
        return DB::table('timelogs')->select(DB::raw('user_id,convert(sum(seconds_logged),unsigned  integer) as seconds_logged'))        
        ->groupBy('user_id')
        ->get();
    }

    function getUserComponentMetadata()
    {    
        return DB::table('timelogs')->select(DB::raw('count(distinct timelogs.user_id) as number_of_users, count(distinct issues_components.issue_id) as number_of_issues,issues_components.component_id,components.name,
        convert(sum(timelogs.seconds_logged),unsigned  integer) as seconds_logged'))
        ->join('issues_components', 'issues_components.issue_id','timelogs.issue_id' )
        ->join('components', 'components.id','issues_components.component_id' )
        ->groupBy('issues_components.component_id')
        ->get();

    }  

    function PreencheDadosTimelogs($dados)
    {    
        foreach ($dados as $i) {           
            $timelogs = Timelogs::updateOrCreate(
                ['id' =>  $i->id],
                ['issue_id' => $i->issue_id,
                'user_id' => $i->user_id,
                'seconds_logged' => $i->seconds_logged,
                ]
            );
        }
    }  
}
