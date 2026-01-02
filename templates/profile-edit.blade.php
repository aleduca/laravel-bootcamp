@extends('layout')

@section('content')
<div class="md:col-span-4 flex flex-col items-center gap-12">

  <div class="w-full max-w-xl bg-white rounded-2xl shadow-lg p-8 space-y-8">

    <!-- Título -->
    <div class="text-center space-y-2">
      <h2 class="text-4xl font-extrabold tracking-tight text-gray-800">
        Perfil do Usuário
      </h2>
      <p class="text-gray-500 text-sm">
        Atualize suas informações públicas
      </p>
      <div class="w-16 h-1 bg-indigo-600 mx-auto rounded-full"></div>
    </div>

    <!-- Mensagem de sucesso (exemplo visual) -->
    <div class="bg-green-600 text-white text-center p-3 rounded-lg text-sm">
      Perfil atualizado com sucesso!
    </div>

    <!-- Formulário -->
    <form class="space-y-6">

      <!-- Linkedin -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
          LinkedIn
        </label>

        <!-- Mensagem de erro (exemplo visual) -->
        <p class="text-red-600 text-sm italic mb-1">
          Exemplo de mensagem de erro
        </p>

        <input type="text" placeholder="https://linkedin.com/in/seu-perfil" class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm
                 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <!-- Bio -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
          Bio
        </label>

        <!-- Mensagem de erro (exemplo visual) -->
        <p class="text-red-600 text-sm italic mb-1">
          Exemplo de mensagem de erro
        </p>

        <textarea rows="6" placeholder="Conte um pouco sobre você..." class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm resize-none
                 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
      </div>

      <!-- Botão -->
      <div class="pt-4">
        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white
                 font-semibold py-3 rounded-lg shadow-md
                 transition-all duration-200 cursor-pointer">
          Salvar Perfil
        </button>
      </div>

    </form>

  </div>

</div>
@endsection
