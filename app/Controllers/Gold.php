<?php

namespace App\Controllers;
use App\Models\GoldModel;
use App\Models\RegimeModel;
use App\Models\UserModel;
use App\Models\UserHealthProfileModel;
use App\Models\UserObjectifModel;
use App\Models\AchatRegimeModel;
use App\Controllers\BaseController;
use Config\Services;


class Gold extends BaseController
{
    protected $goldModel;
    protected $session;

        public function __construct(){
        $this->goldModel = new GoldModel();
            $this->session = Services::session();
        }

    public function index(){
    $listeGold= $this->goldModel->getAll();

        return view('gold', ['listeGold' => $listeGold]);
    }
}