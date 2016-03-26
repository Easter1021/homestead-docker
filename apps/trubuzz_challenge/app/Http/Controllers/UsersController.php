<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Session;

class UsersController extends Controller
{

    public function login (Request $request, User $user) {
        Auth::login($user);
        return redirect('users');        
    }

    public function logout (Request $request) {
        Auth::logout();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = User::paginate(15);
        
        if($request->route()->getPrefix() == '/api')
            return response()->json(($request->format)? ['data'=>$users] : $users);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['username' => 'required|unique:users', 'email' => 'required', ]);

        if ($validator->fails()) {
            if($request->route()->getPrefix() == '/api')
                return response()->json(['success'=>false, $validator->errors()->all()]);
            return redirect('users');
        }

        $user = User::create($request->all());

        Session::flash('flash_message', 'User added!');

        if($request->route()->getPrefix() == '/api')
            return response()->json(($request->format)? ['data'=>$user] : $user);
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show(Request $request, User $user)
    {
        if($request->route()->getPrefix() == '/api')
            return response()->json(($request->format)? ['data'=>$user] : $user);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit(Request $request, User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        // $this->validate($request, ['username' => 'required', 'email' => 'required', ]);

        // $user = User::findOrFail($id);
        // $user->update($request->all());

        // Session::flash('flash_message', 'User updated!');

        // return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy(Request $request, User $user)
    {
        // User::destroy($id);

        // Session::flash('flash_message', 'User deleted!');

        // return redirect('users');
    }

}
