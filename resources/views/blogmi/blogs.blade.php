@include('blogmi.bootstrap')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
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
                <a class="nav-link" href="{{ route('index') }}">Homepage
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('blogs') }}">Blogs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                <span class="visually-hidden">(current)</span>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <div class="container mt-4">

        <div class="mb-2">
            <form action="{{ route('blogs') }}" method="GET" class="d-flex">
                <input class="form-control me-sm-2" name="searchTitle" type="search" placeholder="Search title">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

        <table class="table table-hover">
            <thead>
              <tr class="table-primary">
                <th scope="row">Title</th>
                <th scope="row">Status</th>
                <th scope="row">Creation Date</th>
                <th scope="row" class="col-3">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($blogs as $blog)
                <tr class="table-light">
                    <td scope="row">{{ $blog->title }}</td>
                    <td scope="row">{{ $blog->status }}</td>
                    <td scope="row">{{ $blog->created_at }}</td>
                    <td scope="row"class="col-3">
                        <a href="{{ route('displayBlog', $blog->id) }}" class="btn btn-info">Display</a>
                        <a href="{{ route('editBlog', $blog->id) }}" class="btn btn-secondary">Edit</a>
                        <a href="{{ route('deleteBlog', $blog->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>

    </div>
</body>
</html>
