@extends('layouts.backend')

@section('content')
	<div class="content__main">
		<div class="row">
			<div class="column column--12">
				<hr class="divider">
			</div>
		</div>
		<div class="row">
			<div class="column column--12">
				<p class="-typo-copy -text-color-gray-01"><a class="link-icon-text" href="{{ URL::previous() }}"><span class="link-icon-text__icon" data-feather="chevron-left"></span><span class="link-icon-text__text">Zurück zur Übersicht</span></a></p>
			</div>
		</div>
		<div class="row">
			<div class="column column--12">
				<hr class="divider">
			</div>
		</div>
		<div class="row">
			<div class="column column--12">
				<h1 class="title-page__title">FAQ "{{ $faq->title }}" bearbeiten</h1>
				<p class="-typo-copy -text-color-gray-01">Letztes Update: {{ $faq->updated_at }}</p>
			</div>
		</div>

		<div class="row">
			<div class="column column--12 -spacing-a">
				<hr class="divider">
			</div>
		</div>
		<form class="form-horizontal" action="{{ URL::route('backendFaq.update', $faq->id) }}" method="POST">
			<input type="hidden" name="_method" value="PATCH">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="column column--12 column--m-6 -spacing-b">
					<label class="input">
						<input type="text" class="input__field" placeholder="Frage" name="title" value="{{ $faq->title }}">
						<span class="input__label">Frage</span>
						<div class="input__border"></div>
					</label>
					@if ($errors->has('title'))
						<div class="alert alert-danger">{{ $errors->first('title', ':message') }}</div>
					@endif
				</div>
				<div class="column column--12 column--m-6"></div>
			</div>
			<div class="row">
				<div class="column column--12 -spacing-b">
					<label class="textarea">
						<textarea class="textarea__field content" name="content">{{ $faq->content }}</textarea>
						<span class="textarea__label">Antwort</span>
					</label>
					@if ($errors->has('content'))
						<div class="alert alert-danger">{{ $errors->first('content', ':message') }}</div>
					@endif
				</div>
			</div>
			
			<div class="row">
				<div class="column column--12 column--m-6 -spacing-b">
					<p class="-typo-copy -text-color-gray-01">Soll die Frage veröffentlicht werden?</p>
					<label class="input-radio">
						<input type="radio" name="isPublic" class="input-radio__field" value="1" {{ $faq->isPublic == '1' ? 'checked' : '' }}>
						<span class="input-radio__label">Ja</span>
					</label>
					<br>
					<label class="input-radio">
						<input type="radio" name="isPublic" class="input-radio__field" value="0" {{ $faq->isPublic == '0' ? 'checked' : '' }}>
						<span class="input-radio__label">nein</span>
					</label>
				</div>
				<div class="column column--12 column--m-6 -spacing-b">
					<button class="button-primary" type="submit">
						<span class="button-primary__label">Speichern</span>
						<span class="button-primary__label button-primary__label--hover">Speichern</span>
					</button>
				</div>
			</div>
		</form>

		<div class="row">
			<div class="column column--12 -spacing-a">
				<hr class="divider">
			</div>
		</div>
		<div class="row">
			<div class="column column--12">
				<p class="-typo-copy -text-color-gray-01"><a class="link-icon-text" href="{{ URL::previous() }}"><span class="link-icon-text__icon" data-feather="chevron-left"></span><span class="link-icon-text__text">Zurück zur Übersicht</span></a></p>
			</div>
		</div>
		<div class="row">
			<div class="column column--12">
				<hr class="divider">
			</div>
		</div>
	</div> <!-- .content__main ENDE -->
@endsection