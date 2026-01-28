<?php

namespace App\Controllers;

use App\Models\VariablesValides;
use App\Models\Document;

class Special extends BaseController
{
    public function databasetest(){
        $db = \Config\Database::connect();
        if ($db->connect()){return 'On est connéctés';}
    }
    public function document() : string
    {
        $doc1 = new Document('Mon journal',
        'Un journal de formation',
        'Je suis en train de coder un design pattern de prototype');
        $doc2 = clone $doc1;
        $doc2->setAccess('Public');
        $data = ['doc1' => $doc1,'doc2' => $doc2];

        return view('document',$data);

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