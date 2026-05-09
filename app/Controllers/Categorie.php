<?php

namespace App\Controllers;
use App\Models\CategorieModel;
use App\Controllers\BaseController;
use Config\Services;


class Categorie extends BaseController
{
    protected $categorieModel;
    protected $session;//Ho an ny username

    public function __construct(){
        $this->categorieModel = new CategorieModel();
        $this->session = Services::session();
    }

    public function index(){
        $categories = $this->categorieModel->getAll();
        return view('categories', ['categories' => $categories]);
    }
}
   