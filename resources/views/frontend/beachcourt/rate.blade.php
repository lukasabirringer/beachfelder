
@extends('layouts.frontend')

@section('title_and_meta')
    <title>Bewerte dieses Feld | beachfelder.de | 🏝 Deine Beachvolleyballfeld-Suchmaschine 🏝</title>
    <meta name="description" content="beachfelder.de ist die Beachvolleyballfeld-Suchmaschine mit der größten und umfangreichsten Datenbank an Feldern. Auf beachfelder.de kannst du deine Felder bewerten, dir Favoriten speichern und uns neue Beachvolleyballfelder vorschlagen." />
@endsection

@section('content')

<div class="content__main">
  <div class="row">
    @if (\Session::has('success'))
      <ul class="notification">
        <li class="notification__item">
          <span class="notification__icon" data-feather="info"></span>
          <p class="notification__text">{!! \Session::get('success') !!}</p>

          <button class="button-secondary notification-button close" data-dismiss="alert" aria-label="close">
            <span class="button-secondary__label notification-button__label">OK</span>
          </button>
        </li>
      </ul>
    @endif
    <div class="column column--xxs-12 column--xs-4 column--s-6 column--m-4">
      @if(is_dir(public_path('uploads/beachcourts/' . $beachcourt->id . '/slider/standard/')))
        <figure class="progressive">
          <img class="progressive__img progressive--not-loaded image image--max-width" data-progressive="{{ url('/') }}/uploads/beachcourts/{{$beachcourt->id}}/slider/retina/slide-image-01-retina.jpg" src="{{ url('/') }}//uploads/beachcourts/{{$beachcourt->id}}/slider/standard/slide-image-01.jpg">
        </figure>
      @else 
        <img class="progressive__img" src="https://maps.googleapis.com/maps/api/staticmap?center={{$beachcourt->latitude}},{{$beachcourt->longitude}}&zoom=19&scale=2&size=347x180&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" data-progressive="https://maps.googleapis.com/maps/api/staticmap?center={{$beachcourt->latitude}},{{$beachcourt->longitude}}&zoom=19&scale=2&size=600x300&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" alt="Beachvolleyballfeld in {{$beachcourt->postalCode}} {{$beachcourt->city}}">
      @endif
    </div>
    <div class="column column--xxs-12 column--xs-8 column--s-6 column--m-8">

      <h2 class="title-page__title">Bewerte das Beachvolleyballfeld</h2>
      <h4 class="title-page__subtitle">
      	in {{ $beachcourt->city }}
      	@if($beachcourt->district)
      		- {{ $beachcourt->district }}
      	@endif
      </h4>

      <div class="row">
        <div class="column column--12 column--m-4">
          <div class="icon-text -spacing-b">
            <span class="icon-text__icon" data-feather="map-pin"></span>
            <span class="icon-text__text">
            	{{ $beachcourt->postalCode }} {{ $beachcourt->city }} <br>
            	{{ $beachcourt->street }} {{ $beachcourt->houseNumber }}
            </span>
          </div>
        </div>
        <div class="column column--12 column--m-4">
          <div class="icon-text -spacing-b">
            <span class="icon-text__icon" data-feather="navigation"></span>
            <span class="icon-text__text">{{ $beachcourt->latitude }}<br>{{ $beachcourt->longitude }}</span>
          </div>
        </div>
        <div class="column column--12 column--m-4">
          <div class="icon-text -spacing-b">
            <span class="icon-text__icon" data-feather="info"></span>
            <span class="icon-text__text">
            	Felder outdoor: {{ $beachcourt->courtCountOutdoor }}<br>
            	Felder indoor: {{ $beachcourt->courtCountIndoor }}</span>
          </div>
        </div>
      </div>
      <p class="-typo-copy -typo-copy--small -text-color-gray-01 -spacing-c">
        Wieder das Feld anschauen? Dann gehe
        <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude,)) }}" class="link-text">zurück</a>
        </a>
      </p>
      
    </div>
  </div>

  @include('frontend.reusable-includes.divider')

  <div class="row">
    <form action="{{ url('/rating/new') }}" method="POST" class="form-rating" id="form-rating" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input type="hidden" value="{{ $beachcourt->id }}" content="text" name="beachcourtname">

      <div class="tab -spacing-a" id="sand">
        <div class="column column--12">
          <div class="row">
            <div class="column column--12">
              <h3 class="-typo-headline-03 -text-color-gray-01">Sand</h3>
              <p class="-typo-copy -text-color-gray-01 -spacing-c">Wie ist die Qualität des Sandes?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="sandQuality" value="125" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">sehr gut</span>
                </div>
              </label>
              <p class="-typo-copy -typo-copy--small -text-color-gray-01 -spacing-c">
              		Feinkörniger, gewaschener Sand, gerundete Körner bis 2,0 mm (entspr. DVV Beach1 oder 2)
              </p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="sandQuality" value="62.5" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">gut</span>
                </div>
              </label>
              <p class="-typo-copy -typo-copy--small -text-color-gray-01 -spacing-c">
              		Feinkörnig bis 2 mm, aber scharfkantig oder nicht gewaschen (hoher Anteil kleinster Partikel)
              </p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="sandQuality" value="0" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">schlecht</span>
                </div>
              </label>
              <p class="-typo-copy -typo-copy--small -text-color-gray-01 -spacing-c">
              		Grobe Körner > 2 mm enthalten, scharfkantig
              </p>
              
            </div>
          </div>

          @include('frontend.reusable-includes.divider')

          <div class="row -spacing-a">
            <div class="column column--12">
              <p class="-typo-copy -text-color-gray-01">Ist die Spielfläche eben?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="courtTopography" value="56" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">Ja</span>
                </div>
              </label>
              <p class="-typo-copy -typo-copy--small -text-color-gray-01 -spacing-c">
              	Grundfläche eben, Sandfläche gepflegt,  Glätter vor Ort zugänglich
              </p>              
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="courtTopography" value="28" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">es geht so</span>
                </div>
              </label>
              <p class="-typo-copy -typo-copy--small -text-color-gray-01 -spacing-c">
              	Grundfläche eben, aber zu wenig geglättet, kein Glätter vor Ort
              </p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="courtTopography" value="0" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Nein</span>
                </div>
              </label>
              <p class="-typo-copy -typo-copy--small -text-color-gray-01 -spacing-c">
              	Grundfläche geneigt oder Sandfläche sehr uneben, kein Glätter
              </p>
            </div>
          </div>

          @include('frontend.reusable-includes.divider')

          <div class="row -spacing-a">
            <div class="column column--12">
              <p class="-typo-copy -text-color-gray-01">Wie tief ist der Sand an der flachsten Stelle des Feldes?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="sandDepth" value="112" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">mehr als 30cm</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="sandDepth" value="56" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">20-30cm</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="sandDepth" value="0" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">weniger als 20cm</span>
                </div>
              </label>
            </div>
          </div>

          @include('frontend.reusable-includes.divider')

          <div class="row -spacing-a">
            <div class="column column--12 ">
              <p class="-typo-copy -text-color-gray-01">Ist ein Staubschutz, wie zum Beispiel eine Bewässerungsanlage vorhanden?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="irrigationSystem" value="56" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">Keine Staubentwicklung oder Wasseranschluss vorhanden</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="irrigationSystem" value="28" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Leichte Staubentwicklung, kein Wasseranschluss</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="irrigationSystem" value="0" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Starke Staubentwicklung, kein Wasseranschluss</span>
                </div>
              </label>
            </div>
          </div>


        </div>
      </div> <!-- .tab #sand ENDE -->

      <div class="tab -spacing-a" id="net">
        <div class="column column--12">
          <div class="row">
            <div class="column column--12 -spacing-b">
              <h3 class="-typo-headline-03 -text-color-gray-01 -spacing-c">Netz</h3>
              <p class="-typo-copy -text-color-gray-01 -spacing-c">Ist die Netzhöhe frei wählbar?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netHeight" value="112" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">Ja, man kann alle Höhen von 2m bis 2,43m wählen</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netHeight" value="56" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Die Höhe stimmt, ist aber nicht verstellbar</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netHeight" value="0" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Nein, leider ist die Höhe nicht veränderbar</span>
                </div>
              </label>
            </div>
          </div>

          @include('frontend.reusable-includes.divider')

          <div class="row -spacing-a">
            <div class="column column--12">
              <p class="-typo-copy -text-color-gray-01">Wie ist die Beschaffenheit des Netzes?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netType" value="56" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">Stabiles Beachnetz mit fester Einfassung</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netType" value="28" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Provisorisches Netz (zum Beispiel Hallen-Netz), Beachnetz mit Mängeln</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netType" value="0" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Schnur oder Kettennetz oder Netz fehlt</span>
                </div>
              </label>
            </div>
          </div>

          @include('frontend.reusable-includes.divider')

          <div class="row -spacing-a">
            <div class="column column--12">
              <p class="-typo-copy -text-color-gray-01">Sind Antennen vorhanden?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netAntennas" value="28" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">Ja</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netAntennas" value="14" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Ja, aber die Befestigung ist mangelhaft</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netAntennas" value="0" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Nein</span>
                </div>
              </label>
            </div>
          </div>

          @include('frontend.reusable-includes.divider')

          <div class="row -spacing-a">
            <div class="column column--12">
              <p class="-typo-copy -text-color-gray-01">Lässt sich das Netz korrekt spannen?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netTension" value="56" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">Spannseil und Abspannung intakt</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netTension" value="28" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Zu wenig Spannung, nicht justierbar</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netTension" value="0" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Netz hängt durch, bzw. schwingt stark</span>
                </div>
              </label>
            </div>
          </div>
        </div>
      </div> <!-- .tab #net ENDE -->

      <div class="tab -spacing-a" id="playground">
        <div class="column column--12">
          <div class="row">
            <div class="column column--12 -spacing-b">
              <h3 class="-typo-headline-03 -text-color-gray-01 -spacing-c">Spielfeld</h3>
              <p class="-typo-copy -text-color-gray-01 -spacing-c">Wie ist die Beschaffenheit der Linien?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="boundaryLines" value="112" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">5 cm breit, im Boden verankert</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="boundaryLines" value="56" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Falsche Breite oder Verankerung lose</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="boundaryLines" value="0" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Keine Linien oder Linien nicht verankert</span>
                </div>
              </label>
            </div>
          </div>

          @include('frontend.reusable-includes.divider')

          <div class="row -spacing-a">
            <div class="column column--12">
              <p class="-typo-copy -text-color-gray-01">Sind die Spielfeldmaße regelkonform?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="fieldDimensions" value="56" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">8 x 16 m +/- 5 cm, rechteckig</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="fieldDimensions" value="28" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Abweichung 5-25 cm oder nicht rechteckig gespannt</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="fieldDimensions" value="0" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Abweichung >25 cm oder geringe Abweichung + nicht rechteckig</span>
                </div>
              </label>
            </div>
          </div>

          @include('frontend.reusable-includes.divider')

          <div class="row -spacing-a">
            <div class="column column--12">
              <p class="-typo-copy -text-color-gray-01">Besteht eine ausreichende Sicherheitszone um das Spielfeld?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="securityZone" value="130" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">3m ringsum oder mehr</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="securityZone" value="65" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">2 - 3m</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="securityZone" value="0" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Unter 2m oder Hindernisse im Auslaufbereich</span>
                </div>
              </label>
            </div>
          </div>
        </div>
      </div> <!-- .tab #playground ENDE -->

      <div class="tab -spacing-a" id="environment">
        <div class="column column--12">
          <div class="row">
            <div class="column column--12 -spacing-b">
              <h3 class="-typo-headline-03 -text-color-gray-01 -spacing-c">Umgebung</h3>
              <p class="-typo-copy -text-color-gray-01 -spacing-c">Wie gut ist das Spielfeld gegen Wind geschützt?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="windProtection" value="56" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">Gut windgeschützt</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="windProtection" value="28" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Windanfällig bei schlechtem Wetter</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="windProtection" value="0" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Eigentlich immer windig, ohne Schutzmaßnahmen</span>
                </div>
              </label>
            </div>
          </div>

          @include('frontend.reusable-includes.divider')

          <div class="row -spacing-a">
            <div class="column column--12">
              <p class="-typo-copy -text-color-gray-01">Beeinträchtigen andere Spielfelder das Spielgeschehen?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="interferenceCourt" value="45" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">Einzelfeld, bzw. Schutz durch Ballfangzaun</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="interferenceCourt" value="22.5" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Maximal 2 Felder nebeneinander ohne Ballfangzaun</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="interferenceCourt" value="0" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Mehrere Felder direkt nebeneinander ohne Ballfangzaung</span>
                </div>
              </label>
            </div>
          </div>
        </div>
      </div> <!-- .tab #environment ENDE -->
      <div class="tab -spacing-a" id="security">
      	<div class="column column--12">
      	  <div class="row">
      	    <div class="column column--12 -spacing-b">
      	      <h3 class="-typo-headline-03 -text-color-gray-01 -spacing-c">Sicherheit</h3>
      	    </div>
      	   </div>
      	   <div class="row">
      	    <div class="column column--12 -spacing-d">
      	    	<p class="-typo-copy -text-color-gray-01 -spacing-c">Ist der Sand auf dem Spielfeld stellenweise weniger als 20 cm tief?</p>
      	    	<label class="input-toggle -spacing-c">
      	    		<input type="hidden" class="input-toggle__hidden" name="securitySandDepth">
      	    		<input type="checkbox" name="securitySandDepth" class="input-toggle__field" value="0">
      	    		<span class="input-toggle__switch"></span>
      	    		<span class="input-toggle__label">Nein</span>
      	    	</label>
      	    </div>
      	   </div>
      	   @include('frontend.reusable-includes.divider')
      	   <div class="row">
      	    <div class="column column--12 -spacing-d">
      	    	<p class="-typo-copy -text-color-gray-01 -spacing-c">Ist der Sand auf dem Court durch Müll, Scherben oder Fäkalien verschmutzt?</p>
      	    	<label class="input-toggle -spacing-c">
      	    		<input type="hidden" class="input-toggle__hidden" name="securityJunk">
      	    		<input type="checkbox" name="securityJunk" class="input-toggle__field" value="0">
      	    		<span class="input-toggle__switch"></span>
      	    		<span class="input-toggle__label">Nein</span>
      	    	</label>
      	    </div>
      	   </div>
      	   @include('frontend.reusable-includes.divider')
      	   <div class="row">
      	    <div class="column column--12 -spacing-d">
      	    	<p class="-typo-copy -text-color-gray-01 -spacing-c">Hat die Pfostenanlage scharfe Kanten oder nicht verkleidete Haken oder Schraubenköpfe?</p>
      	      <label class="input-toggle -spacing-c">
      	      	<input type="hidden" class="input-toggle__hidden" name="securityCutting">
      	      	<input type="checkbox" name="securityCutting" class="input-toggle__field" value="0">
      	      	<span class="input-toggle__switch"></span>
      	      	<span class="input-toggle__label">Nein</span>
      	      </label>
      	    </div>
      	   </div>
      	   @include('frontend.reusable-includes.divider')
      	   <div class="row">
      	    <div class="column column--12 -spacing-d">
      	    	<p class="-typo-copy -text-color-gray-01 -spacing-c">Gibt es Stufen, scharfkantige Bordsteine oder Mauern in der Auslaufzone?</p>
      	      <label class="input-toggle -spacing-c">
      	      	<input type="hidden" class="input-toggle__hidden" name="securityBricks">
      	      	<input type="checkbox" name="securityBricks" class="input-toggle__field" value="0">
      	      	<span class="input-toggle__switch"></span>
      	      	<span class="input-toggle__label">Nein</span>
      	      </label>
      	    </div>
      	   </div>
      	</div>  
      </div> <!-- .tab #security ENDE -->
      @if (Auth::check())
      <div class="column column--12 column--m-6 -spacing-b">
        <button type="button" id="prevBtn" class="button-primary button-primary--dark-gray prevBtn" onclick="nextPrev(-1)">
          <span class="button-primary__label">Schritt zurück</span>
          <span class="button-primary__label button-primary__label--hover">Schritt zurück</span>
        </button>
      </div>
    
      <div class="column column--12 column--m-6 -spacing-b">
        <button type="button" id="nextBtn" class="button-primary nextBtn" onclick="nextPrev(1)">
          <span class="button-primary__label">Schritt weiter</span>
          <span class="button-primary__label button-primary__label--hover">Schritt weiter</span>
        </button>
      </div>
      @else
      	<div class="column column--12 column--m-6 -spacing-b">
      		
      	</div>
      	<div class="column column--12 column--m-6 -spacing-b">
      		<button type="button" id="nextBtn" class="button-primary nextBtn" onclick="nextPrev(1)" disabled="disabled">
      		  <span class="button-primary__label">Schritt weiter</span>
      		  <span class="button-primary__label button-primary__label--hover">Schritt weiter</span>
      		</button>
      		<p class="-typo-copy -text-color-gray-01 -spacing-b">Um ein Feld zu bewerten, musst du dich zuvor als User registrieren und angemeldet sein. <a class="link-text" href="{{ route('register') }}">Registriere dich hier</a> oder <a class="link-text" href="{{ route('login') }}">melde dich an.</a></p>	
      		
      	</div>
      @endif
    </form>
  </div><!-- .row ENDE -->
</div><!-- .content__main ENDE -->
@endsection

@push('scripts')
  <script>
    //TABS
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      // This function will display the specified tab of the form ...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      // ... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "<span class='button-primary__label'>Deine Bewertung abgeben</span> <span class='button-primary__label button-primary__label--hover'>Deine Bewertung abgeben</span>";
      } else {
        document.getElementById("nextBtn").innerHTML = "<span class='button-primary__label'>weiter</span> <span class='button-primary__label button-primary__label--hover'>weiter</span>";
      }
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form... :
      if (currentTab >= x.length) {
        //...the form gets submitted:
        document.getElementById("form-rating").submit();

        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    //hide the notification
    $('.notification-button').click(function() {
      $(this).parent('.notification__item').parent('.notification').hide();
    });

    $(document).ready(function() {
      var checkbox = $('.input-toggle__field');

      if(checkbox.val() == 1) {
        checkbox.attr('checked', true);
        checkbox.parent().find('.input-toggle__label').text('Ja');
      }
    });

    $('.input-toggle__field').click(function() {
      if($(this).is(':checked')) {
        $(this).parent().find('.input-toggle__label').text('Ja');
        $(this).parent().find('.input-toggle__hidden').val(1);
        $(this).val(1);
      } else {
        $(this).parent().find('.input-toggle__label').text('Nein');
        $(this).parent().find('.input-toggle__hidden').val(0);
        $(this).val(0);
      }
    });
  </script>
@endpush
