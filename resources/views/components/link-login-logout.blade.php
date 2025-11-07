@auth
<a href="{{ route('login.destroy') }}" class="hover:text-indigo-600">Logout</a>
@else
<a href="{{ route('login.index') }}" class="hover:text-indigo-600">Login</a>
@endauth