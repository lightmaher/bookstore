<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book;
use App\cart;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin' , ['except' => ['show' ,'DeleteFromCart', 'AddtoCart' , 'UpdateCart' , 'showcart' , 'index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = book::orderby('created_at','desc')->get();
        return view('books.index')->with('books',$books);
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
            'image'=>'image|nullable|max:1999',
            'title'=>'required',
            'author'=>'required',
            'body'=>'required',
            'price'=>'required',
            'num_of_books'=>'required',
            'ISBN'=>'required|size:9'

        ]);
        if($request->hasFile('image')){
            $filenameWithExt=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $fileExt=$request->file('image')->getClientOriginalExtension();
            $filetostore=$filename.'_'.time().'.'.$fileExt;
            $path=$request->file('image')->storeAs('public/Images' , $filetostore);
        }else{
            $filetostore='noimage.jpg';
        }

        $book = new book;
        $book->image= $filetostore;
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->body = $request->input('body');
        $book->price = $request->input('price');
        $book->num_of_books = $request->input('num_of_books');
        $book->ISBN = $request->input('ISBN');
        $book->save();

        return redirect('/books')->with('success' , 'book added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = book::find($id);
        return view('books.show')->with('book',$book);
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
            'image'=>'image|nullable|max:1999',
            'title'=>'required',
            'author'=>'required',
            'body'=>'required',
            'price'=>'required',
            'num_of_books'=>'required',
            'ISBN'=>'required|size:9'
            ]);
        if($request->hasFile('image')){
            $filenameWithExt=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $fileExt=$request->file('image')->getClientOriginalExtension();
            $filetostore=$filename.'_'.time().'.'.$fileExt;
            $path=$request->file('image')->storeAs('public/Images' , $filetostore);
        }
        if($request->hasFile('image')){
             $book->image=$filetostore;
        }
        $book->title=$request->input('title');
        $book->author=$request->input('author');
        $book->body=$request->input('body');
        $book->price=$request->input('price');
        $book->num_of_books=$request->input('num_of_books');
        $book->ISBN = $request->input('ISBN');
        $book->save();
        return redirect('/books')->with('success' , 'book Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
            $book = book::find($id);
            if($book->image!=="noimage.jpg"){
                Storage::delete('public/Images/'.$book->image);
            }
            $book->delete();
    
            return redirect('/books')->with('success' , 'Book Deleted');   
    }
    public function AddtoCart(book $book){
        if($book->num_of_books > 0)
        {
            if(session()->has('cart')){
            $cart= new cart(session()->get('cart'));
            }
            else{
                $cart = new cart();
            }
            $cart->Add($book);
            session()->put('cart',$cart);
            return redirect('/books')->with('success' , 'Book added to cart');
        }
        return redirect('/books')->with('error' , 'Book is not available now');
    }
     public function showcart(){
        if(session()->has('cart')){
           $cart= new cart(session()->get('cart'));
        }
        else{
            $cart = new cart();
        }
        return view('cart/show')->with('cart',$cart);
    }
     public function DeleteFromCart(book $book){
         $cart = new cart(session()->get('cart'));
         $cart->remove($book->id);
         session()->forget('cart');

/** 
         if($cart->total_qty <= 0 ){
             session()->forget('cart');
         }
         else{
             session()->put('cart' , $cart);
         }*/
        return redirect('/shopping-cart')->with('success' , 'Book is Removed');
    }
    public function UpdateCart(Request $request , book $book){
         
        $cart = new cart(session()->get('cart'));
        $cart->UpdateQty($book->id , $request->qty);
        session()->put('cart' , $cart);
        return redirect()->route('cart.show')->with('success' , 'Book is updated');
   }
}
