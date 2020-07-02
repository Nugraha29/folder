<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(10)]);
    }

     /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, User $model)
    {
        $model->create($request->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]
        );

        $update = User::findOrFail($id);
        $update->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password successfully updated.'));
    }

    public function aktivasi(Request $request, $id)
    {
        $aktivasi = User::findOrFail($id);
        $aktivasi->update(['status' => $request->get('aktivasi')]);

        return back()->withStatusPassword(__('Pengguna successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {  

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
