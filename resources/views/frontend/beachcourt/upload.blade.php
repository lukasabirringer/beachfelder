@extends('layouts.frontend')

@section('content')

<div class="content__main">
  <div class="row">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<form id="form1" action="{{ url('/beachvolleyballfeld/upload') }}" method="post" enctype="multipart/form-data">
   {{ csrf_field() }}
  <input type="file" name="photos[]" id="gallery-photo-add" multiple />
  
  <div class="gallery">
   
  </div>
    <input type="hidden" name="beachcourtId" value="{{ $beachcourt->id }}">
   <input type="submit">
   @if ($errors->has('photos'))
      <div class="alert alert-danger">{{ $errors->first('photos', ':message') }}</div>
    @endif
</form>
<button onclick="$('#gallery-photo-add').val(''); $('.gallery').empty();">clear</button>

<script>


$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img height="100">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
</script>
  </div>
</div>

@endsection