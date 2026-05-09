<?php

namespace App\Models;

use CodeIgniter\Model;

class ActiviteModel extends Model
{
    protected $table = 'activite';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['name', 'intesite', 'duree'];

    protected $validationRules = [
        'name' => 'required|string|max_length[255]',
        'intesite' => 'required|in_list[faible,moyenne,élevée]',
        'duree' => 'required|string|max_length[255]',
    ];
   

    public function getAll()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->find($id);
    }

    public function createActivite($data)
    {
        return $this->insert($data);
    }

    public function updateActivite($id, $data)
    {
        return $this->update($id, $data);
    }
}