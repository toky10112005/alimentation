<?php

namespace App\Controllers;

use App\Models\CodeRechargeModel;
use App\Models\UserModel;
use App\Controllers\BaseController;
use Config\Services;


class CodeRecharge extends BaseController
{
    protected $codeRechargeModel;
    protected $session;//Ho an ny username
    protected $userModel;

     public function __construct(){
        $this->codeRechargeModel = new CodeRechargeModel();
        $this->session = Services::session();
        $this->userModel = new UserModel();
    }

     public function valideCode(){
        $code = $this->request->getPost('code');
        $userId = (int) $this->session->get('user_id');

        if (!$userId) {
            return redirect()->to('/');
        }

        $codeData = $this->codeRechargeModel->validerCode($code);
        $user = $this->userModel->find($userId);
        $solde = $user['solde_portefeuille'] ?? 0;

        if ($codeData !== false) {
            $nouveauSolde = $user['solde_portefeuille'] + $codeData;
            $this->userModel->update($userId, ['solde_portefeuille' => $nouveauSolde]);

            // return redirect()->to('/portefeuille');
            return view('portefeuille', ['success' => 'Code valide ! Votre solde a été mis à jour.', 'solde' => $nouveauSolde]);
        } else {
            return view('portefeuille', ['error' => 'Code invalide ou déjà utilisé.', 'solde' => $solde]);
        }
     }
}