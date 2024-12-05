{{-- <h2>Welcome to laravel </h2> --}}

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
  
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Laravel</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                  <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{url('/')}}/person/create">Register persons</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{url('/')}}/person/view">Persons</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}/person/trash">Trash Persons</a>
            </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownId">
                      <a class="dropdown-item" href="#">Action 1</a>
                      <a class="dropdown-item" href="#">Action 2</a>
                  </div>
              </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
      </div>
  </nav>
<form action="{{$url}}" method="post">
  @csrf
  <div class="container">
    <h1 class="text-center"> 
      {{$title}}
    </h1>
    <div class="form-group">
      <label for="">Name</label>
                                                    {{-- "{{$person->name}}" --}}
      <input type="text" class="form-control-file" value="{{old('name')}}" name="name">
       <span class="text-danger">
        @error('name')
           {{$message}}
        @enderror
       </span>
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="text" class="form-control-file" value="{{old('email')}}" name="email">
      <span class="text-danger">
        @error('email')
           {{$message}}
        @enderror
       </span>
    </div>
    <div class="form-group">
      <label for="">Password</label>
      <input type="password" class="form-control-file" name="password">
      <span class="text-danger">
        @error('password')
           {{$message}}
        @enderror
       </span>
    </div>
    <div class="form-group">
      <label for="">Confirm Password</label>
      <input type="password" class="form-control-file" name="password_confir">
      <span class="text-danger">
        @error('password_confir')
           {{$message}}
        @enderror
       </span>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</body>
</html>

