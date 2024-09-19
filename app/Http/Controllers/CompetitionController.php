<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function webApp() {
        $techStackWeb = [
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

        return view('pages.competition.web-app', compact('techStackWeb'));
    
    }

    public function ctf() {
        $techStackCtf = [
            (object)[
                "name" => "Burp Suite", 
                "imgUrl" => "https://assets.tryhackme.com/img/modules/burp-suite.png"
            ],
            (object)[
                "name" => "Wireshark", 
                "imgUrl" => "https://cdn.icon-icons.com/icons2/1508/PNG/512/wireshark_104082.png"
            ],
        ];

        return view('pages.competition.ctf', compact('techStackCtf'));
    }

    public function uiux() {
        $techStackUiUx = [
            (object)[
                "name" => "Figma", 
                "imgUrl" => "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/figma/figma-original.svg"
            ],
        ];

        return view('pages.competition.ui-ux-design', compact('techStackUiUx'));
    }
}
