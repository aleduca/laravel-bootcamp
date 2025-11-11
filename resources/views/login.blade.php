@extends('layout')

@section('content')
<div class="md:col-span-3 flex justify-center items-center">
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
    @guest
      <h1 class="text-3xl font-bold text-center mb-6">Entrar na sua conta</h1>
{{--
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-600 italic">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

     @if (session()->has('error'))
        <div class="bg-red-600 text-white text-center italic p-2 rounded text-sm mb-2">{{ session()->get('error') }}</div>
    @endif

    {{-- @if ($errors->has('error'))
        <div class="bg-red-600 text-white text-center italic p-2 rounded text-sm mb-2">{{ $errors->first('error') }}</div>
    @endif --}}

      <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
        @csrf
        <!-- E-mail -->
        <div class="mb-2">
          <label for="email" class="block text-sm font-medium mb-1">E-mail</label>
          <input
            id="email"
            name="email"
            type="email"
            value="{{ old('email') }}"
            autofocus
            class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500"
            placeholder="seu@email.com"
          >
          @error('email') <span class="text-red-600 italic text-center">{{ $message }}</span> @enderror
        </div>

        <!-- Senha -->
        <div class="mb-2">
          <label for="password" class="block text-sm font-medium mb-1">Senha</label>
          <input
            id="password"
            name="password"
            type="password"
            class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500"
            placeholder="••••••••"
          >
          @error('password') <span class="text-red-600 italic text-center">{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
          <label for="password_confirmation" class="block text-sm font-medium mb-1">Confirmar Senha</label>
          <input
            id="password_confirmation"
            name="password_confirmation"
            type="password"
            class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500"
            placeholder="••••••••"
          >
          @error('password_confirmation') <span class="text-red-600 italic text-center">{{ $message }}</span> @enderror

        </div>

        <!-- Lembrar login -->
        <div class="flex items-center justify-between">
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="remember" class="text-indigo-600 rounded">
            <span class="text-sm text-gray-600">Lembrar-me</span>
          </label>
          <a href="#" class="text-sm text-indigo-600 hover:underline">
            Esqueci minha senha
          </a>
        </div>

        <!-- Botão -->
        <button
          type="submit"
          class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors mt-1 cursor-pointer"
        >
          Entrar
        </button>
      </form>

      <!-- Cadastro -->
      <p class="text-sm text-center text-gray-600 mt-6">
        Ainda não tem conta?
        <a href="#" class="text-indigo-600 hover:underline font-medium">
          Cadastre-se
        </a>
      </p>
    @else
      <div class="bg-green-600 text-white text-sm text-center p-2 rounded">Você está logado</div>
    @endguest
    </div>
  </div>
@endsection