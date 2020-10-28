<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Users;
use App\Timelogs;
use Illuminate\Support\Facades\DB;

class ExibeDadosController extends Controller
{
    
    public function UserTimeLogs(Request $request)
    {      
        $timelogs = new Timelogs();
        return response()->json($timelogs->getUserTimeLogs());
       
    }  
    public function componentMetadata(Request $request)
    {      
        $timelogs = new Timelogs();
        return response()->json($timelogs->getUserComponentMetadata());
       
    }  

    
}
