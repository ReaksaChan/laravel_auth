@extends('layout')

@section('contents')
<header class="text-center mb-4">
    <h1>Submit Your Books</h1>
    <p class="text-muted">Fill in the details below</p>
</header>
<form id="bookForm">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
            <label for="code" class="form-label">Book Code</label>
            <input type="text" class="form-control" id="code" placeholder="Enter book code">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
            <label for="title" class="form-label">Book Title</label>
            <input type="text" class="form-control" id="title" placeholder="Enter book title">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Book Image</label>
            <input type="file" class="form-control" id="image">
            <img id="imagePreview" src="#" alt="Image Preview" class="img-fluid mt-2" style="display: none; max-width: 100%; height: auto;">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Book Decription</label>
            <textarea class="form-control" id="content" rows="5" placeholder="Write your article here..."></textarea>
        </div>
        <button type="submit" class="btn btn-info text-white fw-bold" id="submitBook">Submit</button>
    </div>
</form>
@endsection

@section('scripts')
    <script>
        $('#image').on('change', function(event) {
            const reader = new FileReader();
            reader.onload = function() {
                $('#imagePreview').attr('src', reader.result).show().width(300).height(300);
                $('#image').attr('src', reader.result);
            }
            reader.readAsDataURL(event.target.files[0]);
        });

        $(document).ready(() => {
            $('#submitBook').click((e) => {
                e.preventDefault();
                let bookCode = $('#code').val();
                let bookTile = $('#title').val();
                let bookImage = $('#image').attr('src');
                let bookDesc = $('#content').val();

                console.log(bookCode);
                console.log(bookTile);
                console.log(bookImage);

            })
        });
    </script>
@endsection

