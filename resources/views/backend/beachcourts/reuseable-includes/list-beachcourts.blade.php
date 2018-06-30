<div id="courts">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <label class="input">
                <input class="input__field search" placeholder="Suche" />
                <span class="input__label">Suche</span>
                <span class="input__icon" data-feather="search"></span>
                <div class="input__border"></div>
            </label>
        </div>
    </div>
    
    <table class="table table-striped">
    <thead>
        <tr class="row">
            <th class="column column--12 column--m-2 -typo-copy -typo-copy--bold -text-color-green">ID</th>
            <th class="column column--12 column--m-4 -typo-copy -typo-copy--bold -text-color-green">Ort</th>
            <th class="column column--12 column--m-3 -typo-copy -typo-copy--bold -text-color-green">Koordinaten</th>
            <th class="column column--12 column--m-2 -typo-copy -typo-copy--bold -text-color-green">E-Mail</th>
            <th class="column column--12 column--m-1 -typo-copy -typo-copy--bold -text-color-green">Optionen</th>
        </tr>
    </thead>
    <tbody class="list">
        @foreach ($beachcourts as $beachcourt)
          <tr>
              <td class="column column--12 column--m-2 id -typo-copy -text-color-gray-01">{{ $beachcourt->id }}</td>
              <td class="column column--12 column--m-4 city -typo-copy -text-color-gray-01">{{ $beachcourt->postalCode }} {{ $beachcourt->city }}
                  @if($beachcourt->district !='')
                      - {{ $beachcourt->district }}
                  @endif
                  <br>
                  {{ $beachcourt->street }} {{ $beachcourt->houseNumber }}
              </td>
              <td class="column column--12 column--m-3 rating -typo-copy -text-color-gray-01">{{ $beachcourt->latitude }}, {{ $beachcourt->longitude }} <br> <a class="link-text" href="https://www.google.com/maps/?q={{ $beachcourt->latitude }},{{ $beachcourt->longitude }}" target="_blank">auf Google Maps ansehen</a></td>
              <td class="column column--12 column--m-2 email -typo-copy -text-color-gray-01" style="overflow: hidden; text-overflow: ellipsis;">{{ $beachcourt->operatorContactPersonEmail }}</td>
              <td class="column column--12 column--m-1">
                  <a href="{{ URL::route('backendBeachcourt.show', $beachcourt->id) }}" class="link-icon -text-color-petrol">
                      <span data-feather="search"></span>
                  </a>
                  <a href="{{ URL::route('backendBeachcourt.edit', $beachcourt->id) }}" class="link-icon -text-color-gray-01">
                      <span data-feather="edit"></span>
                  </a>

                  <form action="{{ URL::route('backendBeachcourt.destroy', $beachcourt->id) }}" method="POST" id="form--deleteField">
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <button class="link-icon -text-color-red">
                    	<span data-feather="trash-2"></span>
                    </button>
                  </form>
                  <!-- <a href="#" class="link-icon -text-color-red" onclick="document.getElementById('form--deleteField').submit(); return false;">
                      <span data-feather="trash-2"></span>
                  </a> -->
              </td>
          </tr>
            
        @endforeach
    </tbody>
</table>
    <ul class="pagination"></ul>
</div><!-- #courts ENDE -->


@push('scripts')
    <script>
        // var courtList = new List('courts', {
        //   valueNames: ['id', 'city', 'rating'],
        //   page: 5,
        //   pagination: true
        // });
    </script>
@endpush