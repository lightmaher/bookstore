<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'title'=>'required',
            'author'=>'required',
            'body'=>'required',
            'price'=>'required',
            'num_of_books'=>'required',
            'ISBN'=>'required'

        ]);
        $book = new book;
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->body = $request->input('body');
        $book->price = $request->input('price');
        $book->num_of_books = $request->input('num_of_books');
        $book->ISBN = $request->input('ISBN');
        $book->save();

        return redirect('/home')->with('success' , 'book added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = book::find($id);
        return view('books.edit')->with('book',$book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book=book::find($id);
        $this->validate($request , [
            'title'=>'required',
            'author'=>'required',
            'body'=>'required',
            'price'=>'required',
            'num_of_books'=>'required',
            'ISBN'=>'required'
            ]);

        $book->title=$request->input('title');
        $book->author=$request->input('author');
        $book->body=$request->input('body');
        $book->price=$request->input('price');
        $book->num_of_books=$request->input('num_of_books');
        $book->ISBN = $request->input('ISBN');
        $book->save();
        return redirect('/home')->with('success' , 'book Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
