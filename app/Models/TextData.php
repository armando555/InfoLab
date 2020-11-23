<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextData extends Model
{
    use HasFactory;
    protected $fillable = [
        'analysisText',
        'numeralData',
        'reportId',
    ];
    public function report(){//$TextData->report->title
        return $this->belongsTo(Report::class);//Pertenece a un informe
    }
}
