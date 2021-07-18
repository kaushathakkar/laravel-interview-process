<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Global Gene Test</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
      <a class="btn btn-primary" href="{{ route('candidates.index')}}" role="button">Candidates</a>
      <a class="btn btn-primary" href="{{ route('openings.index')}}" role="button">Openings</a>
      <a class="btn btn-primary" href="{{ route('interviews.index')}}" role="button">Interview Schedule</a>
      </div>
    </div>
    @yield('main')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>