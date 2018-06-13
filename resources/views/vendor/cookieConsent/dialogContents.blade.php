<ul class="js-cookie-consent cookie-consent notification notification--light notification--bottom">
	<li class="notification__item">
		<span class="notification__icon notification__icon--light" data-feather="info"></span>
		<p class="cookie-consent__message notification__text notification__text--light">{!! trans('cookieConsent::texts.message') !!}</p>

		<button class="cookie-consent__agree js-cookie-consent-agree button-secondary notification__button">
			<span class="button-secondary__label">{{ trans('cookieConsent::texts.agree') }}</span>
		</button>
	</li>
</ul>
