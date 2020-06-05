<html>

<head>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <div class="container">
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" style="width: 1140px ; height: 600px;" src="https://images-na.ssl-images-amazon.com/images/I/41Gb3UOjT5L.jpg"
        alt="Card image cap">
    </div>
    <div class="row row-col-2">
      <div class="col">
        <a href="{{ route('home') }}" class="btn btn-primary btn-lg btn-block">Back to Homepage</a>
      </div>
      <div class="col">
        <a href="{{ route('user.bag') }}" class="btn btn-primary btn-lg btn-block">Back to myBag</a>
      </div>
    </div>
  </div>
</body>

</html>
