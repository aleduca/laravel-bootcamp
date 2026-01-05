@extends('layout')

@section('content')
<div class="md:col-span-4 flex flex-col items-center gap-12">

  <div class="w-full max-w-xl bg-white rounded-2xl shadow-lg p-8 space-y-8">

    <!-- Título -->
    <div class="text-center space-y-2">
      <h2 class="text-4xl font-extrabold tracking-tight text-gray-800">
        Profile:{{ auth()->user()->fullName }}
      </h2>
      <p class="text-gray-500 text-sm">
        Atualize suas informações públicas
      </p>
      <div class="w-16 h-1 bg-indigo-600 mx-auto rounded-full"></div>
    </div>

    <!-- Mensagem de sucesso (exemplo visual) -->
    @session('success-profile')
    <div class="bg-green-600 text-white text-center p-3 rounded-lg text-sm">
      {{ $value }}
    </div>
    @endsession

    <!-- Formulário -->
    <form class="space-y-6" method="post" action="{{ route($isUpdate ? 'profile.update' :'profile.store', $isUpdate ? $profile->id : []) }}">

      @csrf
      @if($isUpdate)
      @method('PUT')
      @endif
      <!-- Linkedin -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
          LinkedIn
        </label>

        <!-- Mensagem de erro (exemplo visual) -->
        @error('linkedin')
        <p class="text-red-600 text-sm italic mb-1">
          {{ $message }}
        </p>
        @enderror

        <input type="text" name="linkedin" placeholder="https://linkedin.com/in/seu-perfil" class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm
                 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('linkedin') ?? $profile?->linkedin }}">
      </div>

      <!-- Bio -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
          Bio
        </label>

        <!-- Mensagem de erro (exemplo visual) -->
        @error('bio')
        <p class="text-red-600 text-sm italic mb-1">
          {{ $message }}
        </p>
        @enderror

        <textarea rows="6" name="bio" placeholder="Conte um pouco sobre você..." class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm resize-none
                 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('bio') ?? $profile?->bio }}</textarea>
      </div>

      <!-- Botão -->
      <div class="pt-4">
        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white
                 font-semibold py-3 rounded-lg shadow-md
                 transition-all duration-200 cursor-pointer">
          {{ $isUpdate ? 'Update Profile' : 'Save Profile' }}
        </button>
      </div>

    </form>

  </div>

  <a href="" id="form-avatar"></a>
  <div class="w-full max-w-xl bg-white rounded-2xl shadow-lg p-8 space-y-8">
    @if($isUpdate)
    @session('success-avatar')
    <div class="bg-green-600 text-white text-center p-3 rounded-lg text-sm">
      {{ $value }}
    </div>
    @endsession
    <form action="{{ route('profile.avatar',$profile->id).'#form-avatar' }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      @method('PUT')

      <!-- Título -->
      <div class="text-center space-y-2">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-800">
          Foto de Perfil
        </h2>

        <p class="text-gray-500 text-sm">
          Atualize sua imagem pública
        </p>

        <div class="w-16 h-1 bg-indigo-600 mx-auto rounded-full"></div>
      </div>

      {{-- Erro --}}
      @error('avatar')
      <p class="text-red-600 text-sm italic text-center">
        {{ $message }}
      </p>
      @enderror

      <!-- Upload -->
      <div class="flex flex-col items-center gap-4">
        <!-- Input -->
        <label class="cursor-pointer">
          <span class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg shadow transition">
            Escolher imagem
          </span>

          <input type="file" name="avatar" accept="image/*" class="hidden">
        </label>

        <p class="text-xs text-gray-400">
          PNG, JPG ou WEBP (máx. 2MB)
        </p>
      </div>

      <!-- Botão -->
      <div class="pt-4">
        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white
             font-semibold py-3 rounded-lg shadow-md
             transition-all duration-200 cursor-pointer">
          Atualizar Foto
        </button>
      </div>

    </form>
    @else
    <div class="bg-gray-300 p-2 rounded border-gray-500 text-center">
      📷 Por favor atualize seu perfil para adicionar uma foto.
    </div>
    @endif
  </div>


</div>
@endsection
