<?php

namespace App\Models;

use CodeIgniter\Model;

class ActiviteModel extends Model
{
    protected $table = 'activites_sportives';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['nom', 'description', 'calories_brules_heure'];

    protected $validationRules = [
        'nom' => 'required|string|max_length[255]',
        'calories_brules_heure' => 'required|integer',
    ];
   

    public function getAll()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->find($id);
    }

    public function getByRegimeId(int $regimeId): array
    {
        return $this->select('activites_sportives.nom AS name, regime_activites.duree_minutes_jour AS duree_minutes_jour')
            ->join('regime_activites', 'regime_activites.activite_id = activites_sportives.id')
            ->where('regime_activites.regime_id', $regimeId)
            ->findAll();
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