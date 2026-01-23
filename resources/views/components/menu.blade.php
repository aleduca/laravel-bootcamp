<div class="max-w-6xl mx-auto flex justify-between items-center p-4">
  <h1 class="text-2xl font-bold text-indigo-600"><a href="{{ route('home.index') }}">Laravel Bootcamp</a></h1>
  <nav class="flex items-center space-x-6">
    <a href="{{ route('home.index') }}" class="hover:text-indigo-600">Home</a>
    @auth()
    <a href="{{ route('mycourses.index') }}" class="hover:text-indigo-600">My Courses</a>
    @endauth
    <a href="{{ route('courses.index') }}" class="hover:text-indigo-600">Courses</a>
    <a href="{{ route('contact.index') }}" class="hover:text-indigo-600">Contact</a>
    <x-auth />
  </nav>
</div>
