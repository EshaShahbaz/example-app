<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
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
        </div>
    </nav>
<div class="container">
    <div class="container">
    <form class="col-9" action=" ">
        <div class="form-group">
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search by name or email" value="{{$search}}">
        </div>
        <button class="btn btn-primary" type="submit">Search</button>
        <a href="{{url('person/view')}}">
        <button class="btn btn-primary" type="submit">Reset</button>
        </a>
    </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>password</th>
                <th>password_confir</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($persons as $person)
            <tr>
                <td>{{$person->name}}</td>
                <td>{{$person->email}}</td>
                <td>{{$person->password}}</td>
                <td>{{$person->password_confir}}</td>
                <td>
                    <a href="{{url('/person/delete')}}/{{$person->person_id}}">
                        <button class="btn btn-danger">Trash</button>
                    </a>
                    <a href="{{url('/person/edit')}}/{{$person->person_id}}">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row ">
    {{$persons->links()}}
</div>

  </body>
</html>