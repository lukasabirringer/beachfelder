
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
      <figure class="progressive">
        <img class="progressive__img progressive--not-loaded image image--max-width" data-progressive="{{ url('/') }}/uploads/beachcourts/{{$beachcourt->id}}/slider/retina/slide-image-01-retina.jpg" src="{{ url('/') }}//uploads/beachcourts/{{$beachcourt->id}}/slider/standard/slide-image-01.jpg">
      </figure>
    </div>
    <div class="column column--xxs-12 column--xs-8 column--s-6 column--m-8">

      <h2 class="title-page__title">Bewerte das Beachvolleyballfeld</h2>
      <h4 class="title-page__subtitle">in {{ $beachcourt->city }}</h4>

      <div class="row">
        <div class="column column--12 column--m-6">
          <div class="icon-text -spacing-b">
            <span class="icon-text__icon" data-feather="map-pin"></span>
            <span class="icon-text__text">{{ $beachcourt->postalCode }}<br>{{ $beachcourt->city }}</span>
          </div>
        </div>
        <div class="column column--12 column--m-6">
          <div class="icon-text -spacing-b">
            <span class="icon-text__icon" data-feather="navigation"></span>
            <span class="icon-text__text">{{ $beachcourt->latitude }}<br>{{ $beachcourt->longitude }}</span>
          </div>
        </div>
      </div>
      <p class="-typo-copy -typo-copy--small -text-color-gray-01 -spacing-c">
        Nicht das richtige Feld?
        <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude,)) }}" class="link-text">zurück</a>
        </a>
      </p>
    </div>
  </div>

  <div class="row -spacing-a">
    <div class="column column--12">
      <hr class="divider">
    </div>
  </div>

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
                <input type="radio" class="input-radio-icon__field" name="sandQuality" value="10" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">sehr gut</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="sandQuality" value="5" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">gut</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="sandQuality" value="1" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">schlecht</span>
                </div>
              </label>
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12">
              <hr class="divider">
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12">
              <p class="-typo-copy -text-color-gray-01">Ist die Spielfläche eben?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="courtTopography" value="7" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">Ja</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="courtTopography" value="4" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">es geht so</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="courtTopography" value="1" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Nein</span>
                </div>
              </label>
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12">
              <hr class="divider">
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12">
              <p class="-typo-copy -text-color-gray-01">Wie tief ist der Sand an der flachsten Stelle des Feldes?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="sandDepth" value="10" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">mehr als 30cm</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="sandDepth" value="5" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">20-30cm</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="sandDepth" value="1" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">weniger als 20cm</span>
                </div>
              </label>
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12">
              <hr class="divider">
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12 ">
              <p class="-typo-copy -text-color-gray-01">Ist ein Staubschutz, wie zum Beispiel eine Bewässerungsanlage vorhanden?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="irrigationSystem" value="7" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">Keine Staubentwicklung und/oder Wasseranschluss vorhanden</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="irrigationSystem" value="4" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Leichte Staubentwicklung, kein Wasseranschluss</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="irrigationSystem" value="1" required>
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
                <input type="radio" class="input-radio-icon__field" name="netHeight" value="10" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">Ja, man kann alle Höhen von 2m bis 2,43m wählen</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netHeight" value="5" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Die Höhe stimmt, ist aber nicht verstellbar</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netHeight" value="1" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Nein, leider ist die Höhe nicht veränderbar</span>
                </div>
              </label>
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12">
              <hr class="divider">
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12">
              <p class="-typo-copy -text-color-gray-01">Wie ist die Beschaffenheit des Netzes?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netType" value="7" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">Stabiles Beachnetz mit fester Einfassung</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netType" value="4" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Provisorisches Netz (zum Beispiel Hallen-Netz), Beachnetz mit Mängeln</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netType" value="1" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Schnur oder Kettennetz oder Netz fehlt</span>
                </div>
              </label>
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12">
              <hr class="divider">
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12">
              <p class="-typo-copy -text-color-gray-01">Sind Antennen vorhanden?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netAntennas" value="4" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">Ja</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netAntennas" value="2" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Ja, aber die Befestigung ist mangelhaft</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netAntennas" value="1" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Nein</span>
                </div>
              </label>
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12">
              <hr class="divider">
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12">
              <p class="-typo-copy -text-color-gray-01">Lässt sich das Netz korrekt spannen?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netTension" value="7" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">Spannseil und Abspannung intakt</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netTension" value="4" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Zu wenig Spannung, nicht justierbar</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="netTension" value="1" required>
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
                <input type="radio" class="input-radio-icon__field" name="boundaryLines" value="10" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">5 cm breit, im Boden verankert</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="boundaryLines" value="5" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Falsche Breite oder Verankerung lose</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="boundaryLines" value="1" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Keine Linien oder Linien nicht verankert</span>
                </div>
              </label>
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12">
              <hr class="divider">
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12">
              <p class="-typo-copy -text-color-gray-01">Sind die Spielfeldmaße regelkonform?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="fieldDimensions" value="7" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">8 x 16 m +/- 5 cm, rechteckig</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="fieldDimensions" value="4" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Abweichung 5-25 cm oder nicht rechteckig gespannt</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="fieldDimensions" value="1" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Abweichung >25 cm oder geringe Abweichung + nicht rechteckig</span>
                </div>
              </label>
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12">
              <hr class="divider">
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12">
              <p class="-typo-copy -text-color-gray-01">Besteht eine ausreichende Sicherheitszone um das Spielfeld?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="securityZone" value="10" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">3m ringsum oder mehr</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="securityZone" value="5" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">2 - 3m</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="securityZone" value="1" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Unter 2m</span>
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
                <input type="radio" class="input-radio-icon__field" name="windProtection" value="7" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">Gut windgeschützt</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="windProtection" value="4" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Windanfällig bei schlechtem Wetter</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="windProtection" value="1" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Eigentlich immer windig, ohne Schutzmaßnahmen</span>
                </div>
              </label>
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12">
              <hr class="divider">
            </div>
          </div>

          <div class="row -spacing-a">
            <div class="column column--12">
              <p class="-typo-copy -text-color-gray-01">Beeinträchtigen andere Spielfelder das Spielgeschehen?</p>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="interferenceCourt" value="4" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="sun"></span>
                  <span class="input-radio-icon__label">Einzelfeld, bzw. Schutz durch Ballfangzaun</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="interferenceCourt" value="2" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud"></span>
                  <span class="input-radio-icon__label">Maximal 2 Felder nebeneinander ohne Ballfangzaun</span>
                </div>
              </label>
            </div>
            <div class="column column--12 column--m-4 -spacing-d">
              <label class="input-radio-icon">
                <input type="radio" class="input-radio-icon__field" name="interferenceCourt" value="1" required>
                <div class="input-radio-icon__container">
                  <span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
                  <span class="input-radio-icon__label">Mehrere Felder direkt nebeneinander ohne Ballfangzaung</span>
                </div>
              </label>
            </div>
          </div>
        </div>
      </div> <!-- .tab #environment ENDE -->

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
  </script>
@endpush
