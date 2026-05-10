<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\CategorieModel;
use App\Models\GenreModel;
use App\Models\RoleModel;
use App\Models\UserHealthProfileModel;
use App\Models\UserObjectifModel;
use App\Controllers\BaseController;
use Config\Services;


class User extends BaseController
{
    protected $userModel;
    protected $session;//Ho an ny username
    protected $categorieModel;
    protected $genreModel;
    protected $roleModel;
    protected $healthProfileModel;
    protected $userObjectifModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->categorieModel = new CategorieModel();
        $this->genreModel = new GenreModel();
        $this->roleModel = new RoleModel();
        $this->healthProfileModel = new UserHealthProfileModel();
        $this->userObjectifModel = new UserObjectifModel();
        $this->session = Services::session();
    }

    public function index(){
        return view('login');
    }

    public function login(){
        $email = $this->request->getPost('email');
        $mot_de_passe = $this->request->getPost('password');

        $user = $this->userModel->authenticateCredentials($email, $mot_de_passe);
        if ($user !== null && !is_string($user)) {
            // Authentification réussie
        $profile = $this->healthProfileModel->getLatestForUser((int) $user['id']);
        $IMC = null;
        if ($profile) {
            $IMC = $this->userModel->calculeIMC((int) $profile['taille'], (int) $profile['poids_actuel']);
        }

        $existingObjectif = $this->userObjectifModel->getByUserId((int) $user['id']);
        if ($existingObjectif) {
            $this->session->set([
                'username' => $user['nom'],
                'user_id'  => $user['id'],
                'isLoggedIn' => true,
                'IMC' => $IMC,
            ]);
            return redirect()->to('/objectif?objectif=' . $existingObjectif['id_objectif_type']);
        }

            return view('login', ['error' => 'Objectif manquant pour ce compte.']);
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

        $genreRow = $this->genreModel->getByLabel($genre);
        if (!$genreRow) {
            return view('inscription', ['errors' => ['Genre invalide.']]);
        }

        $this->session->set('tempusers', [
            'nom' => $nom,
            'email' => $email,
            'mot_de_passe' => $mot_de_passe,
            'id_genre' => (int) $genreRow['id'],
        ]);

        $objectifs = $this->categorieModel->getAll();
        return view('inscriptiondetails', ['objectifs' => $objectifs]);
    }

    public function put(){

        $tempusers = $this->session->get('tempusers');
        $taille = $this->request->getPost('taille');
        $poids = $this->request->getPost('poids');
        $poidsCible = $this->request->getPost('poids_cible');
        $objectifTypeId = $this->request->getPost('objectif_type');

        if (!$tempusers) {
            return view('inscription', ['errors' => ['Session invalide, veuillez recommencer.']]);
        }

        if ($poidsCible === null || $objectifTypeId === null) {
            $objectifs = $this->categorieModel->getAll();
            return view('inscriptiondetails', [
                'errors' => ['Objectif et poids cible requis.'],
                'objectifs' => $objectifs,
            ]);
        }

        $role = $this->roleModel->getByName('user');
        if (!$role) {
            $objectifs = $this->categorieModel->getAll();
            return view('inscriptiondetails', [
                'errors' => ['Role utilisateur introuvable.'],
                'objectifs' => $objectifs,
            ]);
        }

        $user = $this->userModel->createUser(
            $tempusers['nom'],
            $tempusers['email'],
            $tempusers['mot_de_passe'],
            (int) $tempusers['id_genre'],
            (int) $role['id']
        );

        if (!$user) {
            return view('inscription', ['errors' => $this->userModel->errors()]);
        }

        $profileSaved = $this->healthProfileModel->createProfile(
            (int) $user['id'],
            (float) $poids,
            (float) $taille
        );

        if (!$profileSaved) {
            $objectifs = $this->categorieModel->getAll();
            return view('inscriptiondetails', [
                'errors' => $this->healthProfileModel->errors(),
                'objectifs' => $objectifs,
            ]);
        }

        $objectifSaved = $this->userObjectifModel->setObjective(
            (int) $user['id'],
            (int) $objectifTypeId,
            (float) $poidsCible
        );

        if (!$objectifSaved) {
            $objectifs = $this->categorieModel->getAll();
            return view('inscriptiondetails', [
                'errors' => $this->userObjectifModel->errors(),
                'objectifs' => $objectifs,
            ]);
        }

        $this->session->set('username', $user['nom']);
        $this->session->set('user_id', $user['id']);

        $IMC = $this->userModel->calculeIMC((int) $taille, (int) $poids);
        $this->session->set('IMC', $IMC);

        return redirect()->to('/objectif?objectif=' . (int) $objectifTypeId);
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

    public function accueil(){
        $cards = [
            ['title' => 'Profil', 'desc' => 'Consulter et completer les informations personnelles.', 'link' => '/profil'],
            ['title' => 'Objectifs', 'desc' => 'Choisir entre prise, perte ou IMC ideal.', 'link' => '/objectifs'],
            ['title' => 'Regimes', 'desc' => 'Voir les regimes proposes et leurs tarifs.', 'link' => '/regimes'],
            ['title' => 'Activites', 'desc' => 'Explorer les sports conseilles selon le programme.', 'link' => '/activites'],
            ['title' => 'Paiement', 'desc' => 'Simuler le wallet et l option Gold.', 'link' => '/paiement'],
            ['title' => 'Export PDF', 'desc' => 'Telecharger le recapitulatif du programme.', 'link' => '/export-pdf'],
        ];

        return view('accueil', [
            'username' => $this->session->get('username') ?? 'Utilisateur test',
            'IMC' => $this->session->get('IMC') ?? 22.8,
            'cards' => $cards,
        ]);
    }

    public function profil(){
        $user = [
            'nom' => $this->session->get('username') ?? 'Rakoto',
            'email' => 'test@gmail.com',
            'genre' => 'Homme',
            'telephone' => '034 12 345 67',
            'taille' => '170 cm',
            'poids' => '70 kg',
            'objectif' => 'Reduire son poids',
        ];

        return view('profil', ['user' => $user]);
    }

    public function objectifs(){
        $objectifs = [
            [
                'title' => 'Augmenter son poids',
                'text' => 'Programme plus calorique avec des repas riches et reguliers.',
                'badge' => 'Volume',
            ],
            [
                'title' => 'Reduire son poids',
                'text' => 'Programme leger avec deficit calorique et cardio.',
                'badge' => 'Sante',
            ],
            [
                'title' => 'Atteindre un IMC ideal',
                'text' => 'Programme progressif pour stabiliser le poids.',
                'badge' => 'Equilibre',
            ],
        ];

        return view('objectifs', ['objectifs' => $objectifs]);
    }

    public function regimes(){
        $regimes = [
            [
                'nom' => 'Perte progressive',
                'description' => 'Perdre 5 kg en 2 mois avec un rythme sain.',
                'duree' => '8 semaines',
                'prix' => '120 000 Ar',
                'variation' => '-5 kg',
                'viande' => 30,
                'poisson' => 25,
                'volaille' => 20,
            ],
            [
                'nom' => 'Prise de masse douce',
                'description' => 'Gagner du poids avec une alimentation plus dense.',
                'duree' => '10 semaines',
                'prix' => '145 000 Ar',
                'variation' => '+4 kg',
                'viande' => 35,
                'poisson' => 15,
                'volaille' => 25,
            ],
            [
                'nom' => 'IMC ideal',
                'description' => 'Conserver une bonne zone IMC et un rythme stable.',
                'duree' => '6 semaines',
                'prix' => '100 000 Ar',
                'variation' => 'Stable',
                'viande' => 25,
                'poisson' => 25,
                'volaille' => 25,
            ],
        ];

        return view('regimes', ['regimes' => $regimes]);
    }

    public function activites(){
        $activites = [
            ['nom' => 'Course', 'desc' => 'Cardio, endurance et perte de calories.', 'intensite' => 'Moyenne'],
            ['nom' => 'Natation', 'desc' => 'Travail complet du corps, doux pour les articulations.', 'intensite' => 'Moderee'],
            ['nom' => 'Velo', 'desc' => 'Activite progressive pour bruler des calories.', 'intensite' => 'Moyenne'],
            ['nom' => 'Musculation', 'desc' => 'Renforcement et prise de masse musculaire.', 'intensite' => 'Elevee'],
        ];

        return view('activites', ['activites' => $activites]);
    }

    public function paiement(){
        $summary = [
            'regime' => 'Perte progressive',
            'price' => '120 000 Ar',
            'gold' => '18 000 Ar',
            'total' => '102 000 Ar',
            'wallet' => '65 000 Ar',
        ];

        return view('paiement', ['summary' => $summary]);
    }

    public function exportPdf(){
        $recap = [
            'nom' => $this->session->get('username') ?? 'Rakoto',
            'objectif' => 'Reduire son poids',
            'regime' => 'Perte progressive',
            'activites' => 'Course, natation, velo',
            'duree' => '8 semaines',
            'prix' => '120 000 Ar',
        ];

        return view('exportpdf', ['recap' => $recap]);
    }

   
}