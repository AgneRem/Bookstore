<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Requests\StoreBookRequest;
use App\Author;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;

class BooksController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $books = Book::paginate(10);
    return view('admin.book.index', compact('books'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $this->authorize('create', Book::class);
    $authors = Author::all();
    return view('admin.book.create', compact('authors'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreBookRequest $request)
  {
    // $timestamp = Carbon::now()->toAtomString();
    // $name = $request->file('photo')->getClientOriginalName();
    // $request->file('photo')->storeAs('public/image', $timestamp.$name);
    // Image::make(Input::file('photo'))->resize(300, 200)->save(storage_path('app/public/image/'.$timestamp.$name));
    $book = new Book();
    $book->title = $request->title;
    $book->year = $request->year;
    $book->price = $request->price;
    $book->description = $request->description;
    $book->author_id = $request->author_id;
    $book->photo = $request->photo;
    $book->save();
    return redirect('/admin/books')->with(['message'=>'Book add success']);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $book = Book::find($id);
      return view('read', compact('book'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Book $book)
  {
    $this->authorize('update', Book::class);
    $authors = Author::all();
    return view('admin.book.edit', compact('book'), compact('authors'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(StoreBookRequest $request, Book $book)
  {
    $this->authorize('update', Book::class);

    // if($request->file('photo')){
    //   $timestamp = Carbon::now()->toAtomString();
    //   $name = $request->file('photo')->getClientOriginalName();
    //   $path = $request->file('photo')->storeAs('public/image', $timestamp.$name);
    //   Image::make(Input::file('photo'))->resize(300, 200)->save(storage_path('app/public/image/'.$timestamp.$name));
    //   $path_old = '/public/image/';
    //   if (!empty($book->photo)){
    //     Storage::delete($path_old.$book->photo);
    //   }
    //   $book->photo = $timestamp.$name;
    // }
    $book->title = $request->title;
    $book->year = $request->year;
    $book->price = $request->price;
    $book->description = $request->description;
    $book->author_id = $request->author_id;
    $book->photo = $request->photo;
    $book->update();
    return redirect('/admin/books')->with(['message'=>'Book edit success']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Book $book)
  {
    $this->authorize('delete', Book::class);
    // if (!empty($book->photo)){
    //   Storage::delete($book->photo);
    // }
    $book->delete();
    return redirect('admin/books')->with(['message'=>'Book is deleted']);
  }
}
