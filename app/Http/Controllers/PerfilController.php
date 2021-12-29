<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User = Auth::user();
        return view('perfil.index', compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $User = Auth::user();
        return view('perfil.edit', compact('User'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        $User = Auth::user();
        $current_user = User::where('id',Auth::user()->id)->first();
       /*  $current_user = Auth::user(); */

        if (Hash::check($request->old_password, $current_user->password)) {
            /* $current_user->update([
                    'password'=>bcrypt($request->new_password) */
        } else {
            return redirect()->back()->with('error', 'La antigua contraseña no coincide .');
        }

        if ($request->new_password != $request->confirm_password) {
            return redirect()->back()->with('errorp', 'La contraseña nueva y confirmada no coinciden.');
        }

        $current_user->password = bcrypt($request->new_password);
        $current_user->save();
        return redirect()->back()->with('success', 'La contraseña fue actualizada.');
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
