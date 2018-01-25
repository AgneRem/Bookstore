<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class AdminController extends Controller
{
  public function index(){
    return view('admin.index');
  }

  public function search(Request $request){
    $s = $request->input('s');
    $books = Book::search($s)->paginate(10);
    return view('admin.book.index', compact('books', 's'));
  }
}
