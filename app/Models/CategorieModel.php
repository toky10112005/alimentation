<?php

namespace App\Models;

use CodeIgniter\Model;

class CategorieModel extends Model
{
    protected $table = 'categorie';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['name', 'description','ref_IMC'];

    protected $validationRules = [
        'name' => 'required|string|max_length[255]',
        'description' => 'required|string',
        'ref_IMC' => 'required|decimal[5,2]',
    ];

    public function getAll()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->find($id);
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