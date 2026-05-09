<?php

namespace App\Models;

use CodeIgniter\Model;

class RegimeModel extends Model
{
    protected $table = 'regimes';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['nom', 'description', 'objectif_type_id', 'prix_journalier', 'poids_impact_semaine', 'pourcentage_viande', 'pourcentage_poisson', 'pourcentage_volaille'];

    protected $validationRules = [
        'nom' => 'required|string|max_length[255]',
        'objectif_type_id' => 'permit_empty|integer',
        'prix_journalier' => 'required|decimal',
        'poids_impact_semaine' => 'required|decimal',
        'pourcentage_viande' => 'required|decimal',
        'pourcentage_volaille' => 'required|decimal',
        'pourcentage_poisson' => 'required|decimal',
    ];

    public function getAll()
    {
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

    public function getSuggestedRegimes(float $maintenance, string $objectifLabel, ?int $objectifTypeId = null): array
    {
        $maintenance = (float) $maintenance;

        $caloriesMoyennesSql = "(SELECT IFNULL(SUM(p.calories) / NULLIF(COUNT(DISTINCT rd.jour_numero), 0), 0)
            FROM regime_details rd
            JOIN plats p ON p.id = rd.plat_id
            WHERE rd.regime_id = regimes.id)";

        $depenseSportSql = "(SELECT IFNULL(SUM(a.calories_brules_heure * (ra.duree_minutes_jour / 60)), 0)
            FROM regime_activites ra
            JOIN activites_sportives a ON a.id = ra.activite_id
            WHERE ra.regime_id = regimes.id)";

        $builder = $this->select(
            "regimes.*, {$caloriesMoyennesSql} AS calories_moyennes, {$depenseSportSql} AS depense_sport, " .
            "({$caloriesMoyennesSql} - {$maintenance} - {$depenseSportSql}) AS balance",
            false
        );

        if ($objectifTypeId !== null && $objectifTypeId > 0) {
            $builder->where('regimes.objectif_type_id', $objectifTypeId);
        }

        if (stripos($objectifLabel, 'reduire') !== false) {
            $builder->having('balance <', 0, false);
        } elseif (stripos($objectifLabel, 'augmenter') !== false) {
            $builder->having('balance >', 0, false);
        } else {
            $builder->orderBy('ABS(balance)', 'asc', false);
        }

        $results = $builder->findAll();

        // Fallback: if no regimes found (e.g. no regime_details or activites defined),
        // return regimes that match the objectif_type_id when provided.
        if ((empty($results) || count($results) === 0) && $objectifTypeId !== null && $objectifTypeId > 0) {
            return $this->where('objectif_type_id', $objectifTypeId)->findAll();
        }

        return $results;
    }
}