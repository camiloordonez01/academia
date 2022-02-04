@extends('layouts.main')
@section('content')
@if(app('request')->input('inactive')=='true')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
        text: 'Suscripción inactiva',
      showConfirmButton: false,
      timer: 2000
    });
</script>
@endif

<div class="container" style="padding: 120px 0px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-dark rounded">
                <div class="card-body">
                    <h4 class="text-center pt-4 pb-3">Iniciar Sesion</h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control boton-principal">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="form-group text-right">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link text-dark" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#password').change(function(){
        console.log('entro');
        $(this).val(md5($(this).val()));
    });
</script>
@endsection
