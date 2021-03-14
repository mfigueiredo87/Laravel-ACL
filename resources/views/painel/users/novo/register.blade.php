@extends('auth.template.template')

@section('content-form')
 
<form class="login form" method="POST" action="{{ route('register') }}">
         {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome:</label>

                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Digitar o nome..." required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                             
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail:</label>
 
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"placeholder="Digitar o e-mail..." required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password:</label>
                           <input id="password" type="password" class="form-control" name="password" placeholder="Digitar a senha..." required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>
                           <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar a senha..." required>
                           
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-login">
                                    Registar
                                </button>
                           
                        </div>
                    </form>
@endsection
