<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Image Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <div class="container d-flex mt-5">
        <div class="card">
            <div class="card-body">
                <form action="/upload-image" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(count($errors)>0)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger show">{{ $error }}</div>
                        @endforeach
                    @endif
                    <input type="file" name="images[]" class="form-control" multiple required> 
                    <button class="btn btn-primary mt-2">Upload</button>
                </form>
            </div>

            @if(session('success_msg'))
                <div class="card-footer">
                    <div class="alert alert-success show">{{ session('success_msg') }}</div>
                    @if(count(session('uploaded_img'))>0)
                        @foreach(session('uploaded_img') as $imageURL)
                            <img src="{{$imageURL}}" height="50px" width="50px">
                        @endforeach
                    @endif
                </div>
            @endif
            
        </div>
    </div>
    
</body>
</html>
