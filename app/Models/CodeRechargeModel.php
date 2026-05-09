<?php
namespace App\Models;

use CodeIgniter\Model;

class CodeRechargeModel extends Model
{
    protected $table = 'codes_recharge';
    protected $allowedFields = ['code', 'valeur','est_valide'];

    public function validerCode($code)
    {
        $codeData = $this->where('code', $code)->first();

        if ($codeData && $codeData['est_valide']) {
            // Marquer le code comme utilisé
            $this->update($codeData['id'], ['est_valide' => false]);

            return $codeData['valeur'];
        }

        return false; 
    }

}
