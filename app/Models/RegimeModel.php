<?php

namespace App\Models;

use CodeIgniter\Model;

class RegimeModel extends Model
{
    protected $table = 'regime';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['categorie_id', 'name', 'poids_minimal_impact', 'duree_jours', 'prix_journalier', 'p_viande', 'p_volaille', 'p_poisson'];

    protected $validationRules = [
        'categorie_id' => 'required|integer',
        'name' => 'required|string|max_length[255]',
        'poids_minimal_impact' => 'required|integer',
        'duree_jours' => 'required|integer',
        'prix_journalier' => 'required|decimal',
        'p_viande' => 'required|decimal',
        'p_volaille' => 'required|decimal',
        'p_poisson' => 'required|decimal',
    ];

    public function getAll($categorieId = null)
    {
        if ($categorieId !== null) {
            return $this->where('categorie_id', $categorieId)->findAll();
        }

        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->find($id);
    }

    public function createRegime($data)
    {
        return $this->insert($data);
    }

    public function updateRegime($id, $data)
    {
        return $this->update($id, $data);
    }
}