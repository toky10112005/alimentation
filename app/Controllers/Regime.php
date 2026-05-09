<?php

namespace App\Controllers;
use App\Models\RegimeModel;
use App\Controllers\BaseController;
use Config\Services;


class Regime extends BaseController
{
    protected $regimeModel;
    protected $session;//Ho an ny username

    public function __construct(){
        $this->regimeModel = new RegimeModel();
        $this->session = Services::session();
    }

   public function objectif(){
    $categorieId = $this->request->getGet('objectif');
    $regimes = $this->regimeModel->getAll($categorieId);
    return view('regime', ['regimes' => $regimes]);
   }


}