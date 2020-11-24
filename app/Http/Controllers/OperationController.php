<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class OperationController extends Controller
{

    public function calculateOperation(){
        $meanController = new MeanController();
        $operation = request('calculus');
        $result = 0;
        if ($operation == 'Promedio'){
            $result = $meanController->calculate();
        }
        if($operation == 'Moda'){
            $result = 555;
        }
        if($operation == 'Mediana'){
            $result = 1112;
        }
        return view('calculus.calculus',compact('result'));
    }

}
