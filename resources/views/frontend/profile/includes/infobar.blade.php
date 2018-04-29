
        <div class="row">
          @if (Auth::user()->userName === $profileuser->userName)
          <div class="column column--12 column--s-6 column--m-4">
            <div class="icon-text -spacing-b">
              <span class="icon-text__icon" data-feather="user"></span>
              <span class="icon-text__text">{{ $user->firstName }} {{ $user->lastName }} <br> {{ $user->birthdate }} </span>
            </div>
          </div>
          @endif

          <div class="column column--12 column--s-6 column--m-4">
            <div class="icon-text -spacing-b">
              <span class="icon-text__icon" data-feather="map-pin"></span>
              <span class="icon-text__text">


                {{ $profileuser->postalCode }}
                <br> {{ $profileuser->city }}

              </span>
            </div>
          </div>

          <div class="column column--12 column--s-6 column--m-4">
            <div class="icon-text -spacing-b">
              <span class="icon-text__icon" data-feather="info"></span>
              <span class="icon-text__text">Favoriten: {{ $countFavorites }}<br>Eingereichte Felder: {{ $countSubmits }}</span>
            </div>
          </div>
        </div>



