<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogMi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.5/dist/flatly/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
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
                <a class="nav-link" href="{{ route('profile') }}">Profile</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
</body>
</html>
