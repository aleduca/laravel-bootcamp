<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('login', [
      'title' => 'Login'
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * @param Request $request
   */
  public function store(LoginRequest $request)
  {
    if (Auth::attempt($request->safe()->only(['email', 'password']))) {
      $request->session()->regenerate();

      return back()->with('success', 'Logado com sucesso');
    }

    return back()->with([
      'error' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
