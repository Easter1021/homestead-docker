<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Book;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class BooksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $books = Book::paginate(15);

        if($request->route()->getPrefix() == '/api')
            return response()->json(($request->format)? ['data'=>$books] : $books);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'description' => 'required', ]);

        $book = Book::create($request->all());

        $book->user_id = $request->user_id or null;

        $book->save();

        Session::flash('flash_message', 'Book added!');

        if($request->route()->getPrefix() == '/api')
            return response()->json(($request->format)? ['data'=>$book] : $book);
        return redirect('books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show(Request $request, Book $book)
    {
        if($request->route()->getPrefix() == '/api')
            return response()->json(($request->format)? ['data'=>$book] : $book);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit(Request $request, Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());

        Session::flash('flash_message', 'Book updated!');

        if($request->route()->getPrefix() == '/api')
            return response()->json(($request->format)? ['data'=>$book] : $book);
        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy(Request $request, Book $book)
    {
        $book->delete();

        Session::flash('flash_message', 'Book deleted!');

        if($request->route()->getPrefix() == '/api')
            return response()->json(($request->format)? ['data'=>['success'=>true]] : ['success'=>true]);
        return redirect('books');
    }

    public function user(Request $request, Book $book) {
        if($request->route()->getPrefix() == '/api')
            return response()->json(($request->format)? ['data'=>$book->user] : $book->user);
        return view('users.show', compact('user'));
    }

}
