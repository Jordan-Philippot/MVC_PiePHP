<?php

namespace Model;

use Core\Database;
use PDO;

class UserModel extends AppModel
{
    public function profil($id)
    {
        $statement = $this->db->prepare('SELECT fiche_personne.id_perso AS "id_perso", fiche_personne.nom AS "nom", fiche_personne.prenom AS "prenom", 
        fiche_personne.date_naissance AS "date_naissance", fiche_personne.email AS "email",
        fiche_personne.adresse AS "adresse", fiche_personne.cpostal AS "cpostal", fiche_personne.ville AS "ville", fiche_personne.pays AS "pays",
        fiche_personne.password AS "password", fiche_personne.etat AS "etat",
        membre.id_membre AS "id_membre", membre.id_fiche_perso AS "id_fiche_perso", membre.id_abo AS "id_abo", membre.date_abo AS "date_abo",
        membre.id_dernier_film AS "id_dernier_film", membre.date_dernier_film AS "date_dernier_film", membre.date_inscription AS "date_inscription",
        abonnement.nom AS "nom_abonnement", abonnement.prix AS "prix", abonnement.resum AS "resum_abonnement", abonnement.duree_abo AS "duree_abo", 
        film.id_film AS "id_film", film.titre AS "titre", film.resum AS "resum" 
        FROM fiche_personne LEFT JOIN membre ON fiche_personne.id_perso = membre.id_fiche_perso LEFT JOIN abonnement ON membre.id_abo = abonnement.id_abo
        LEFT JOIN film ON membre.id_dernier_film = film.id_film WHERE id_perso = :id');
        $statement->bindParam(':id', $id);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function connection($email)
    {
        /*
            0 : Compte Inscrit
            1 : Compte Confirmé
            2 : Compte Désactivé
            3 : Compte Banni
         */
        $statement = $this->db->prepare('SELECT fiche_personne.id_perso AS "id_perso", fiche_personne.nom AS "nom", fiche_personne.prenom AS "prenom", 
        fiche_personne.date_naissance AS "date_naissance", fiche_personne.email AS "email",
        fiche_personne.adresse AS "adresse", fiche_personne.cpostal AS "cpostal", fiche_personne.ville AS "ville", fiche_personne.pays AS "pays",
        fiche_personne.password AS "password", fiche_personne.etat AS "etat",
        membre.id_membre AS "id_membre", membre.id_fiche_perso AS "id_fiche_perso", membre.id_abo AS "id_abo", membre.date_abo AS "date_abo",
        membre.id_dernier_film AS "id_dernier_film", membre.date_dernier_film AS "date_dernier_film", membre.date_inscription AS "date_inscription",
        abonnement.nom AS "nom_abonnement", abonnement.prix AS "prix", abonnement.resum AS "resum_abonnement", abonnement.duree_abo AS "duree_abo", 
        film.id_film AS "id_film", film.titre AS "titre", film.resum AS "resum" 
        FROM fiche_personne LEFT JOIN membre ON fiche_personne.id_perso = membre.id_fiche_perso LEFT JOIN abonnement ON membre.id_abo = abonnement.id_abo
        LEFT JOIN film ON membre.id_dernier_film = film.id_film WHERE email = :email');
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function registerPerson($nom, $prenom, $date_naissance, $email, $password)
    {
        $statement = $this->db->prepare('INSERT INTO fiche_personne (nom, prenom, date_naissance, email, password)
        VALUES(:nom, :prenom, :date_naissance, :email, :password)');
        $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
        $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $statement->bindParam(':date_naissance', $date_naissance, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        return $statement->execute();
    }

    public function registerMember($id_fiche_perso)
    {
        $statement = $this->db->prepare('INSERT INTO membre (id_fiche_perso, date_inscription)
        VALUES(:id_fiche_perso, NOW())');
        $statement->bindParam(':id_fiche_perso', $id_fiche_perso);

        return $statement->execute();
    }

    public function delete($id)
    {
        $statement = $this->db->prepare('UPDATE fiche_personne SET etat = "2" WHERE id_perso = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        return $statement->execute();
    }

    public function name($prenom, $nom)
    {
        $statement = $this->db->prepare("SELECT * FROM fiche_personne WHERE prenom = :prenom AND nom = :nom");
        $statement->bindParam(':prenom', $prenom);
        $statement->bindParam(':nom', $nom);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function updateEtat($id)
    {
        $statement = $this->db->prepare('UPDATE fiche_personne SET etat = "1" WHERE id_perso = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        return $statement->execute();
    }

    public function updateProfil($id)
    {
        $sql = 'UPDATE fiche_personne SET id_perso = ' . $_SESSION['users']['id_perso'] . '';

        if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $sql .= ', email ="' . $_POST['email'] . '"';
        }
        if (!empty($_POST['ville']) && preg_match('/^[a-zA-Zéèêëàâîçôù_]+$/', $_POST['ville'])) {
            $sql .= ', ville = "' . $_POST['ville'] . '"';
        }
        if (!empty($_POST['adresse']) && preg_match('/^[a-zA-Z0-9éèêëàâîçôù_\\s]+$/', $_POST['adresse'])) {
            $sql .= ', adresse = "' . $_POST['adresse'] . '"';
        }
        if (!empty($_POST['cpostal']) && preg_match('/^[0-9]+$/', $_POST['cpostal'])) {
            $sql .= ', cpostal = "' . $_POST['cpostal'] . '"';
        }
        if (!empty($_POST['pays']) && preg_match('/^[a-zA-Zéèêëàâîçôù_]+$/', $_POST['pays'])) {
            $sql .= ', pays = "' . $_POST['pays'] . '"';
        }
        if (!empty($_POST['password']) && is_string($_POST['password'])) {
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $sql .= ', password = "' . $_POST['password'] . '"';
        }

        $sql .= ' WHERE id_perso = :id';

        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        return $statement->execute();
    }

    public function subscribed($id_abo)
    {
        $statement = $this->db->prepare('UPDATE membre SET id_abo = :id_abo WHERE id_fiche_perso = ' . $_SESSION['users']['id_perso'] . '');
        $statement->bindParam(':id_abo', $id_abo, PDO::PARAM_STR);
        return $statement->execute();
    }

    public function addHistorical($id_membre, $id_film, $avis)
    {
        $statement = $this->db->prepare('INSERT INTO historique_membre(id_membre, id_film, date, avis) VALUES(:id_membre, :id_film, NOW(), :avis)');
        $statement->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
        $statement->bindParam(':id_film', $id_film, PDO::PARAM_INT);
        $statement->bindParam(':avis', $avis, PDO::PARAM_STR);
        return $statement->execute();
    }

    public function updateHistorical($id_dernier_film)
    {
        $statement = $this->db->prepare('UPDATE membre SET id_dernier_film = :id_dernier_film, date_dernier_film = NOW() WHERE id_fiche_perso = ' . $_SESSION['users']['id_perso'] . '');
        $statement->bindParam(':id_dernier_film', $id_dernier_film, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function historical()
    {
        $statement = $this->db->prepare('SELECT historique_membre.id_membre AS "id_membre", historique_membre.id_film AS "id_film", historique_membre.date AS "date",
        historique_membre.avis AS "avis", film.date_debut_affiche AS "debut_affiche", film.date_fin_affiche AS "fin_affiche",
        film.id_film AS "id_film", film.titre AS "titre", film.resum AS "resum", film.annee_prod AS "annee_prod", film.duree_min AS "duree_min",
        genre.nom AS "nom_genre", distrib.nom AS "nom_distrib" FROM historique_membre LEFT JOIN film ON historique_membre.id_film = film.id_film 
        LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib LEFT JOIN genre ON film.id_genre = genre.id_genre 
        WHERE id_membre = ' . $_SESSION['users']['id_membre'] . '');
        $statement->execute();
        $historical = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $historical;
    }

    public function deleteHistorical($id_film, $id_membre)
    {
        $statement = $this->db->prepare('DELETE FROM historique_membre WHERE id_film = :id_film AND id_membre = :id_membre');
        $statement->bindParam(':id_film', $id_film, PDO::PARAM_INT);
        $statement->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
        $statement->execute();
    }
}
