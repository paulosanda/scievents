<?php

namespace App\Http\Controllers;

use App\Http\Actions\Benchmark;
class BenchController extends Controller
{
    public function index()
    {
//         dd('chegou');
        $benchmark = new Benchmark();

        ob_start();
        $benchmark->benchmark();
        $output = ob_get_clean();

        // Retorne a saída como resposta HTTP
        return response($output);
    }
}
