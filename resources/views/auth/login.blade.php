@extends('layouts.app')

@section('content')
    <v-container fluid fill-height>
        <v-layout align-center justify-center>
            <v-flex xs12 sm8 md4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <v-card class="elevation-12">
                        <v-toolbar dark color="blue-grey">
                            <v-toolbar-title>Iniciar Sesión</v-toolbar-title>
                        </v-toolbar>
                        <v-card-text>
                            <v-form class="ml-4 mr-4">
                                <v-text-field prepend-icon="person" name="email" label="Correo Electrónico" type="email"></v-text-field>
                            <!-- input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required -->
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <v-text-field id="password" prepend-icon="lock" name="password" label="Contraseña" type="password"></v-text-field>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </v-form>
                        </v-card-text>
                        <v-card-actions>
                        <!--div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div !-->
                            <v-spacer></v-spacer>
                            <v-btn color="primary" type="submit">Iniciar Sesión</v-btn>
                            <v-btn color="secondary" href="{{ route('password.request') }}">Recuperar Contraseña</v-btn>
                        </v-card-actions>
                    </v-card>
                </form>
            </v-flex>
        </v-layout>
    </v-container>
@endsection
