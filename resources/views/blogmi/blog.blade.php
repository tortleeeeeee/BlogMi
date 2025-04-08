@include('blogmi.navigation')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG</title>
</head>
<body>
    <div class="container">
    <h1>{{ $blog->title }}</h1>
        <div>
            {!! $blog->content !!}
        </div>
    </div>
</body>
</html>
