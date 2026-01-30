<?php

namespace App\Controllers;

use App\Models\VariablesValides;
use App\Models\Document;

class Special extends BaseController
{

    public function cesar(){
        return view('cryptage');
    }

    public function api(){
        return $this->response->setJSON(json_encode([ 'test1' =>[ 'test' => "Ceci est un valeur de test"]]));
    }

    public function databasetest(){
        $db = \Config\Database::connect();
        if ($db->connect()){return 'On est connéctés';}
    }

    public function varie( string $var): string
    {
        $termesacceptés = VariablesValides::getInstance();
        
        try{
        if ($termesacceptés->comparetoterms($var)){
            return view('diapo');
            }
        else{
            return view('mapage');
            }
        }
        catch(\Exception $e){
            $data['errormessage'] = $e->getMessage();
            return view('errorvar.php', $data);
        }
    }

}