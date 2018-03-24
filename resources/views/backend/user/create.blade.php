@extends('layouts.backend')

@section('content')

<div class="container">
        <div class="row">
                <div class="col-xs-12">

        <h2>Neuen User erstellen</h2>


<form class="form-horizontal" action="{{ URL::route('backendUser.store') }}" method="POST">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="userName" class="col-sm-2 control-label">User-Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="userName" placeholder="Hier tippen ;)">
                  @if ($errors->has('userName'))
                    <div class="alert alert-danger">{{ $errors->first('userName', ':message') }}</div>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label for="firstName" class="col-sm-2 control-label">Vorname</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="firstName" placeholder="Hier tippen ;)">
                  @if ($errors->has('firstName'))
                    <div class="alert alert-danger">{{ $errors->first('firstName', ':message') }}</div>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label for="lastName" class="col-sm-2 control-label">Nachname</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="lastName" placeholder="Hier tippen ;)">
                  @if ($errors->has('lastName'))
                    <div class="alert alert-danger">{{ $errors->first('lastName', ':message') }}</div>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <label for="postalCode" class="col-sm-2 control-label">PLZ</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="postalCode" placeholder="Hier tippen ;)">
                  @if ($errors->has('postalCode'))
                    <div class="alert alert-danger">{{ $errors->first('postalCode', ':message') }}</div>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label for="city" class="col-sm-2 control-label">Stadt/Ort</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="city" placeholder="Hier tippen ;)">
                  @if ($errors->has('city'))
                    <div class="alert alert-danger">{{ $errors->first('city', ':message') }}</div>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label for="birthdate" class="col-sm-2 control-label">Geburtstag</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="birthdate" placeholder="Hier tippen ;)">
                  @if ($errors->has('birthdate'))
                    <div class="alert alert-danger">{{ $errors->first('birthdate', ':message') }}</div>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label for="sex" class="col-sm-2 control-label">Geschlecht</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="sex" placeholder="Hier tippen ;)">
                  @if ($errors->has('sex'))
                    <div class="alert alert-danger">{{ $errors->first('sex', ':message') }}</div>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">E-Mail-Adresse</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="email" placeholder="Hier tippen ;)">
                  @if ($errors->has('email'))
                    <div class="alert alert-danger">{{ $errors->first('email', ':message') }}</div>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Rolle</label>
                <div class="col-sm-10">
                    <select class="form-control" name="role" class="selectpicker">


                            <option value="registrated">registrated</option>
                            <option value="operator">betreiber</option>
                            <option value="admin">admin</option>

                        </select>
                        @if ($errors->has('role'))
                          <div class="alert alert-danger">{{ $errors->first('role', ':message') }}</div>
                        @endif

                </div>
              </div>

            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Passwort</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" placeholder="Hier tippen ;)">
                  @if ($errors->has('password'))
                    <div class="alert alert-danger">{{ $errors->first('password', ':message') }}</div>
                  @endif
                </div>
              </div>



              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Erstellen</button>
                </div>
              </div>

            </form>



                </div>
        </div>
</div>

@endsection
