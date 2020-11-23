<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $fillable = [
        'textData',
        'numData',
        'numeralData',
        'reportId',
    ];
    public function report(){//$Data->report->title
        return $this->belongsTo(Report::class);//Pertenece a un informe
    }
}
