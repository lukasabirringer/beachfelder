<div class="accordion">
          <div class="accordion__title-bar" data-tabgroup="first-tab-group">
            @if (Auth::user()->userName === $profileuser->userName)
            <a href="#tab1" class="accordion__title accordion__title--active">Meine Favoriten</a>
            <a href="#tab2" class="accordion__title">Meine eingereichten Felder</a>
            @else
            <a href="#tab1" class="accordion__title accordion__title--active">Favoriten von {{ $profileuser->userName }}</a>
            <a href="#tab2" class="accordion__title">Eingereichte Felder von {{ $profileuser->userName }}</a>
            @endif
          </div>
          <div id="first-tab-group">
            <div id="tab1" class="accordion__content">
              <ul class="list-beachcourt">
                @forelse ($myFavorites as $myFavorite)
                  <li class="list-beachcourt__item">
                    <div class="list-beachcourt__image">
                      <figure class="progressive">
                        @if(is_dir(public_path('uploads/beachcourts/' . $myFavorite->id . '/slider/standard/')))
                          <img class="progressive__img progressive--not-loaded image image--max-width" data-progressive="{{ url('/') }}/uploads/beachcourts/{{$myFavorite->id}}/slider/retina/slide-image-01-retina.jpg" src="{{ url('') }}/uploads/beachcourts/{{$myFavorite->id}}/slider/retina/slide-image-01-retina.jpg" alt="Feld in {{ $myFavorite->city }}" alt="Feld in {{ $myFavorite->city }}">
                        @else
                          <img class="progressive__img progressive--not-loaded" src="https://maps.googleapis.com/maps/api/staticmap?center={{$myFavorite->latitude}},{{$myFavorite->longitude}}&zoom=19&scale=2&size=347x180&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" data-progressive="https://maps.googleapis.com/maps/api/staticmap?center={{$myFavorite->latitude}},{{$myFavorite->longitude}}&zoom=19&scale=2&size=212x150&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" alt="Beachvolleyballfeld in {{$myFavorite->postalCode}} {{$myFavorite->city}}">
                        @endif
                      </figure>
                    </div>
                    <div class="list-beachcourt__info">
                      <div class="row">
                        <div class="column column--12">
                          <h4 class="-typo-headline-04 -text-color-gray-01">Feld in {{ $myFavorite->city }}
                            @if ($myFavorite->district != '') 
                              - {{ $myFavorite->district }}
                            @endif
                          </h4>
                        </div>
                      </div>

                      <div class="row  -spacing-b">
                        <div class="column column--12 column--m-6">
                          <div class="icon-text">
                            <span class="icon-text__icon" data-feather="map-pin"></span>
                            <span class="icon-text__text">{{ $myFavorite->postalCode }} {{ $myFavorite->city }} <br>{{ $myFavorite->street }} {{ $myFavorite->houseNumber }}</span>
                          </div>
                        </div>

                        <div class="column column--12 column--m-6">
                          <div class="icon-text">
                            <span class="icon-text__icon" data-feather="navigation"></span>
                            <span class="icon-text__text">{{ $myFavorite->longitude }}<br>{{ $myFavorite->latitude }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="row -spacing-b">
                        <div class="column column--12 column--m-6">
                          <div class="icon-text">
                            <span class="icon-text__icon" data-feather="info"></span>
                            <span class="icon-text__text">Felder outdoor: {{ $myFavorite->courtCountOutdoor }}<br>Felder indoor: {{ $myFavorite->courtCountIndoor }}</span>
                          </div>
                        </div>

                        <div class="column column--12 column--s-6">
                          <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($myFavorite->city),'latitude'=>$myFavorite->latitude,'longitude'=>$myFavorite->longitude)) }}" class="button-primary">
                            <span class="button-primary__label">Feld ansehen</span>
                            <span class="button-primary__label button-primary__label--hover">Feld ansehen</span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <form action="{{ url('unfavorite/'.$myFavorite->id) }}" method="POST" id="form--delete-favorite">
                      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                      <a href="javascript:;" class="link-icon link-icon--shake list-beachcourt__icon" onclick="document.getElementById('form--delete-favorite').submit();">
                        <span data-feather="trash-2"></span>
                      </a>
                    </form>
                  </li>
                @empty
                  @if (Auth::user()->userName === $profileuser->userName)
                  <p class="-typo-copy -typo-copy--bold -text-color-gray-01">Du hast noch keine Beachvolleyballfelder in deinen Favoriten.</p>
                  <p class="-typo-copy -text-color-green"><a href="{{ url('/') }}/search" class="link-text">Jetzt Feld hinzufügen</a></p>
                  @else
                  <p class="-typo-copy -typo-copy--bold -text-color-gray-01">{{ $profileuser->userName }} hat noch keine Beachvolleyballfelder in seinen Favoriten.</p>
                  @endif
                @endforelse
              </ul>
            </div>
            <div id="tab2" class="accordion__content">
              @forelse ($submittedCourts as $submittedCourt)
              <li class="list-beachcourt__item">
                    <div class="list-beachcourt__image">
                      @if ($submittedCourt->submitState === 'approved')
                        <figure class="progressive">
                          <img class="progressive__img progressive--not-loaded image image--max-width" data-progressive="{{ url('/') }}/uploads/beachcourts/{{$submittedCourt->id}}/slider/slide-image-01-retina.jpg" src="{{ url('') }}/uploads/beachcourts/{{$submittedCourt->id}}/slider/slide-image-01.jpg" alt="Feld in {{ $submittedCourt->city }}">
                        </figure>
                      @else
                        <figure class="progressive">
                          <img class="progressive__img progressive--not-loaded image image--max-width" data-progressive="{{ url('') }}/uploads/beachcourts/dummy-image-submitted-retina.jpg" src="{{ url('') }}/uploads/beachcourts/dummy-image-submitted.jpg">
                        </figure>
                      @endif
                    </div>
                    <div class="list-beachcourt__info">
                      <div class="row">
                        <div class="column column--12">
                          <h4 class="-typo-headline-04 -text-color-gray-01">Feld in {{ $submittedCourt->city }}
                            @if ($submittedCourt->district != '') 
                              - {{ $submittedCourt->district }}
                            @endif
                          </h4>
                        </div>
                      </div>

                      <div class="row -spacing-b">
                        <div class="column column--12 column--m-6">
                          <div class="icon-text">
                            <span class="icon-text__icon" data-feather="map-pin"></span>
                            <span class="icon-text__text">{{ $submittedCourt->postalCode }} {{ $submittedCourt->city }} <br>{{ $submittedCourt->street }} {{ $submittedCourt->houseNumber }}</span>
                          </div>
                        </div>

                        <div class="column column--12 column--m-6">
                          <div class="icon-text">
                            <span class="icon-text__icon" data-feather="navigation"></span>
                            <span class="icon-text__text">{{ $submittedCourt->longitude }}<br>{{ $submittedCourt->latitude }}</span>
                          </div>
                        </div>

                      </div>
                      <div class="row -spacing-b">
                        <div class="column column--12 column--m-6">
                          @if($submittedCourt->submitState === 'approved')
                            <span class="icon-text__icon" data-feather="check-circle"></span>
                            <span class="icon-text__text">Einreichungsstatus:<br>genehmigt</span>
                          @else
                            <span class="icon-text__icon" data-feather="clock"></span>
                            <span class="icon-text__text">Einreichungsstatus:<br>in Überprüfung</span>
                          @endif
                        </div>

                        @if ($submittedCourt->submitState === 'approved')
                          <div class="column column--12 column--m-6">
                            <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($submittedCourt->city),'latitude'=>$submittedCourt->latitude,'longitude'=>$submittedCourt->longitude)) }}" class="button-primary">
                              <span class="button-primary__label">Feld ansehen</span>
                              <span class="button-primary__label button-primary__label--hover">Feld ansehen</span>
                            </a>
                          </div>
                        @endif
                      </div>
                    </div>
                  </li>
              @empty
                @if (Auth::user()->userName === $profileuser->userName)
              <p class="-typo-copy -typo-copy--bold -text-color-gray-01">Du hast noch keine Beachvolleyballfelder eingereicht.</p>
              <p class="-typo-copy -text-color-green"><a href="{{ URL::route('beachcourtsubmit.submit') }}" class="link-text">Jetzt Feld einreichen</a></p>
                @else
                <p class="-typo-copy -typo-copy--bold -text-color-gray-01">{{ $profileuser->userName }} hat noch keine Beachvolleyballfelder eingereicht.</p>
                @endif
              @endforelse
            </div>
          </div>
        </div>
