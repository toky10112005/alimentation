<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['username', 'email', 'password','genre','telephone','taille','poids','created_at'];

    protected $validationRules = [
        'username' => 'required|min_length[2]|max_length[255]',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]',
        'genre' => 'required|in_list[Homme,Femme,Autre]',
        'telephone' => 'required|regex_match[/^[0-9]{10}$/]',
        'taille' => 'required|integer|greater_than[0]',
        'poids' => 'required|integer|greater_than[0]',
    ];

    public function authenticateCredentials(string $email, string $motDePasse)//: ?array
    {
        $user = $this->where('email', $email)->first();

        if (!$user) {
            return "email not found";
        }

        if (!password_verify($motDePasse, $user['password'])) {
            return "incorrect password";
        }

        return $user;
    }

    public function registerUser(string $nom, string $email, string $motDePasse, string $genre, string $telephone, int $taille, int $poids): ?array
    {
        $saved = $this->save([
            'username' => $nom,
            'email' => $email,
            'password' => password_hash($motDePasse, PASSWORD_DEFAULT),
            'genre' => $genre,
            'telephone' => $telephone,
            'taille' => $taille,
            'poids' => $poids,
            'created_at' => date('Y-m-d H:i:s'),

        ]);

        if (!$saved) {
            return null;
        }

        return $this->where('email', $email)->first();
    }

    public function calculeIMC(int $taille, int $poids): float
    {
        return $poids / (($taille / 100) ** 2);
    }

}