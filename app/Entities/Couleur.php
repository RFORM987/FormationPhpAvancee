<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Couleur extends Entity{
    protected $attributes = [
        'id' => null,
        'Hexadecimal' => null,
        'Name' => null
    ];

    public function setHexadecimal(string $hexa){
        $this->attributes['Hexadecimal'] = $hexa;
    }

    public function setName(string $name){
        $this->attributes['Name'] = $name;
    }

    public function getName(){
        return $this->attributes['Name'];
    }

    public function getHexadecimal(){
        return $this->attributes['Hexadecimal'];
    }

    public function getId(){
        return $this->attributes['id'];
    }

}