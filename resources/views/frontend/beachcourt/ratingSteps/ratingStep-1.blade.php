<div class="column column--12">
	<div class="row group-rate" data-group="sandQuality">
		<div class="column column--12">
			<h3 class="-typo-headline-03 -text-color-gray-01">Sand</h3>
			<p class="-typo-copy -text-color-gray-01 -spacing-c">Wie ist die Qualität des Sandes?</p>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field sandQuality" name="sandQuality" value="125">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="sun"></span>
					<span class="input-radio-icon__label">sehr gut</span>
				</div>
			</label>
			<p class="-typo-copy -typo-copy--small -text-color-gray-01 -spacing-c">
					Feinkörniger, gewaschener Sand, gerundete Körner bis 2,0 mm (entspr. DVV Beach1 oder 2)
			</p>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field sandQuality" name="sandQuality" value="62.5">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud"></span>
					<span class="input-radio-icon__label">gut</span>
				</div>
			</label>
			<p class="-typo-copy -typo-copy--small -text-color-gray-01 -spacing-c">
					Feinkörnig bis 2 mm, aber scharfkantig oder nicht gewaschen (hoher Anteil kleinster Partikel)
			</p>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field sandQuality" name="sandQuality" value="0">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
					<span class="input-radio-icon__label">schlecht</span>
				</div>
			</label>
			<p class="-typo-copy -typo-copy--small -text-color-gray-01 -spacing-c">
					Grobe Körner > 2 mm enthalten, scharfkantig
			</p>
			
		</div>
	</div>

	@include('frontend.reusable-includes.divider')

	<div class="row group-rate -spacing-a" data-group="courtTopography">
		<div class="column column--12">
			<p class="-typo-copy -text-color-gray-01">Ist die Spielfläche eben?</p>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="courtTopography" value="56">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="sun"></span>
					<span class="input-radio-icon__label">Ja</span>
				</div>
			</label>
			<p class="-typo-copy -typo-copy--small -text-color-gray-01 -spacing-c">
				Grundfläche eben, Sandfläche gepflegt,  Glätter vor Ort zugänglich
			</p>              
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="courtTopography" value="28">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud"></span>
					<span class="input-radio-icon__label">es geht so</span>
				</div>
			</label>
			<p class="-typo-copy -typo-copy--small -text-color-gray-01 -spacing-c">
				Grundfläche eben, aber zu wenig geglättet, kein Glätter vor Ort
			</p>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="courtTopography" value="0">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
					<span class="input-radio-icon__label">Nein</span>
				</div>
			</label>
			<p class="-typo-copy -typo-copy--small -text-color-gray-01 -spacing-c">
				Grundfläche geneigt oder Sandfläche sehr uneben, kein Glätter
			</p>
		</div>
	</div>

	@include('frontend.reusable-includes.divider')

	<div class="row group-rate -spacing-a" data-group="sandDepth">
		<div class="column column--12">
			<p class="-typo-copy -text-color-gray-01">Wie tief ist der Sand an der flachsten Stelle des Feldes?</p>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="sandDepth" value="112">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="sun"></span>
					<span class="input-radio-icon__label">mehr als 30cm</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="sandDepth" value="56">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud"></span>
					<span class="input-radio-icon__label">20-30cm</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="sandDepth" value="0">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
					<span class="input-radio-icon__label">weniger als 20cm</span>
				</div>
			</label>
		</div>
	</div>

	@include('frontend.reusable-includes.divider')

	<div class="row group-rate -spacing-a" data-group="irrigationSystem">
		<div class="column column--12 ">
			<p class="-typo-copy -text-color-gray-01">Ist ein Staubschutz, wie zum Beispiel eine Bewässerungsanlage vorhanden?</p>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="irrigationSystem" value="56">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="sun"></span>
					<span class="input-radio-icon__label">Keine Staubentwicklung oder Wasseranschluss vorhanden</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="irrigationSystem" value="28">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud"></span>
					<span class="input-radio-icon__label">Leichte Staubentwicklung, kein Wasseranschluss</span>
				</div>
			</label>
		</div>
		<div class="column column--12 column--m-4 -spacing-d">
			<label class="input-radio-icon">
				<input type="radio" class="input-radio-icon__field" name="irrigationSystem" value="0">
				<div class="input-radio-icon__container">
					<span class="input-radio-icon__icon" data-feather="cloud-drizzle"></span>
					<span class="input-radio-icon__label">Starke Staubentwicklung, kein Wasseranschluss</span>
				</div>
			</label>
		</div>
	</div>
</div>