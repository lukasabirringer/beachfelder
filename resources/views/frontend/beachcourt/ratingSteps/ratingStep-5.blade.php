<div class="column column--12">
	<div class="row">
		<div class="column column--12 -spacing-b">
			<h3 class="-typo-headline-03 -text-color-gray-01 -spacing-c">Sicherheit</h3>
		</div>
	 </div>
	 <div class="row">
		<div class="column column--12 -spacing-d">
			<p class="-typo-copy -text-color-gray-01 -spacing-c">Ist der Sand auf dem Spielfeld stellenweise weniger als 20 cm tief?</p>
			<label class="input-toggle -spacing-c">
				<input type="hidden" class="input-toggle__hidden" name="securitySandDepth" value="0">
				<input type="checkbox" name="securitySandDepth" class="input-toggle__field" value="0">
				<span class="input-toggle__switch"></span>
				<span class="input-toggle__label">Nein</span>
			</label>
		</div>
	 </div>
	 @include('frontend.reusable-includes.divider')
	 <div class="row">
		<div class="column column--12 -spacing-d">
			<p class="-typo-copy -text-color-gray-01 -spacing-c">Ist der Sand auf dem Court durch Müll, Scherben oder Fäkalien verschmutzt?</p>
			<label class="input-toggle -spacing-c">
				<input type="hidden" class="input-toggle__hidden" name="securityJunk" value="0">
				<input type="checkbox" name="securityJunk" class="input-toggle__field" value="0">
				<span class="input-toggle__switch"></span>
				<span class="input-toggle__label">Nein</span>
			</label>
		</div>
	 </div>
	 @include('frontend.reusable-includes.divider')
	 <div class="row">
		<div class="column column--12 -spacing-d">
			<p class="-typo-copy -text-color-gray-01 -spacing-c">Hat die Pfostenanlage scharfe Kanten oder nicht verkleidete Haken oder Schraubenköpfe?</p>
			<label class="input-toggle -spacing-c">
				<input type="hidden" class="input-toggle__hidden" name="securityCutting" value="0">
				<input type="checkbox" name="securityCutting" class="input-toggle__field" value="0">
				<span class="input-toggle__switch"></span>
				<span class="input-toggle__label">Nein</span>
			</label>
		</div>
	 </div>
	 @include('frontend.reusable-includes.divider')
	 <div class="row">
		<div class="column column--12 -spacing-d">
			<p class="-typo-copy -text-color-gray-01 -spacing-c">Gibt es Stufen, scharfkantige Bordsteine oder Mauern in der Auslaufzone?</p>
			<label class="input-toggle -spacing-c">
				<input type="hidden" class="input-toggle__hidden" name="securityBricks" value="0">
				<input type="checkbox" name="securityBricks" class="input-toggle__field" value="0">
				<span class="input-toggle__switch"></span>
				<span class="input-toggle__label">Nein</span>
			</label>
		</div>
	 </div>
</div>