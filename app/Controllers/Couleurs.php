<?php

namespace App\Controllers;

use App\Entities\Couleur;
use App\Models\CouleurModel;

class Couleurs extends BaseController
{
    public function themetest( string $couleur1, string $couleur2): string
    {
        $data['c1'] = $couleur1;
        $data['c2'] = $couleur2;
        return view('Couleurs/themetest.php', $data);
    }

    public function createColorForm(){

        return view('Couleurs/formulaire.php');
    }

    public function createColor()
    {

        $data = $this->request->getPost();

        $name=$data['name'];
        $hexa=$data['hexa'];
        $colorModel = new CouleurModel;
        $exists = $colorModel->select(['Name'])->findAll();
        $colors=[];
        for($i=0;$i<sizeof($exists);$i++){
            array_push($colors,$exists[$i]->getName());
        }
        if (in_array($name,$colors)){
            $color = $colorModel->findByName($name);
            $color->setHexadecimal($hexa);
        }
        else{
        $color = new Couleur;
        $color->setHexadecimal($hexa);
        $color->setName($name);
        }

        $colorModel->save($color);
    }

    public function deleteColor(string $name)
    {
        $colorModel = new CouleurModel;
        $exists = $colorModel->select(['id','Name'])->findAll();
        $colors=[];
        for($i=0;$i<sizeof($exists);$i++){
            if($name == $exists[$i]->getName()){
            $colorModel->delete($exists[$i]->getId());
            return("Couleur supprimée");
            };
        }
        return ("Couleur innexistante");

    }

    public function seeColor(string $name)
    {
        $colorModel = new CouleurModel;
        $color = $colorModel->findByName($name);
        $display = $color->getHexadecimal();

        return view('Couleurs/display.php',['color' => $display]);
    }
}