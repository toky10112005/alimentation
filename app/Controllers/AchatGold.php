<?php

namespace App\Controllers;
use App\Models\AchatGoldModel;
use App\Models\UserModel;
use App\Models\GoldModel;
use App\Controllers\BaseController;
use Config\Services;


class AchatGold extends BaseController
{
    protected $session;//Ho an ny username
    protected $userModel;
    protected $achatGoldModel;
    protected $gold;

     public function __construct(){
        $this->userModel = new UserModel();
        $this->achatGoldModel = new AchatGoldModel();
        $this->goldModel = new GoldModel();
        $this->session = Services::session();
    }

    public function retourObjectif(){
        $userId = (int) $this->session->get('user_id');
        $objectifId = (int) $this->session->get('objectif');

        if (!$userId || !$objectifId) {
            return redirect()->to('/');
        }

        return redirect()->to(site_url('/objectif?objectif=' . $objectifId));
    }

     public function achat($id){//id du gold
        $gold = $this->goldModel->getById($id);
        if (!$gold) {
            return view('achat_gold', ['error' => 'id non trouvé']);
        }

         $userId = (int) $this->session->get('user_id');
         $user = $userId ? $this->userModel->find($userId) : null;

         if (!$user) {
             return view('achat_gold', ['error' => 'Utilisateur non trouvé']);
         }

        // Vérifier si l'utilisateur a déjà acheté cette offre Gold
        if ($this->achatGoldModel->isGoldBoughtByUser($userId, $id)) {
            return redirect()->to(site_url('/retourObjectif'))->with('error', 'Vous avez déjà acheté cette offre Gold.');
        }

        
          $data = [
            'user_id' => $userId,
            'gold_id' => $id,
            'date_achat' => date('Y-m-d H:i:s')
        ];

        if($user['solde_portefeuille']>=$gold['prix']){

            $this->userModel->update($userId, ['solde_portefeuille' => $user['solde_portefeuille'] - $gold['prix']]);

            $this->achatGoldModel->createAchat($data);

            $this->userModel->update($userId, ['is_gold' => true]);

            return redirect()->to(site_url('/retourObjectif'))->with('success', 'Achat de l\'offre Gold réussi ! Vous bénéficiez désormais de 15% de remise sur tous nos régimes.');

        } else {
            return redirect()->to(site_url('/retourObjectif'))->with('error', 'Solde insuffisant');
        }
    }
}