<html>

<head>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style media="screen">
    body {
      background-image: url('/storage/users/thankyou.jpeg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      margin: 0;
      padding: 0;
    }

    #main {
        background-color: rgba(0, 0, 15, 0.8);
        position: relative;
        height: 100vh;
        padding-top: 0;
    }

    #main .content-wrap {
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        left: 50%;
    }
</style>
</head>

<body>

  <div id="main">
      <div class="content-wrap text-center text-white">
          <h1 class="display-2 mb-3">Thank You!!!</h1>
          <h3 class="my-3">
              <em>thank you for buying our product. You coupon is on your bag, check it now!</em>
          </h3>
          <a class="btn btn-primary mt-3" href="{{ route('user.bag') }}">Go To My Bag</a>
      </div>
  </div>

</body>

</html>
