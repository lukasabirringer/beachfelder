<ul class="js-cookie-consent cookie-consent notification notification--light notification--bottom">
	<li class="notification__item">
		<span class="notification__icon notification__icon--light" data-feather="info"></span>
		<p class="cookie-consent__message notification__text notification__text--light">{!! trans('cookieConsent::texts.message') !!}</p>

		<button class="button-secondary notification__button">
			<span class="js-cookie-consent-agree cookie-consent__agree button-secondary__label">{{ trans('cookieConsent::texts.agree') }}</span>
		</button>
	</li>
</ul>
