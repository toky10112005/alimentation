<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\CategorieModel;
use App\Controllers\BaseController;
use Config\Services;


class User extends BaseController
{
    protected $userModel;
    protected $session;//Ho an ny username

    public function __construct(){
        $this->userModel = new UserModel();
        $this->categorieModel = new CategorieModel();
        $this->session = Services::session();
    }

    public function index(){
        return view('login');
    }

    public function login(){
        $email = $this->request->getPost('email');
        $mot_de_passe = $this->request->getPost('password');

        $user = $this->userModel->authenticateCredentials($email, $mot_de_passe);
      //  dd($user);
        if ($user !== null && !is_string($user)) {
            // Authentification réussie
        $this->session->set([
            'username' => $user['username'],
            'user_id'  => $user['id'],
            'isLoggedIn' => true
        ]);

        $IMC = $this->userModel->calculeIMC($user['taille'], $user['poids']);
        $this->session->set('IMC', $IMC);//Au cas où

        $categories = $this->categorieModel->getAll();

            //  return redirect()->to('accueil');
            return view('accueil',[ 'IMC' => $IMC, 'categories' => $categories]);
        } else {
            // Authentification échouée
            // return redirect()->back()->withInput()->with('error', 'Email or password incorrect.');
            return view('login', ['error' => $user]); // Affiche le message d'erreur retourné par authenticateCredentials
        }
    }

    public function redirectinscription(){
        return view('inscription');
    }

    public function page(){
        $nom = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $mot_de_passe = $this->request->getPost('password');
        $genre = $this->request->getPost('genre');
         $telephone = $this->request->getPost('telephone');

        $this->session->set('tempusers',['nom' => $nom, 'email' => $email, 'mot_de_passe' => $mot_de_passe, 'genre' => $genre, 'telephone' => $telephone]);

        return view('inscriptiondetails');
    }

    public function put(){

        $tempusers = $this->session->get('tempusers');
        $taille = $this->request->getPost('taille');
        $poids = $this->request->getPost('poids');
       

        $user = $this->userModel->registerUser($tempusers['nom'], $tempusers['email'], $tempusers['mot_de_passe'], $tempusers['genre'], $tempusers['telephone'],$taille, $poids);

        if (!$user) {   
            return view ('inscription', ['errors' => $this->userModel->errors()]);
        }

        $this->session->set('username', $user['username']);
        $this->session->set('user_id', $user['id']);

        $IMC = $this->userModel->calculeIMC((int) $taille, (int) $poids);
        $this->session->set('IMC', $IMC);

        return view('accueil', ['IMC' => $IMC]);
    } 

    // public function objectif(){
    //     $objectif = $this->request->getGet('objectif');

    //     $categories = $this->categorieModel->getAll();
    //     $categoryIds = array_column($categories, 'id');
    //     if (!in_array($objectif, $categoryIds, true)) {
    //         return view('accueil', ['IMC' => $this->session->get('IMC'), 'categories' => $categories]);
    //     }

    //     $imc = $this->session->get('IMC');
    //     $category = $this->categorieModel->getById($objectif);
    //     if (is_numeric($imc) && $category) {
    //         $imc = (float) $imc;
    //         if ($imc >= 25 && strpos($category['name'], 'Augmenter') !== false) {
    //             return view('accueil', ['IMC' => $imc, 'categories' => $categories]);
    //         }
    //         if ($imc < 18.5 && strpos($category['name'], 'Reduire') !== false) {
    //             return view('accueil', ['IMC' => $imc, 'categories' => $categories]);
    //         }
    //     }

    //     $this->session->set('objectif', $objectif);
    //     return view('accueil', ['IMC' => $this->session->get('IMC'), 'categories' => $categories]);
    // }


    public function redirectadmin(){
        return view('adminlogin');
    }

   
}