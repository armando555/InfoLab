<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class MeanController extends Controller implements IOperations
{
    public function calculate(){
        $group = request('groupData');
        $numDatas = Data::where('numeralData', '=', $group)->get();
        $count = Data::where('numeralData', '=', $group)->count();
        $acu = 0;
        foreach($numDatas as $num){
            $acu += $num->numData;
        }
        return $acu/$count;
    }
}
