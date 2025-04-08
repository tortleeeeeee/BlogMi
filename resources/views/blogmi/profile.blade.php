@include('blogmi.bootstrap')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
                <a class="nav-link" href="{{ route('blogs') }}">Blogs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('profile') }}">Profile</a>
                <span class="visually-hidden">(current)</span>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>PROFILE</h1>
    </div>
</body>
</html>
