@extends('layouts.frontend')

@section('content')

<div class="container">
    <div class="row">

<form class="form-horizontal" action="{{ URL::route('profile.update') }}" method="POST" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="userName" class="col-sm-2 control-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="userName" value="{{ $profileuser->userName }}">
            @if ($errors->has('userName'))
              <div class="alert alert-danger">{{ $errors->first('userName', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">E-Mail-Adresse</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="email" value="{{ $profileuser->email }}">
            @if ($errors->has('email'))
              <div class="alert alert-danger">{{ $errors->first('email', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="firstName" class="col-sm-2 control-label">Vorname</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="firstName" value="{{ $profileuser->firstName }}">
            @if ($errors->has('firstName'))
              <div class="alert alert-danger">{{ $errors->first('firstName', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="lastName" class="col-sm-2 control-label">Nachname</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="lastName" value="{{ $profileuser->lastName }}">
            @if ($errors->has('lastName'))
              <div class="alert alert-danger">{{ $errors->first('lastName', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="postalCode" class="col-sm-2 control-label">PLZ</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="postalCode" value="{{ $profileuser->postalCode }}">
            @if ($errors->has('postalCode'))
              <div class="alert alert-danger">{{ $errors->first('postalCode', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="city" class="col-sm-2 control-label">Stadt</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="city" value="{{ $profileuser->city }}">
            @if ($errors->has('city'))
              <div class="alert alert-danger">{{ $errors->first('city', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="birthdate" class="col-sm-2 control-label">Geburtstag</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="birthdate" value="{{ $profileuser->birthdate }}">
            @if ($errors->has('birthdate'))
              <div class="alert alert-danger">{{ $errors->first('birthdate', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="sex" class="col-sm-2 control-label">Geschlecht</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="sex" value="{{ $profileuser->sex }}">
            @if ($errors->has('sex'))
              <div class="alert alert-danger">{{ $errors->first('sex', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="publicProfile" class="col-sm-2 control-label">öffentliches Profil?</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="publicProfile" value="{{ $profileuser->publicProfile }}">
            @if ($errors->has('publicProfile'))
              <div class="alert alert-danger">{{ $errors->first('publicProfile', ':message') }}</div>
            @endif
          </div>
        </div>


        <div class="form-group">
          <label for="role" class="col-sm-2 control-label">Rolle</label>
          <div class="col-sm-10">
            <select class="form-control" name="role" class="selectpicker">
              <optgroup label="aktuelle Rolle">
                <option>{{ $profileuser->role }}</option>
              </optgroup>
              <optgroup label="neue Rolle">
                <option value="registrated">registrated</option>
                <option value="betreiber">betreiber</option>
                <option value="admin">admin</option>
              </optgroup>
            </select>

          </div>
        </div>



        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Speichern</button>
          </div>
        </div>

      </form>

      <p>Letztes Update: {{ $profileuser->updated_at }}</p>


    </div>
</div>

@endsection
