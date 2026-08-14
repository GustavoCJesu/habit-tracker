<?php

namespace App\Http\Controllers;

class SiteController extends Controller {



    public function index() {

        $nome  = 'Gustavo';
        $idade = 21;
        $habitos = [
            'Correr', 'Ler', 'Jogar', 'Brincar', 'Comer', 'Nadar'
        ];

        return view('home', [
            'nome' => $nome,
            'idade' => $idade,
            'habitos' => $habitos,
        ]);
    }
}
