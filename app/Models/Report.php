<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'author',
        'userId',
    ];
    public function user(){//$Report->report->title
        return $this->belongsTo(User::class);//Pertenece a un usuario
    }
}
