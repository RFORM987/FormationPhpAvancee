<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Couleur;

class CouleurModel extends Model
{
    protected $table = 'couleur';
    protected $primaryKey = 'id';

    protected $allowedFields = ['Id','Hexadecimal', 'Name'];

    protected $returnType = Couleur::class;

    public function findByName(string $name)
    {
        return $this->where('Name', $name)->findAll()[0];
    }


}