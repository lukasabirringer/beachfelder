<div class="sidebar-filter">
	<span class="sidebar-filter__icon icon--close" data-feather="x-circle"></span>
	<h3 class="sidebar-filter__title -typo-headline-04 -text-color-green">Mehr Filter</h3>
	<div class="sidebar-filter__option -spacing-c">
		<p class="-typo-copy -text-color-gray-01 -typo-copy--bold">Indoor oder Outdoor?</p>
		<label class="input-radio -spacing-d">
			<input type="radio" class="input-radio__field" name="outin" value="indoor" {{ $outin == 'indoor' ? 'checked' : '' }}>
			<span class="input-radio__label">nur Indoor-Felder</span>
		</label>

		<label class="input-radio -spacing-b">
			<input type="radio" class="input-radio__field" name="outin" value="outdoor" {{ $outin == 'outdoor' ? 'checked' : '' }}>
			<span class="input-radio__label">nur Outdoor-Felder</span>
		</label>

		<label class="input-radio -spacing-b">
			<input type="radio" class="input-radio__field" name="outin" value="egal" {{ $outin == 'egal' ? 'checked' : '' }}>
			<span class="input-radio__label">Alle Felder</span>
		</label>
	</div>

	<div class="sidebar-filter__option -spacing-a">
		<p class="-typo-copy -text-color-gray-01 -typo-copy--bold">Zugang</p>
		<label class="input-radio -spacing-d">
			<input type="radio" class="input-radio__field" name="access" value="yes" {{ $access == 'yes' ? 'checked' : '' }}>
			<span class="input-radio__label">nur öffentliche Felder</span>
		</label>

		<label class="input-radio -spacing-b">
			<input type="radio" class="input-radio__field" name="access" value="no" {{ $access == 'no' ? 'checked' : '' }}>
			<span class="input-radio__label">nur nicht öffentliche Felder</span>
		</label>

		<label class="input-radio -spacing-b">
			<input type="radio" class="input-radio__field" name="access" value="egal" {{ $access == 'egal' ? 'checked' : '' }}>
			<span class="input-radio__label">Alle Felder</span>
		</label>
	</div>

	<div class="sidebar-filter__option -spacing-a">
		<p class="-typo-copy -text-color-gray-01 -typo-copy--bold">Kosten</p>
		<label class="input-radio -spacing-d">
			<input type="radio" class="input-radio__field" name="cost" value="kostenlos" {{ $cost == 'kostenlos' ? 'checked' : '' }}>
			<span class="input-radio__label">nur kostenlose Felder</span>
		</label>

		<label class="input-radio -spacing-b">
			<input type="radio" class="input-radio__field" name="cost" value="einmaligeGebühr" {{ $cost == 'einmaligeGebühr' ? 'checked' : '' }}>
			<span class="input-radio__label">nur einmalige Zutritts-Gebühr</span>
		</label>

		<label class="input-radio -spacing-b">
			<input type="radio" class="input-radio__field" name="cost" value="zeitabhaengigeGebühr" {{ $cost == 'zeitabhaengigeGebühr' ? 'checked' : '' }}>
			<span class="input-radio__label">nur zeitabhängige Gebühr</span>
		</label>

		<label class="input-radio -spacing-b">
			<input type="radio" class="input-radio__field" name="cost" value="dauerhafteMitgliedschaft" {{ $cost == 'dauerhafteMitgliedschaft' ? 'checked' : '' }}>
			<span class="input-radio__label">nur dauerhafte Mitgliedschaft</span>
		</label>

		<label class="input-radio -spacing-b">
			<input type="radio" class="input-radio__field" name="cost" value="egal" {{ $cost == 'egal' ? 'checked' : '' }}>
			<span class="input-radio__label">Alle Felder</span>
		</label>
	</div>

	<div class="sidebar-filter__option -spacing-a">
		<p class="-typo-copy -text-color-gray-01 -typo-copy--bold">Beach &amp; Swim</p>
		<label class="input-radio -spacing-d">
			<input type="radio" class="input-radio__field" name="swimmingLake" value="swimmingLake" {{ $swimmingLake == 'swimmingLake' ? 'checked' : '' }}>
			<span class="input-radio__label">nur Felder an einem See oder in einem Freibad</span>
		</label>

		<label class="input-radio -spacing-b">
			<input type="radio" class="input-radio__field" name="cost" value="egal" {{ $cost == 'egal' ? 'checked' : '' }}>
			<span class="input-radio__label">Alle Felder</span>
		</label>
	</div>

	<div class="sidebar-filter__option -spacing-a">
		<p class="-typo-copy -text-color-gray-01 -typo-copy--bold button__reset">Filter zurücksetzen</p>
	</div>
</div>