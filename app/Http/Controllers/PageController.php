<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function accueil()
    {
        return 'Accueil de MediaHub';
    }

    public function aPropos()
    {
        return 'À propos de MediaHub';
    }
}