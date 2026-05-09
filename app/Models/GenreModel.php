<?php

namespace App\Models;

use CodeIgniter\Model;

class GenreModel extends Model
{
    protected $table = 'genres';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['libelle'];

    public function getByLabel(string $label): ?array
    {
        return $this->where('libelle', $label)->first();
    }
}
