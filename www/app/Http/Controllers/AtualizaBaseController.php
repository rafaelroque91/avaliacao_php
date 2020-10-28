<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Components;
use App\Issues;
use App\IssuesComponents;
use App\Users;
use App\Timelogs;
use Exception;

class AtualizaBaseController extends Controller
{
  
    function buscaJSON($Url)
    {
        return json_decode(file_get_contents($Url));
    }         

    public function AtualizaDados(Request $request)
    {              
        try {
            $url_base = 'https://my-json-server.typicode.com/bomoko/algm_assessment/';

            //Components                      
            $components = $this->buscaJSON($url_base . 'components');    
            $obj = new Components();
            $obj->PreencheDadosComponents($components);                                 

            //Issues                      
            $issues = $this->buscaJSON($url_base . 'issues');              
            $obj = new Issues();
            $obj->PreencheDadosIssues($issues);                  

            //Users                      
            $users = $this->buscaJSON($url_base . 'users');        
            $obj = new Users();      
            $obj->PreencheDadosUsers($users);

            //TimeLogs                      
            $timelogs = $this->buscaJSON($url_base . 'timelogs');              
            $obj = new TimeLogs();      
            $obj->PreencheDadosTimelogs($timelogs);

            return response()->json(['success' => true, 'msg' => 'Dados Atualizados com Sucesso!']);
        }

        catch (Exception $e)        
        {               
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
       
    }  
   
}
