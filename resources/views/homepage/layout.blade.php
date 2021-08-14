<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              @if(Auth::guard('cus')->check())
              <li class="active">
                  <a href="">{{AUth::guard('cus')->user()->name}}</a>
              </li>
              <li class="active">
                <a href="{{route('homepage.home')}}">Logout</a>
            </li>
            <li class="active">
                <a href="{{route('homepage.login')}}">Login</a>
            </li>
            @endif
              <li class="nav-item active">
              <a class="nav-link" href="{{route('homepage.home')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('homepage.shop')}}">Card
                 ({{$cart->total_quantity}})
                 ({{number_format($cart->total_price)}}) Đ
                </a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"name="key">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a href="{{route('homepage.search')}}">Search</a></button>
          </form>
        </div>
      </nav>
    </div>
 <div class="container">
{{-- cac layout con --}}
@yield('main')
 </div>
 <footer class="bg-light">
    <br>
    <div class="container">
        <div class="row ">
            <div class="col-sm">
                <img src="./image/logo.png" height="30%" width="70%" alt="" />
                <p class="card-text ">E-mail: Foxshop@gmail.com</p>
                <p class="card-text ">Hours: 10:00 - 18:00, Mon - Fri</p>
            </div>
            <div class="col-sm">
                <h5 class="card-subtitle mb-2 text-muted">CONTACT US</h5>
                <p class="card-text "> ADDRESS : 8638 Amarica Stranfod Mailbon Star</p>
                <p class="card-text "> EMAIL : cafenod@gmail.com</p>
                <p>PHONE : +7464 0187 3535 645</p>
                <p> FAX ID : +9 659459 49594</p>
            </div>
            <div class="col-sm">
                <h5 class="card-subtitle mb-2 text-muted">OPENING HOURS</h5>
                <p class="card-text ">Monday 11:00 - 19:00</p>
                <p class="card-text ">Tuesday 12:00 - 19:00</p>
                <p>Wednesday 12:00 - 20:00</p>
                <p>Thursday 13:00 - 18:00</p>
            </div>
            <div class="col-sm">
                <h5 class="card-subtitle mb-2 text-muted">RECENT NEWS</h5>
                <p class="card-text ">Integer Malesuada Odio Ac Magna <br> MARCH 18 - 2021</p>
                <p class="card-text ">Meatball Cupim Tenderloin Spare Ribs Picanha Jowl MARCH 15 - 2021</p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
