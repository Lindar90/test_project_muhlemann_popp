<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <title>Hello, world!</title>
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Super Duper App</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.import.index') }}">Import</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.search.index') }}">Search</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
      @yield('content')
    </div>
  </div>

  <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>