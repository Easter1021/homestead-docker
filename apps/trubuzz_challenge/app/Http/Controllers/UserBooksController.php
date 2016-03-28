<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Book;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class UserBooksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request, User $user)
    {
        $books = $user->books()->paginate(15);

        $view = 'books.index';
        return response()->taker(compact('user', 'books', 'view'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy(Request $request, User $user, Book $book)
    {
        if($book->user_id != $user->id)
            abort(403, 'Unauthorized action.');

        Session::flash('flash_message', ' deleted!');

        $success = true
        $redirect = action('UserBooksController@index', $user);
        return response()->taker(compact('success', 'redirect'));
    }

}
