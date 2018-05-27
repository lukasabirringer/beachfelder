@extends('layouts.backend')

@section('content')
	<div class="content__main">
		<div class="row">
		    <div class="column column--12">
		        <h2 class="title-page__title">Seite {{ $page->name }} bearbeiten</h2>
		    </div>
		</div>

		<div class="row">
			<div class="column column--12">
				<form class="form-horizontal" action="{{ URL::route('backendPage.update', $page->id) }}" method="POST">
					<input type="hidden" name="_method" value="PATCH">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="text" class="form-control" name="slug" value="{{ $page->slug }}">
				</form>
			</div>
		</div>
	</div>
@endsection