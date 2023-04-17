{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Import Export Excel & CSV File</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5 text-center">
        <h2 class="mb-4">
            Import Export Excel & CSV File <a href="https://techvblogs.com/blog/laravel-9-import-export-excel-csv-file"
                target="_blank"></a>
        </h2>
        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <button class="btn btn-primary">Import Users</button>
            <a class="btn btn-success" href="{{ route('export-users') }}">Export Users</a>
        </form>
    </div>
</body>

</html> --}}


<!DOCTYPE html>
<html>

<head>
    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>

<body>

    <div class="container">
        <div class="card bg-light mt-3">

            <div class="card-header">
                Excel Sheet Import Export
            </div>
            <div class="card-body">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if (count($errors) > 0)
                        <div class="row">
                            <div class="col-md-8 col-md-offset-1">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }} <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="row">
                            <div class="col-md-8 col-md-offset-1">
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    <h5>{!! Session::get('success') !!}</h5>
                                </div>
                            </div>
                        </div>
                    @endif

                    <input type="file" name="file" class="form-control">
                    <br>
                    {{-- <button class="btn btn-success">Submit</button> --}}
                    <button class="btn btn-primary">Import Users</button>
                    <a class="btn btn-success" href="{{ route('export-users') }}">Export Users</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
