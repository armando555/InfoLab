<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
  public function store(){
    request()->validate([
      'titlePublication' => 'required',
      'author' => 'required',
      'detailsPublication' => 'required',
      'imageUrl' => 'required|image'
    ]);

    $image = request()->file('imageUrl')->store('public/images');
    $url = Storage:: url($image);

    Publication::create([
      'titlePublication' => request('titlePublication'),
      'author' => request('author'),
      'detailsPublication' => request('detailsPublication'),
      'imageUrl' => $url,
    ]);
    $publicationes = Publication::get();
    return view('/forum/forum',compact('publicationes'));

  }
  public function index()
  {
    return view('/publication/addPublication');
  }

  public function destroy(Publication $publication){
    $publication->delete();
    return redirect()->route('forum.show');
  }

  public function edit(Publication $publication){
    return view('/publication/editpublication', ['publication' => $publication]);
  }

  public function update(Publication $publication){
    $image = request()->file('imageUrl')->store('public/images');
    $url = Storage:: url($image);
    $publication->update([
      'titlePublication' => request('titlePublication'),
      'author' => request('author'),
      'detailsPublication' => request('detailsPublication'),
      'imageUrl' => $url,
    ]);
    return redirect()->route('forum.show');

  }

}
