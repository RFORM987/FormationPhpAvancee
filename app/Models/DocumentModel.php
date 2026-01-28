<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Document;

class DocumentModel extends Model
{
    protected $table = 'document';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id',
        'title',
        'abstract',
        'content',
        'access',
        'type'
    ];

    protected $returnType = Document::class;

    public function findByAccess(string $name)
    {
        return $this->where('access', $name)->findAll();
    }


}