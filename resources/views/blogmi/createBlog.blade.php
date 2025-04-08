@include('blogmi.navigation')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog</title>

    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

</head>
<body>
    <div class="container container-fluid">
        <div>
            <form action="{{ route('storeBlog') }}" method="post" class="row align-items-start">
                @csrf
                <label for="title" class="form-label mt-4">Title</label>
                <input class="form-control" name="title" id="title" placeholder="Title...">
                <label for="content" class="form-label mt-4">Text Editor</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="30"></textarea>
                <button type="submit" class="btn btn-primary">Publish</button>
            </form>
        </div>
    </div>

    <script>
        $('#content').summernote({
            placeholder: 'Write your blog here...',
            tabsize: 2,
            height: 500
        })
    </script>
</body>
</html>
