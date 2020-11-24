<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Report;
use App\Models\Data;
use App\Models\TextData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::get();
        return view('/report/reports',compact('reports'));
    }
    public function createReport()
    {
        return view('/report/addReport');
    }
    public function store(){
        request()->validate([
            'titleReport' => 'required',
            'author' => 'required',
            'description' => 'required',
        ]);
        $userIds = Auth::user()->getAuthIdentifier();
        Report::create([
            'title' => request('titleReport'),
            'author' => request('author'),
            'description' => request('description'),
            'userId' => $userIds,
        ]);
        return redirect()->route('report.show');

    }
    public function edit(Report $report){
        $dataController = new DataController();
        $numDatas = $dataController->getAllData();
        $textData = TextData::get();
        $groupData = [];
        foreach($numDatas as $data){
            if ((in_array($data->numeralData, $groupData))){

            }else{
                array_push($groupData,$data->numeralData);
            }
        }//*/
        return view('/report/editReport', ['report' => $report,'textData'=> $textData,'groupData' => $groupData],compact('numDatas'));
    }

    public function destroy(Report $report){
        $report->delete();
        return redirect()->route('report.show');
    }

    public function update(Report $report){
        $report->update([
            'title' => request('titleReport'),
            'author' => request('author'),
            'description' => request('description'),
        ]);

        return redirect()->route('report.edit',['report' => $report]);

    }

    public function saveText(){
        $data = request('analiticData');
        $numeral = request('numeralAnalitic');
        echo $data;
        echo "<br>";
        echo $numeral;
        TextData:: create([
            'analysisText' => $data,
            'numeralData' => $numeral,
            'reportId' => request('idReport'),
        ]);//*/
        return redirect()->route('report.show');
    }
    public function saveModalNumData(){
        $dataController = new DataController();
        $dataController->addData();
        return redirect()->route('report.show');
    }
}

