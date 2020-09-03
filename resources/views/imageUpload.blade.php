<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">

    <title>Laravel - Image Upload</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="offset-lg-3 col-lg-6">                
                <div class="wrapper">
                    <div class="wrapper-heading">
                        <h2>Laravel - Image upload example</h2>
                    </div>
                    <div class="wrapper-body">
                        <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">                
                                <div class="col-md-12">
                                    <input type="file" name="image">
                                </div>                
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Upload</button>
                                </div>                
                            </div>
                        </form>

                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block"><strong>{{ $message }}</strong></div>
                        <br>
                        <img src="images/{{ Session::get('image') }}" class="img-fluid">
                        @endif
                
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br>
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('public/js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
</body>
</html>