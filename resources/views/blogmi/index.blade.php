@include('blogmi.bootstrap')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMEPAGE</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container container-fluid">
          <a class="navbar-brand" href="{{ route('index') }}">BlogMi</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('index') }}">Homepage
                  <span class="visually-hidden">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('blogs') }}">Blogs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">Profile</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <div class="w-100" style="background-color: red; height: 500px">
        <img class="img-fluid w-100 h-100" src="{{ asset('storage/images/blog-cropped.jpeg') }}"/>
    </div>

    <div class="container mt-4 mb-4">
        <div class="d-flex">
            <a href="{{ route('createBlog') }}" class="btn btn-warning mb-2 ms-auto">Create Blog</a>
        </div>

        <div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($blogs as $blog)
                  <div class="col">
                    <div class="card h-100">
                      <img src="{{ asset('storage/images/blog-cropped.jpeg') }}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text">{{ $blog->subtitle}}</p>
                      </div>
                      <div class="card-footer d-flex">
                          <a href="{{ route('displayBlog', $blog->id) }}" class="btn btn-info">Display</a>
                          <a href="{{ route('editBlog', $blog->id) }}"class="btn btn-secondary">Edit</a>
                          <a href="{{ route('deleteBlog', $blog->id) }}" class="btn btn-danger">Delete</a>
                      </div>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
    </div>

</body>
</html>
