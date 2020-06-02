<?php

namespace Controller;

use Core\Controller;

class ErrorController extends Controller
{
    public function errorAction()
    {
        $this->render("error");
    }
}
