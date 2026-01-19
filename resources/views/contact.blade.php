@extends('layout')

@section('content')
<div class="md:col-span-4 flex justify-center items-center">
  <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
    <h1 class="text-3xl font-bold mb-6">Entre em Contato</h1>
    <p class="text-gray-600 mb-8">
      Tem alguma dúvida, sugestão ou problema? Envie uma mensagem e entraremos em contato o mais breve possível.
    </p>

    @session('success')
    <p class="bg-green-600 text-white p-2 rounded mb-4 text-center">{{ $value }}</p>
    @endsession

    <form class="space-y-6 max-w-lg" action="{{ route('contact.store') }}" method="POST">
      @csrf
      <div>
        <label class="block text-sm font-medium mb-1">Your Name</label>
        @error('name')
        <p class="text-red-600 italic">{{$message}}</p>
        @enderror
        <input type="text" value="{{ old('name') }}" name="name" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500" placeholder="Your name">
      </div>

      <div>
        <label class="block text-sm font-medium mb-1">E-mail</label>
        @error('email')
        <p class="text-red-600 italic">{{$message}}</p>
        @enderror
        <input type="text" value="{{ old('email') }}" name="email" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500" placeholder="your@email.com">
      </div>

      <div>
        <label class="block text-sm font-medium mb-1">Message</label>
        @error('message')
        <p class="text-red-600 italic">{{$message}}</p>
        @enderror
        <textarea rows="5" name="message" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500" placeholder="Escreva sua mensagem aqui...">{{ old('message') }}</textarea>
      </div>

      <button type="submit" class="bg-indigo-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-indigo-700 cursor-pointer">
        Enviar mensagem
      </button>
    </form>
  </div>
</div>
@endsection
