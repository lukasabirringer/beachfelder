<div class="column column--12">
	<div class="row group-rate">
		<div class="column column--12 -spacing-b">
			<h3 class="-typo-headline-03 -text-color-gray-01 -spacing-c">Netz</h3>
			<p class="-typo-copy -text-color-gray-01 -spacing-c">Ist die Netzhöhe frei wählbar?</p>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="netHeight" value="112">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="sun"></span>
					<span class="input-radio-icon__label">Ja, man kann alle Höhen von 2m bis 2,43m wählen</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="netHeight" value="56">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud"></span>
					<span class="input-radio-icon__label">Die Höhe stimmt, ist aber nicht verstellbar</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="netHeight" value="0">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
					<span class="input-radio-icon__label">Nein, leider ist die Höhe nicht veränderbar</span>
				</div>
			</label>
		</div>
	</div>

	@include('frontend.reusable-includes.divider')

	<div class="row group-rate -spacing-a">
		<div class="column column--12">
			<p class="-typo-copy -text-color-gray-01">Wie ist die Beschaffenheit des Netzes?</p>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="netType" value="56">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="sun"></span>
					<span class="input-radio-icon__label">Stabiles Beachnetz mit fester Einfassung</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="netType" value="28">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud"></span>
					<span class="input-radio-icon__label">Provisorisches Netz (zum Beispiel Hallen-Netz), Beachnetz mit Mängeln</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="netType" value="0">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
					<span class="input-radio-icon__label">Schnur oder Kettennetz oder Netz fehlt</span>
				</div>
			</label>
		</div>
	</div>

	@include('frontend.reusable-includes.divider')

	<div class="row group-rate -spacing-a">
		<div class="column column--12">
			<p class="-typo-copy -text-color-gray-01">Sind Antennen vorhanden?</p>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="netAntennas" value="28">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="sun"></span>
					<span class="input-radio-icon__label">Ja</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="netAntennas" value="14">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud"></span>
					<span class="input-radio-icon__label">Ja, aber die Befestigung ist mangelhaft</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="netAntennas" value="0">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
					<span class="input-radio-icon__label">Nein</span>
				</div>
			</label>
		</div>
	</div>

	@include('frontend.reusable-includes.divider')

	<div class="row group-rate -spacing-a">
		<div class="column column--12">
			<p class="-typo-copy -text-color-gray-01">Lässt sich das Netz korrekt spannen?</p>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="netTension" value="56">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="sun"></span>
					<span class="input-radio-icon__label">Spannseil und Abspannung intakt</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="netTension" value="28">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud"></span>
					<span class="input-radio-icon__label">Zu wenig Spannung, nicht justierbar</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="netTension" value="0">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
					<span class="input-radio-icon__label">Netz hängt durch, bzw. schwingt stark</span>
				</div>
			</label>
		</div>
	</div>
</div>