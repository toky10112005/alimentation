<?php

namespace App\Models;

use CodeIgniter\Model;

class GoldModel extends Model
{
    protected $table = 'gold';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['prix', 'description', 'remise'];

    public function getAll()
    {
        return $this->findAll();
    }
    public function getById($id)
    {
        return $this->find($id);
    }
    public function createGold($data)
    {
        return $this->insert($data);
    }
    public function updateGold($id, $data)
    {
        return $this->update($id, $data);
    }
}