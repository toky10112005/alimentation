<?php

namespace App\Models;

use CodeIgniter\Model;

class ObjectifTypeModel extends Model
{
    protected $table = 'objectifs_types';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['libelle'];

    public function getAllFormatted(): array
    {
        return $this->select('id, libelle AS name, libelle AS description')
            ->orderBy('id', 'asc')
            ->findAll();
    }
}
