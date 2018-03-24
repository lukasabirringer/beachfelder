<form action="/search" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="example-text-input">PLZ</label>
      <input class="form-control" type="number" name="postcode" value="{{ $plz }}" id="example-text-input">
    </div>
    <div class="col-md-6 mb-3">
      <label for="example-search-input">Umkreis (km)</label>
      <input class="form-control dtc" type="number" name="distance" value="{{ $distance }}" id="example-search-input">
    </div>
    <div class="col-md-6 mb-3">
      <label for="example-search-input">Rating (min)</label>
      <input class="form-control dtc" name="ratingmin" type="number" value="{{ $ratingmin }}" placeholder="1" id="example-search-input">
    </div>
    <div class="col-md-6 mb-3">
      <label for="example-search-input">Rating (max)</label>
      <input class="form-control dtc" name="ratingmax" type="number" value="{{ $ratingmax }}" placeholder="5" id="example-search-input">
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
