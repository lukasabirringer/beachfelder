<div class="row">
  <div class="column column--12 column--s-6 -spacing-c -hidden--xxs -hidden--xs">
    <div class="row">
      @if ($beachcourt->ratingCount >= 10)
        <div class="column column--12 column--s-6 -spacing-c">
          <p class="-typo-copy -text-color-gray-01 -spacing-b">
            <span class="-typo-copy--bold">Sand</span>
            @for ($i = 1; $i <= 5; $i++)
                <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
            @endfor
          </p>
        </div><!-- .column__6 ENDE -->
        <div class="column column--12 column--s-6 -spacing-c">
          <p class="-typo-copy -text-color-gray-01 -spacing-b">
            <span class="-typo-copy--bold">Netz</span>
            @for ($i = 1; $i <= 5; $i++)
                <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
            @endfor
          </p>
        </div><!-- .column__6 ENDE -->
        <div class="column column--12 column--s-6 -spacing-c">
          <p class="-typo-copy -text-color-gray-01 -spacing-b">
            <span class="-typo-copy--bold">Feld</span>
            @for ($i = 1; $i <= 5; $i++)
                <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
            @endfor
          </p>
        </div><!-- .column__6 ENDE -->
        <div class="column column--12 column--s-6 -spacing-c">
          <p class="-typo-copy -text-color-gray-01 -spacing-b">
            <span class="-typo-copy--bold">Umgebung</span>
            @for ($i = 1; $i <= 5; $i++)
                <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
            @endfor
          </p>
        </div><!-- .column__6 ENDE -->
      @elseif ( $beachcourt->bfdeRating )
        <div class="column column--12 column--s-6 -spacing-c">
          <p class="-typo-copy -text-color-gray-01 -spacing-b">
            <span class="-typo-copy--bold">Sand</span>
            @for ($i = 1; $i <= $beachcourt->bfdeRatingSand; $i++)
                <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
            @endfor
            <?php $starsLeft = 5 - $beachcourt->bfdeRatingSand; ?>
            @if (count($starsLeft) > 0)
              @for ($i = 1; $i <= $starsLeft; $i++)
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
              @endfor
            @endif
          </p>
        </div><!-- .column__6 ENDE -->
        <div class="column column--12 column--s-6 -spacing-c">
          <p class="-typo-copy -text-color-gray-01 -spacing-b">
            <span class="-typo-copy--bold">Netz</span>
            @for ($i = 1; $i <= $beachcourt->bfdeRatingNet; $i++)
                <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
            @endfor
            <?php $starsLeft = 5 - $beachcourt->bfdeRatingNet; ?>
            @if (count($starsLeft) > 0)
              @for ($i = 1; $i <= $starsLeft; $i++)
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
              @endfor
            @endif
          </p>
        </div><!-- .column__6 ENDE -->
        <div class="column column--12 column--s-6 -spacing-c">
          <p class="-typo-copy -text-color-gray-01 -spacing-b">
            <span class="-typo-copy--bold">Feld</span>
            @for ($i = 1; $i <= $beachcourt->bfdeRatingCourt; $i++)
                <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
            @endfor
            <?php $starsLeft = 5 - $beachcourt->bfdeRatingCourt;     ?>
            @if (count($starsLeft) > 0)
              @for ($i = 1; $i <= $starsLeft; $i++)
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
              @endfor
            @endif
          </p>
        </div><!-- .column__6 ENDE -->
        <div class="column column--12 column--s-6 -spacing-c">
          <p class="-typo-copy -text-color-gray-01 -spacing-b">
            <span class="-typo-copy--bold">Umgebung</span>
            @for ($i = 1; $i <= $beachcourt->bfdeRatingEnvironment; $i++)
                <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
            @endfor
            <?php $starsLeft = 5 - $beachcourt->bfdeRatingEnvironment; ?>
            @if (count($starsLeft) > 0)
              @for ($i = 1; $i <= $starsLeft; $i++)
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
              @endfor
            @endif
          </p>
        </div><!-- .column__6 ENDE -->
      @else
        <div class="column column--12 column--s-6 -spacing-c">
          <p class="-typo-copy -text-color-gray-01 -spacing-b">
            <span class="-typo-copy--bold">Sand</span>
            @for ($i = 1; $i <= $beachcourt->ratingSand; $i++)
                <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
            @endfor
            <?php $starsLeft = 5 - $beachcourt->ratingSand; ?>
            @if (count($starsLeft) > 0)
              @for ($i = 1; $i <= $starsLeft; $i++)
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
              @endfor
            @endif
          </p>
        </div><!-- .column__6 ENDE -->
        <div class="column column--12 column--s-6 -spacing-c">
          <p class="-typo-copy -text-color-gray-01 -spacing-b">
            <span class="-typo-copy--bold">Netz</span>
            @for ($i = 1; $i <= $beachcourt->ratingNet; $i++)
                <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
            @endfor
            <?php $starsLeft = 5 - $beachcourt->ratingNet; ?>
            @if (count($starsLeft) > 0)
              @for ($i = 1; $i <= $starsLeft; $i++)
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
              @endfor
            @endif
          </p>
        </div><!-- .column__6 ENDE -->
        <div class="column column--12 column--s-6 -spacing-c">
          <p class="-typo-copy -text-color-gray-01 -spacing-b">
            <span class="-typo-copy--bold">Feld</span>
            @for ($i = 1; $i <= $beachcourt->ratingCourt; $i++)
                <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
            @endfor
            <?php $starsLeft = 5 - $beachcourt->ratingCourt; ?>
            @if (count($starsLeft) > 0)
              @for ($i = 1; $i <= $starsLeft; $i++)
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
              @endfor
            @endif
          </p>
        </div><!-- .column__6 ENDE -->
        <div class="column column--12 column--s-6 -spacing-c">
          <p class="-typo-copy -text-color-gray-01 -spacing-b">
            <span class="-typo-copy--bold">Umgebung</span>
            @for ($i = 1; $i <= $beachcourt->ratingEnvironment; $i++)
                <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
            @endfor
            <?php $starsLeft = 5 - $beachcourt->ratingEnvironment; ?>
            @if (count($starsLeft) > 0)
              @for ($i = 1; $i <= $starsLeft; $i++)
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
              @endfor
            @endif
          </p>
        </div><!-- .column__6 ENDE -->
      @endif
    </div>
  </div>
  <div class="column column--12 column--s-6 -spacing-c -align-right">
    @if ($beachcourt->shortUrl != NULL )
      <p class="-typo-copy -text-color-gray-01 -spacing-b" id="shortLink">
        Zeige dieses Feld deinen Freunden mit Hilfe dieses Links: <br>
        <span class="-typo-copy--bold -text-color-petrol">{{$beachcourt->shortUrl}}</span>
      </p>
    @endif
  </div>
</div><!-- .row ENDE -->