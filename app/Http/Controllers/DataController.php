<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller implements IDAODataModel
{
    public function addData()
    {
        $datos = request('dataGroup');
        $cont = 1;
        $datos1= explode(',',$datos);
        $numeral = request('numeralDataGroup');
        echo "numeral: ".$numeral;
        echo "<br>";
        foreach ($datos1 as $dato){
            $dato = $dato + 0.0;
            echo "Dato ".$cont.": ".$dato."<br>";
            $cont ++ ;
            Data:: create([
                'numData' => $dato,
                'numeralData' => $numeral,
                'reportId' => request('idReport'),
            ]);
        }
        return redirect()->route('report.show');
    }
    public function getAllData()
    {
        $numDatas = Data::get();
        return $numDatas;
    }
}
