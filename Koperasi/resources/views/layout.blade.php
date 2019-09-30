<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">

    <title>Koperasi</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Koperasi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
            <a class="nav-link" href="{{ route('deposits.create') }}">Deposit <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('withdraw') }}">With Draw</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('deposits.index') }}">Mutation</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="card">
          <div class="card-body">
              <div class="container">
                @yield('content')
              </div>
          </div>
      </div>
</body>
</html>