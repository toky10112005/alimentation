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

    public function loginPage(){
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

            //  return redirect()->to('accueil');
            return view('accueil',[ 'IMC' => $IMC]);
        } else {
            // Authentification échouée
            // return redirect()->back()->withInput()->with('error', 'Email or password incorrect.');
            return view('login', ['error' => $user]); // Affiche le message d'erreur retourné par authenticateCredentials
        }
    }

    public function redirectinscription(){
        return view('inscription');
    }

    public function redirectinscriptiondetails(){
        return view('inscriptiondetails');
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

    public function accueil(){
        if (! $this->session->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $imc = $this->session->get('IMC');
        return view('accueil', ['IMC' => $imc]);
    }

    public function profil(){
        $user = [
            'username' => $this->session->get('username') ?? 'Invite',
            'email' => 'test@gmail.com',
            'genre' => 'Homme',
            'telephone' => '034 12 345 67',
            'taille' => 170,
            'poids' => 70,
        ];

        return view('profil', ['user' => $user]);
    }

    public function objectifs(){
        $objectifs = [
            [
                'title' => 'Augmenter son poids',
                'description' => 'Apport calorique progressif et repartition proteinee.',
                'duration' => '6 a 10 semaines',
            ],
            [
                'title' => 'Reduire son poids',
                'description' => 'Deficit modere, repas legers et reguliers.',
                'duration' => '8 a 12 semaines',
            ],
            [
                'title' => 'Atteindre un IMC ideal',
                'description' => 'Ajustement stable pour rester dans une zone saine.',
                'duration' => '6 a 8 semaines',
            ],
        ];

        return view('objectifs', ['objectifs' => $objectifs]);
    }

    public function regimes(){
        $regimes = [
            [
                'name' => 'Perte progressive',
                'description' => 'Regime equilibre et leger deficit calorique.',
                'duration' => '2 mois',
                'price' => '120 000 Ar',
                'variation' => '-5 kg',
                'meat' => 30,
                'fish' => 20,
                'poultry' => 20,
            ],
            [
                'name' => 'Prise de masse douce',
                'description' => 'Apport energetique reparti et riche en proteines.',
                'duration' => '2 a 3 mois',
                'price' => '150 000 Ar',
                'variation' => '+4 kg',
                'meat' => 35,
                'fish' => 15,
                'poultry' => 25,
            ],
            [
                'name' => 'IMC ideal',
                'description' => 'Stabilisation pour maintenir un poids sain.',
                'duration' => '6 semaines',
                'price' => '95 000 Ar',
                'variation' => '+/-10 kg',
                'meat' => 25,
                'fish' => 25,
                'poultry' => 20,
            ],
        ];

        return view('regimes', ['regimes' => $regimes]);
    }

    public function paiement(){
        $summary = [
            'plan' => 'Perte progressive',
            'price' => '120 000 Ar',
            'discount' => '18 000 Ar',
            'total' => '102 000 Ar',
            'wallet' => '65 000 Ar',
        ];

        return view('paiement', ['summary' => $summary]);
    }

    public function exportPdf(){
        $recap = [
            'name' => $this->session->get('username') ?? 'Invite',
            'objectif' => 'Reduire son poids',
            'regime' => 'Perte progressive',
            'activites' => ['Marche rapide', 'Natation douce', 'Yoga'],
            'duration' => '2 mois',
            'price' => '120 000 Ar',
        ];

        return view('exportpdf', ['recap' => $recap]);
    }


    public function redirectadmin(){
        return view('adminlogin');
    }

   
}