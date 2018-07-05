<div class="column column--12 column--m-6">
    @if (Auth::user()->userName === $profileuser->userName)
    <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
        Username
    </p>
    <p class="-typo-copy -text-color-gray-02">
        {{ $user->userName }}
    </p>
    <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
        Vorname
    </p>
    <p class="-typo-copy -text-color-gray-02">
        {{ $user->firstName }}
    </p>
    <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
        Nachname
    </p>
    <p class="-typo-copy -text-color-gray-02">
        {{ $user->lastName }}
    </p>
    <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
        Geburtstag
    </p>
    <p class="-typo-copy -text-color-gray-02">
        {{ $user->birthdate }}
    </p>
    @else
    <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
        Username
    </p>
    <p class="-typo-copy -text-color-gray-02">
        {{ $profileuser->userName }}
    </p>
    <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
        Wohnort
    </p>
    <p class="-typo-copy -text-color-gray-02">
        {{ $profileuser->postalCode }} {{ $profileuser->city }} 

    </p>
    <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
        Geschlecht
    </p>
    <p class="-typo-copy -text-color-gray-02">
        @if ($profileuser->sex == 'male')
            männlich
        @elseif ($profileuser->sex == 'female')
            weiblich
        @else 
            neutral
        @endif
    </p>
    @endif
</div>
@if (Auth::user()->userName === $profileuser->userName)
<div class="column column--12 column--m-6">
    <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
        PLZ
    </p>
    <p class="-typo-copy -text-color-gray-02">
        {{ $user->postalCode }}
    </p>
    <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
        Ort
    </p>
    <p class="-typo-copy -text-color-gray-02">
        {{ $user->city }}
    </p>
    <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
        E-Mail Adresse
    </p>
    <p class="-typo-copy -text-color-gray-02">
        {{ $user->email }}
    </p>
    <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
        Geschlecht
    </p>
    <p class="-typo-copy -text-color-gray-02">
        @if ($user->sex == 'male')
            männlich
        @elseif ($user->sex == 'female')
            weiblich
        @else 
            neutral
        @endif
    </p>
</div>
@endif
