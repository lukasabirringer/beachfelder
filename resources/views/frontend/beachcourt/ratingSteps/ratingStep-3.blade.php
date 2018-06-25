<div class="column column--12">
	 <div class="row group-rate" data-valide="false">
		<div class="column column--12 -spacing-b">
			<h3 class="-typo-headline-03 -text-color-gray-01 -spacing-c">Spielfeld</h3>
			<p class="-typo-copy -text-color-gray-01 -spacing-c">Wie ist die Beschaffenheit der Linien?</p>
			<div class="group-rate--hint -spacing-b">
				<div class="-typo-copy -text-color-red">Um fortfahren zu können, musst du eine dieser Optionen ausgewählt haben.</div>
			</div>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="boundaryLines" value="112">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="sun"></span>
					<span class="input-radio-icon__label">5 cm breit, im Boden verankert</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="boundaryLines" value="56">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud"></span>
					<span class="input-radio-icon__label">Falsche Breite oder Verankerung lose</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="boundaryLines" value="0">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
					<span class="input-radio-icon__label">Keine Linien oder Linien nicht verankert</span>
				</div>
			</label>
		</div>
	</div>

	@include('frontend.reusable-includes.divider')

	<div class="row group-rate -spacing-a" data-valide="false">
		<div class="column column--12">
			<p class="-typo-copy -text-color-gray-01">Sind die Spielfeldmaße regelkonform?</p>
			<div class="group-rate--hint -spacing-b">
				<div class="-typo-copy -text-color-red">Um fortfahren zu können, musst du eine dieser Optionen ausgewählt haben.</div>
			</div>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="fieldDimensions" value="56">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="sun"></span>
					<span class="input-radio-icon__label">8 x 16 m +/- 5 cm, rechteckig</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="fieldDimensions" value="28">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud"></span>
					<span class="input-radio-icon__label">Abweichung 5-25 cm oder nicht rechteckig gespannt</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="fieldDimensions" value="0">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
					<span class="input-radio-icon__label">Abweichung >25 cm oder geringe Abweichung + nicht rechteckig</span>
				</div>
			</label>
		</div>
	</div>

	@include('frontend.reusable-includes.divider')

	<div class="row group-rate -spacing-a" data-valide="false">
		<div class="column column--12">
			<p class="-typo-copy -text-color-gray-01">Besteht eine ausreichende Sicherheitszone um das Spielfeld?</p>
			<div class="group-rate--hint -spacing-b">
				<div class="-typo-copy -text-color-red">Um fortfahren zu können, musst du eine dieser Optionen ausgewählt haben.</div>
			</div>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="securityZone" value="130">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="sun"></span>
					<span class="input-radio-icon__label">3m ringsum oder mehr</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="securityZone" value="65">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud"></span>
					<span class="input-radio-icon__label">2 - 3m</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="securityZone" value="0">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
					<span class="input-radio-icon__label">Unter 2m oder Hindernisse im Auslaufbereich</span>
				</div>
			</label>
		</div>
	</div>
</div>