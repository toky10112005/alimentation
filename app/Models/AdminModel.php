<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['username', 'password','created_at'];

    protected $validationRules = [
        'username' => 'required|min_length[2]|max_length[255]',
        'password' => 'required|min_length[3]',
    ];

    public function put(string $username, string $motDePasse): ?array
    {
        $saved = $this->save([
            'username' => $username,
            'password' => password_hash($motDePasse, PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (!$saved) {
            return null;
        }

        return $this->where('username', $username)->first();

    }

    public function authenticateCredentials(string $username, string $motDePasse)//: ?array
    {
        $admin = $this->where('username', $username)->first();

        if (!$admin) {
            return "username not found";
        }

        if (!password_verify($motDePasse, $admin['password'])) {
            return "incorrect password";
        }

        return $admin;
    }
}