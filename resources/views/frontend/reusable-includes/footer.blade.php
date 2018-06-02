<footer class="footer row">
	<div class="column column--12">
		<ul class="footer__navigation">
			@foreach($footerLinks as $footerLink)
			<li class="footer__item"><a href="{{ url('/') }}/page/{{ $footerLink->slug }}" class="footer__link">{{ $footerLink->name }}</a></li>
			@endforeach
			<li class="footer__item"><a href="{{ url('/') }}/page/kontakt" class="footer__link">Kontakt</a></li>
		</ul>
	</div>
	<div class="column column--12">
		<p class="footer__paragraph">© {{ date('Y') }} World of Beachsport GbR</p>
	</div>
</footer>