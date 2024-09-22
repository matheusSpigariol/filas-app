<?php

namespace App\Http\Controllers;

use App\Jobs\TestJob;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        TestJob::dispatch('Exemplo mensagem...');

        return 'Processo concluido';
    }
}
