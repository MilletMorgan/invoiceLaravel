<!doctype html>
<head>
  <!-- ... --->
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
  <title>Invoice</title>
</head>
<div class="grid grid-cols-12 gap-4 bg-red-300 text-white">
  <div class="col-span-8"></div>
  @if (Auth::check())
    <div class="col-span-3 text-right">
      <a class="text-blue-700 hover:text-blue-500 transition" href="/logout">Deconnexion</a>
      |
      <span>{{ Auth::user()->name }}</span>
    </div>
    <div class="col-span-1">
      <img
        class="h-8 w-8 rounded-full object-cover"
        src="{{ Auth::user()->avatar_url }}"
        alt=""
      />
    </div>
  @else
    <div class="col-span-1">
      <a class="text-blue-700 hover:text-blue-500 transition" href="/login/redirect">Connexion avec github</a>
    </div>
  @endif
</div>
