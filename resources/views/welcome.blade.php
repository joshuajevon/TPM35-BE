<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Book</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>

    <h1 class="text-center">View Books</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <a href="/create">
        <button class="btn btn-success">
            Create
        </button>
    </a>
    <div class="d-flex flex-row justify-content-center gap-5">
        @foreach ($books as $b)
        <div class="card" style="width: 18rem;">
            <img src="{{asset('/storage/image/'.$b->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Title: {{$b->title}}</h5>
              <p class="card-text">Author: {{$b->author}}</p>
              <p class="card-text">Publication Date: {{$b->publication_date}}</p>
              <p class="card-text">Stock: {{$b->stock}}</p>
              <p class="card-text">Category: {{$b->category->category_name}}</p>
              <a href="{{route('edit', $b->id)}}" class="btn btn-success">Edit</a>

              <form action="{{route('delete', $b->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>

            </div>
          </div>
          @endforeach
        </div>

        <div class="m-5">
            <form action="{{route('sendMail')}}" method="POST">
                @csrf
                <label for="">Message</label>
                <input class="form-control" type="text" name="message" id="">
                <button class="btn btn-success" type="submit">Send</button>
            </form>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
