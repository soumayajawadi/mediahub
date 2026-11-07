<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Carte extends Component
{
    public function __construct(public string $titre) {}

    public function render(): View|Closure|string
    {
        return view('components.carte');
    }
}