<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <x-head/>

   <!-- Scripts -->
   <script src="{{ asset('js/backoffice.js') }}" defer></script>

   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">

   <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
</head>
<body>

   <x-navheader/>

   <div id="appBackoffice">
      <main class="py-4">
         @yield('content')
      </main>
   </div>

</body>
</html>
