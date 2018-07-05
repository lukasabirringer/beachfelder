<div class="column column--12">
	<div class="row group-rate" data-valide="false">
		<div class="column column--12 -spacing-b">
			<h3 class="-typo-headline-03 -text-color-gray-01 -spacing-c">Umgebung</h3>
			<p class="-typo-copy -text-color-gray-01 -spacing-c">Wie gut ist das Spielfeld gegen Wind geschützt?</p>
			<div class="group-rate--hint -spacing-b">
				<div class="-typo-copy -text-color-red">Um fortfahren zu können, musst du eine dieser Optionen ausgewählt haben.</div>
			</div>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="windProtection" value="56">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="sun"></span>
					<span class="input-radio-icon__label">Gut windgeschützt</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="windProtection" value="28">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud"></span>
					<span class="input-radio-icon__label">Windanfällig bei schlechtem Wetter</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="windProtection" value="0">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
					<span class="input-radio-icon__label">Eigentlich immer windig, ohne Schutzmaßnahmen</span>
				</div>
			</label>
		</div>
	</div>

	@include('frontend.reusable-includes.divider')

	<div class="row group-rate -spacing-a" data-valide="false">
		<div class="column column--12">
			<p class="-typo-copy -text-color-gray-01">Beeinträchtigen andere Spielfelder das Spielgeschehen?</p>
			<div class="group-rate--hint -spacing-b">
				<div class="-typo-copy -text-color-red">Um fortfahren zu können, musst du eine dieser Optionen ausgewählt haben.</div>
			</div>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="interferenceCourt" value="45">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="sun"></span>
					<span class="input-radio-icon__label">Einzelfeld, bzw. Schutz durch Ballfangzaun</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="interferenceCourt" value="22.5">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud"></span>
					<span class="input-radio-icon__label">Maximal 2 Felder nebeneinander ohne Ballfangzaun</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="interferenceCourt" value="0">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
					<span class="input-radio-icon__label">Mehrere Felder direkt nebeneinander ohne Ballfangzaun</span>
				</div>
			</label>
		</div>
	</div>
</div>