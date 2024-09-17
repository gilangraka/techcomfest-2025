<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function webApp() {
        $techStack = [
            (object)[
                "name" => "Laravel", 
                "imgUrl" => "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/laravel/laravel-original.svg"
            ],
            (object)[
                "name" => "MySql", 
                "imgUrl" => "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mysql/mysql-original.svg"
            ],
            (object)[
                "name" => "Tailwind", 
                "imgUrl" => "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/tailwindcss/tailwindcss-original.svg"
            ],
            (object)[
                "name" => "Bootstrap", 
                "imgUrl" => "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/bootstrap/bootstrap-original.svg"
            ],
        ];

        return view('pages.competition.web-app', compact('techStack'));
    }
}
