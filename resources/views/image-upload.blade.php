<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel 8 S3 Image Upload tutorial example - XpertPhp</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <form action="{{ route('upload.post.image') }}" method="POST" id="uploadForm" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="file" name="image[]"  multiple class="form-control">
            </div>

            <div class="col-md-6">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </div>
    </form>
    <script>
        let form = document.getElementById('uploadForm');
        let request = new XMLHttpRequest();
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(form);
            request.open('post', '/image-upload' );
            request.send(formData);
        })
    </script>
</div>
</body>
</html>
