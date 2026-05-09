<?php

namespace App\Models;

use CodeIgniter\Model;

class UserObjectifModel extends Model
{
    protected $table = 'user_objectifs';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['user_id', 'id_objectif_type', 'poids_cible'];

    protected $validationRules = [
        'user_id' => 'required|integer',
        'id_objectif_type' => 'required|integer',
        'poids_cible' => 'required|decimal',
    ];

    public function getByUserId(int $userId): ?array
    {
        return $this->where('user_id', $userId)->first();
    }

    public function setObjective(int $userId, int $objectifTypeId, float $poidsCible): bool
    {
        $existing = $this->getByUserId($userId);
        $data = [
            'user_id' => $userId,
            'id_objectif_type' => $objectifTypeId,
            'poids_cible' => $poidsCible,
        ];

        if ($existing) {
            return (bool) $this->update($existing['id'], $data);
        }

        return (bool) $this->insert($data);
    }
}
