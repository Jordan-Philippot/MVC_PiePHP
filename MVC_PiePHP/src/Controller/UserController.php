<?php

namespace Controller;

use Core\Controller;
use Model\UserModel;
use Model\MovieModel;
use Model\AppModel;

class UserController extends Controller
{
    public function loginAction() // Page de connexion
    {
        $this->render("login");
    }
    public function registerAction() // Page d'inscription
    {
        $this->render("register");
    }

    public function connectAction() // Submit Connexion
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $response['success'] = false;
        $response['errors'] = [];
        if (!empty($_POST)) {
            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $response['errors']['email'] = "Email non valide";
            }
            if (empty($_POST['password']) || !is_string($_POST['password'])) {
                $response['errors']['password'] = "Mot de passe non valide";
            }
            if (empty($response['errors'])) {
                $user = new UserModel();
                $users = $user->connection($_POST['email']);

                if ($users) {
                    if ($users['etat'] == "2") {
                        $response['errors']['email'] = "Compte inactif";
                    }
                    if (password_verify($_POST['password'], $users['password']) && $users['etat'] != 2) {
                        $_SESSION['users'] = $users;
                        $response["success"] = true;
                    } else {
                        $response['errors']['password'] = "Mot de passe incorrect";
                        $response["success"] = false;
                    }
                } else {
                    $response['errors']['email'] = "Compte inexistant";
                    $response["success"] = false;
                }
            }
            echo json_encode($response);
        } else {
            $error = new ErrorController;
            $error->errorAction();
            $this->render("error");
        }
    }

    public function registrationAction() // Submit inscription
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $response['success'] = false;
        $response['errors'] = [];
        if (!empty($_POST)) {
            if (empty($_POST['prenom']) || !preg_match('/^[a-zA-Zéèêëàâîçôù_]+$/', $_POST['prenom']) || !is_string($_POST['prenom'])) {
                $response['errors']['prenom'] = "Prenom incorrecte";
            }
            if (empty($_POST['nom']) || !preg_match('/^[a-zA-Zéèêëàâîçôù_]+$/', $_POST['nom']) || !is_string($_POST['nom'])) {
                $response['errors']['nom'] = "Nom incorrecte";
            } else {
                $name = new UserModel();
                $name = $name->name($_POST['prenom'], $_POST['nom']);
                if ($name) {
                    $response['errors']['prenom'] = 'Personne déjà existante';
                }
            }
            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $response['errors']['email'] = "Email incorrect";
            } else {
                $emailVerif = new UserModel();
                $emailVerif = $emailVerif->connection($_POST['email']);
                $_SESSION['id_perso'] = $emailVerif['id_perso'];
                if ($emailVerif) {
                    $response['errors']['email'] = 'Email déjà existant';
                }
            }
            if (!isset($_POST['naissance']) || empty($_POST['naissance'])) {
                $response['errors']['naissance'] = "Date de naissance incorrecte";
            }
            if (empty($_POST['password']) || !is_string($_POST['password'])) {
                $response['errors']['password'] = "Mot de passe incorrecte";
                $response['errors']['passwordConfirm'] = "Mot de passe incorrect";
            }
            if ($_POST['password'] != $_POST['passwordConfirm']) {
                $response['errors']['passwordConfirm'] = "Les mots de passe ne sont pas identiques";
            }
            if (empty($response['errors'])) {
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
                try {

                    $registerPerson = new UserModel();
                    $registerPerson = $registerPerson->registerPerson($_POST['nom'], $_POST['prenom'], $_POST['naissance'], $_POST['email'], $_POST['password']);

                    $response["success"] = true;
                } catch (\Throwable $th) {
                    $response["success"] = false;
                }
            }
            echo json_encode($response);
        } else {
            $error = new ErrorController;
            $error->errorAction();
            $this->render("error");
        }
    }

    public function profilAction()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['users'])) {
            $profil = new UserModel();
            $profil = $profil->profil($_SESSION['users']['id_perso']);
            $this->render("profil", $profil);
        } else {
            $error = new ErrorController;
            $error->errorAction();
            $this->render("error");
        }
    }

    public function deconnectionAction()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        $_SESSION['users'] = false;
        $this->render("login");
    }

    public function preniumAction()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $edit = new UserModel();
        $edit = $edit->profil($_SESSION['users']['id_perso']);
        if (isset($edit['id_membre'])) {
            $this->render("profil", $edit);
        } else {
            $edit = new UserModel();
            $edit = $edit->updateEtat($_SESSION['users']['id_perso']);
            $member = new UserModel();
            $member = $member->registerMember($_SESSION['users']['id_perso']);
            $this->render("profil");
        }
    }

    public function deleteAction()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['users'])) {
            session_destroy();
            $delete = new UserModel();
            $delete = $delete->delete($_SESSION['users']['id_perso']);
            $this->render("index");
        } else {
            $error = new ErrorController;
            $error->errorAction();
            $this->render("error");
        }
    }
    public function editAction()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['users'])) {
            $this->render("edit");
        } else {
            $error = new ErrorController;
            $error->errorAction();
            $this->render("error");
        }
    }
    public function updateAction()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['users'])) {
            $update = new UserModel();
            $update = $update->updateProfil($_SESSION['users']['id_perso']);
            $profil = new UserModel();
            $profil = $profil->profil($_SESSION['users']['id_perso']);
            $this->render("profil", $profil);
        } else {
            $error = new ErrorController;
            $error->errorAction();
            $this->render("error");
        }
    }
    public function subscriptionAction()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['users'])) {
            $update = new UserModel();
            $update = $update->profil($_SESSION['users']['id_perso']);
            $this->render("subscription", $update);
        } else {
            $error = new ErrorController;
            $error->errorAction();
            $this->render("error");
        }
    }
    public function subscribedAction()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['users']) && isset($_POST['id_abo'])) {
            try {
                $subscribed = new UserModel();
                $subscribed = $subscribed->subscribed($_POST['id_abo']);
                $profil = new UserModel();
                $profil = $profil->profil($_SESSION['users']['id_perso']);
                $this->render("profil", $profil);
            } catch (\Throwable $th) {
                $error = new ErrorController;
                $error->errorAction();
                $this->render("error");
            }
        } else {
            $error = new ErrorController;
            $error->errorAction();
            $this->render("error");
        }
    }
    public function addHistoricalAction()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['users'])) {
            try {
                $add = new UserModel();
                $add = $add->addHistorical($_SESSION['users']['id_perso'], $_POST['idAdd'], $_POST['avis']);
                $update = new UserModel();
                $update = $update->updateHistorical($_POST['idAdd']);
                $profil = new UserModel();
                $profil = $profil->profil($_SESSION['users']['id_perso']);
                $this->render("profil", $profil);
            } catch (\Throwable $th) {
                $error = new ErrorController;
                $error->errorAction();
                $this->render("error");
            }
        } else {
            $error = new ErrorController;
            $error->errorAction();
            $this->render("error");
        }
    }
    public function historicalAction()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['users'])) {
            try {
                $historical = new UserModel();
                $historical = $historical->historical();
                $this->render("historical", $historical);
            } catch (\Throwable $th) {
                $error = new ErrorController;
                $error->errorAction();
                $this->render("error");
            }
        } else {
            $error = new ErrorController;
            $error->errorAction();
            $this->render("error");
        }
    }
    public function historicmovieAction()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['users'])) {
            try {
                $historical = new MovieModel();
                $historical = $historical->oneMovie($_POST['id']);
                $this->render("historicmovie", $historical);
            } catch (\Throwable $th) {
                $error = new ErrorController;
                $error->errorAction();
                $this->render("error");
            }
        } else {
            $error = new ErrorController;
            $error->errorAction();
            $this->render("error");
        }
    }
    public function deleteHistoricalAction()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['users'])) {
            $delete = new UserModel();
            $delete = $delete->deleteHistorical($_POST['id_film'], $_POST['id_membre']);
            $historical = new UserModel();
            $historical = $historical->historical();
            $this->render("historical", $historical);
        } else {
            $error = new ErrorController;
            $error->errorAction();
            $this->render("error");
        }
    }
}
