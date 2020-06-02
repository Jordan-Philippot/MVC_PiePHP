<?php

use Core\Router;

Router::connect('/', ['controller' => 'Movie', 'action' => 'index']);                               // Home
Router::connect('/movie', ['controller' => 'Movie', 'action' => 'movie']);                          // Info Movie onClick
// Router::connect('/search', ['controller' => 'Movie', 'action' => 'search']);                        //Search in Home page

Router::connect('/register', ['controller' => 'User', 'action' => 'register']);                     // Register Page (No action)
Router::connect('/registration', ['controller' => 'User', 'action' => 'registration']);             // Register Action
Router::connect('/login', ['controller' => 'User', 'action' => 'login']);                           // Connection Page (No action)
Router::connect('/connect', ['controller' => 'User', 'action' => 'connect']);                       // Connection Action
Router::connect('/profil', ['controller' => 'User', 'action' => 'profil']);                         // Profil Page 
Router::connect('/deconnection', ['controller' => 'User', 'action' => 'deconnection']);             // Deconnection

Router::connect('/delete', ['controller' => 'User', 'action' => 'delete']);                         // Desactivate
Router::connect('/edit', ['controller' => 'User', 'action' => 'edit']);                             // Edit Profil (No action)
Router::connect('/update', ['controller' => 'User', 'action' => 'update']);                         // Update Profil
Router::connect('/prenium', ['controller' => 'User', 'action' => 'prenium']);                       // Insert Id Member
Router::connect('/subscription', ['controller' => 'User', 'action' => 'subscription']);             // Subscription Edit (No action)
Router::connect('/subscribed', ['controller' => 'User', 'action' => 'subscribed']);                 // Update Subcription

Router::connect('/addHistorical', ['controller' => 'User', 'action' => 'addHistorical']);           // Add Movie in Historical member
Router::connect('/historical', ['controller' => 'User', 'action' => 'historical']);                 // Show Historical
Router::connect('/historicmovie', ['controller' => 'User', 'action' => 'historicmovie']);           // Show one Movie of Historical
Router::connect('/deleteHistorical', ['controller' => 'User', 'action' => 'deleteHistorical']);     // Delete one Movie of Historical

Router::connect('/allKind', ['controller' => 'Movie', 'action' => 'allKind']);                      // Page with All Kind of Movie
Router::connect('/kindMovies', ['controller' => 'Movie', 'action' => 'kindMovies']);                // All movies from 1 Kind
Router::connect('/oneKind', ['controller' => 'Movie', 'action' => 'oneKind']);                      // Info 1 movie from 1 Kind


Router::connect('/error', ['controller' => 'Error', 'action' => 'error']);                          // Page Error 404
