<?php

namespace App\Controllers;
use App\Models\RegimeModel;
use App\Models\ActiviteModel;
use App\Controllers\BaseController;
use Config\Services;


class Regime extends BaseController
{
    protected $regimeModel;
    protected $session;//Ho an ny username
    protected $activiteModel;

     public function __construct(){
        $this->regimeModel = new RegimeModel();
        $this->activiteModel = new ActiviteModel();
        $this->session = Services::session();
    }

     public function index(){
        return view('regime');
    }
    
   public function objectif(){
    $categorieId = $this->request->getGet('objectif');
    $regimes = $this->regimeModel->getAll($categorieId);
    return view('regime', ['regimes' => $regimes]);
   }


}