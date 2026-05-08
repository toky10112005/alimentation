<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Controllers\BaseController;
use Config\Services;


class User extends BaseController
{
    protected $userModel;
    protected $session;//Ho an ny username

    public function __construct(){
        $this->userModel = new UserModel();
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
        if ($user !== null) {
            // Authentification réussie
            $this->session->set('username', $user['username']);
            $this->session->set('user_id', $user['id']);

            //  return redirect()->to('accueil');
            return view('accueil');
        } else {
            // Authentification échouée
            // return redirect()->back()->withInput()->with('error', 'Email or password incorrect.');
            return view('login', ['error' => 'Email or password incorrect.']);
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

        return view('accueil');
    } 
}