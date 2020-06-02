<?php

namespace Controller;

use Core\Controller;
use Model\MovieModel;
use Controller\AppController;

class MovieController extends Controller
{
    public function indexAction()
    {
        if (isset($_POST['search']) && !empty($_POST['search'])) {
            $movie = new MovieModel();
            $movies = $movie->search();
            $this->render("index", $movies);
        } elseif (!isset($_POST['search']) && empty($_POST['search'])) {
            $movie = new MovieModel();
            $movies = $movie->movie();
            $this->render("index", $movies);
        } else {
            $error = new ErrorController;
            $error->errorAction();
            $this->render("error");
        }
    }
    public function movieAction()
    {
        if (isset($_POST['id'])) {
            $movie = new MovieModel();
            $movies = $movie->oneMovie($_POST['id']);
            $this->render("movie", $movies);
        } else {
            $error = new ErrorController;
            $error->errorAction();
            $this->render("error");
        }
    }

    public function allKindAction()
    {
        try {
            $kinds = new MovieModel();
            $kinds = $kinds->allKind();
            $this->render("allKind", $kinds);
        } catch (\Throwable $th) {
            $error = new ErrorController;
            $error->errorAction();
            $this->render("error");
        }
    }

    public function kindMoviesAction()
    {
        if (isset($_POST['nom'])) {
            $movie = new MovieModel();
            $movies = $movie->kindMovie($_POST['nom']);
            $this->render("kindMovies", $movies);
        } else {
            $error = new ErrorController;
            $error->errorAction();
            $this->render("error");
        }
    }

    public function oneKindAction()
    {
        if (isset($_POST['id'])) {
            $movie = new MovieModel();
            $movies = $movie->Onemovie($_POST['id']);
            $this->render("oneKind", $movies);
        } else {
            $error = new ErrorController;
            $error->errorAction();
            $this->render("error");
        }
    }
}
