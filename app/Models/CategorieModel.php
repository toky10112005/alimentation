<?php

namespace App\Models;

use CodeIgniter\Model;

class CategorieModel extends Model
{
    protected $table = 'objectifs_types';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['libelle'];

    protected $validationRules = [
        'libelle' => 'required|string|max_length[255]',
    ];

    public function getAll()
    {
        return $this->select('id, libelle AS name, libelle AS description')
            ->orderBy('id', 'asc')
            ->findAll();
    }

    public function getById($id)
    {
        return $this->select('id, libelle AS name, libelle AS description')
            ->where('id', $id)
            ->first();
    }

    public function createCategorie($data)
    {
        return $this->insert($data);
    }

    public function updateCategorie($id, $data)
    {
        return $this->update($id, $data);
    }
}