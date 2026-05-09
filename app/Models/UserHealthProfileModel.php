<?php

namespace App\Models;

use CodeIgniter\Model;

class UserHealthProfileModel extends Model
{
    protected $table = 'user_health_profiles';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['user_id', 'poids_actuel', 'taille', 'date_mesure'];

    protected $validationRules = [
        'user_id' => 'required|integer',
        'poids_actuel' => 'required|decimal',
        'taille' => 'required|decimal',
    ];

    public function getLatestForUser(int $userId): ?array
    {
        return $this->where('user_id', $userId)
            ->orderBy('date_mesure', 'desc')
            ->first();
    }

    public function createProfile(int $userId, float $poidsActuel, float $taille): bool
    {
        return (bool) $this->insert([
            'user_id' => $userId,
            'poids_actuel' => $poidsActuel,
            'taille' => $taille,
        ]);
    }
}
