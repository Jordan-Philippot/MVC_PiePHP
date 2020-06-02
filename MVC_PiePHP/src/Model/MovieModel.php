<?php

namespace Model;

use Core\Database;
use PDO;

class MovieModel extends AppModel
{
    public function movie()
    {
        $statement = $this->db->prepare('SELECT film.date_debut_affiche AS "debut_affiche", film.date_fin_affiche AS "fin_affiche",
        film.id_film AS "id_film", film.titre AS "titre", film.resum AS "resum", film.annee_prod AS "annee_prod", film.duree_min AS "duree_min",
        genre.nom AS "nom_genre", distrib.nom AS "nom_distrib" FROM film LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
        LEFT JOIN genre ON film.id_genre = genre.id_genre LIMIT 10');
        $statement->execute();
        $movie = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $movie;
    }
    public function oneMovie($id)
    {
        $statement = $this->db->prepare('SELECT film.date_debut_affiche AS "debut_affiche", film.date_fin_affiche AS "fin_affiche",
        film.id_film AS "id_film", film.titre AS "titre", film.resum AS "resum", film.annee_prod AS "annee_prod", film.duree_min AS "duree_min",
        genre.nom AS "nom_genre", distrib.nom AS "nom_distrib" FROM film LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
        LEFT JOIN genre ON film.id_genre = genre.id_genre WHERE id_film = :id');
        $statement->bindParam(':id', $id);
        $statement->execute();
        $movie = $statement->fetch(PDO::FETCH_ASSOC);
        return $movie;
    }

    public function allKind()
    {
        $statement = $this->db->prepare('SELECT nom, id_genre FROM genre');
        $statement->execute();
        $kinds = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $kinds;
    }

    public function kindMovie($nom)
    {
        $statement = $this->db->prepare('SELECT film.date_debut_affiche AS "debut_affiche", film.date_fin_affiche AS "fin_affiche",
        film.id_film AS "id_film", film.titre AS "titre", film.resum AS "resum", film.annee_prod AS "annee_prod", film.duree_min AS "duree_min",
        genre.nom AS "nom_genre", genre.id_genre AS "id_genre", distrib.nom AS "nom_distrib" FROM film LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
        LEFT JOIN genre ON film.id_genre = genre.id_genre WHERE genre.nom = :nom');
        $statement->bindParam(':nom', $nom);
        $statement->execute();
        $movies = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $movies;
    }

    public function search()
    {
        $statement = $this->db->prepare('SELECT film.date_debut_affiche AS "debut_affiche", film.date_fin_affiche AS "fin_affiche",
        film.id_film AS "id_film", film.titre AS "titre", film.resum AS "resum", film.annee_prod AS "annee_prod", film.duree_min AS "duree_min",
        genre.nom AS "nom_genre", genre.id_genre AS "id_genre", distrib.nom AS "nom_distrib" FROM film LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
        LEFT JOIN genre ON film.id_genre = genre.id_genre WHERE film.titre LIKE "%' . $_POST['search'] . '%"');
        $statement->execute();
        $title = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $title;
    }
}
