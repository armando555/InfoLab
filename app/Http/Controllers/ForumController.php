<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
class ForumController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
  public function index()
  {
    $publicationes = Publication::get();
    return view('/forum/forum',compact('publicationes'));
  }
}
