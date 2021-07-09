@include('layouts.app')

<h1>Bienvenue</h1>

@if (Auth::check())
  <a class="text-blue-700 hover:text-blue-500 transition" href="{{route('organisations.index')}}">Accéder aux organisations</a>
@endif
