<?php

namespace App\Models;

use CodeIgniter\Model;

class AchatRegimeModel extends Model
{
    protected $table = 'achats_regimes';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['user_id', 'regime_id', 'date_achat','duree_jours', 'prix_total'];

    protected $validationRules = [
        'user_id' => 'required|integer',
        'regime_id' => 'required|integer',
        'date_achat' => 'required|valid_date',
        'duree_jours' => 'required|integer',
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

    public function updateAchat($id, $data)
    {
        return $this->update($id, $data);
    }

    public function isRegimeBoughtByUser($userId, $regimeId)
    {
        return $this->where('user_id', $userId)
                    ->where('regime_id', $regimeId)
                    ->first() !== null;
    }

    public function getRegimeIdsByUser(int $userId): array
    {
        $rows = $this->select('regime_id')
            ->where('user_id', $userId)
            ->findAll();

        return array_map(static fn ($row) => (int) $row['regime_id'], $rows ?: []);
    }
}