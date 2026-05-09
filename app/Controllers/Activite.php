<?php

namespace App\Controllers;
use App\Models\ActiviteModel;
use App\Models\RegimeModel;
use App\Controllers\BaseController;
use Config\Services;


class Activite extends BaseController
{
    protected $activiteModel;
    protected $session;//Ho an ny username
    protected $regimeModel;

     public function __construct(){
        $this->activiteModel = new ActiviteModel();
        $this->regimeModel = new RegimeModel();
        $this->session = Services::session();
    }

     public function details($id){
        $regime = $this->regimeModel->getById($id);
        $activite = [];

        if ($regime && isset($regime['activite_id'])) {
            $act = $this->activiteModel->find($regime['activite_id']);
            if ($act) {
                $activite[] = $act;
            }
        }

        if ($activite && $regime) {
            return view('details', ['activite' => $activite, 'regime' => $regime]);
        } else {
            return view('details', ['error' => 'id non trouvé']);
        }
    }


}