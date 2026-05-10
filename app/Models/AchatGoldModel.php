<?php

namespace App\Models;

use CodeIgniter\Model;

class AchatGoldModel extends Model
{
    protected $table = 'achats_gold';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['user_id', 'gold_id', 'date_achat', 'prix_total'];

    protected $validationRules = [
        'user_id' => 'required|integer',
        'gold_id' => 'required|integer',
        'date_achat' => 'required|valid_date',
        'prix_total' => 'required|decimal',
    ];

    public function getAll()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->find($id);
    }

    public function createAchat($data)
    {
        return $this->insert($data);
    }

    public function isGoldBoughtByUser($userId, $goldId)
    {
        return $this->where('user_id', $userId)
                    ->where('gold_id', $goldId)
                    ->first() !== null;
    }
}