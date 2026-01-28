<?php

namespace App\Models;

class VariablesValides
{
    private $termesacceptés = ['a','b','c','d'];

    private static $instances = [];

    private function __construct() {
        // Vide car c'est un singleton
    }

    public static function getInstance(){
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    public function getterms(){
        return $this->termesacceptés;
    }

    public function comparetoterms($var){
        if (!ctype_alpha($var)){
            throw new \Exception('Vous avez mis une variable erronée :'.$var);
        }
        if (in_array($var,$this->termesacceptés)){
            return true;
            }
        else{
            return false;
        }
    }
}