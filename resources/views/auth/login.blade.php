@extends('backend.layouts.master')

@section('content')

<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <a href="{{ url('/') }}" style="text-decoration:none;">
        <div class="logo">
            <h1>{{config('app.name')}}</h1>
        </div>
    </a>
    <div class="login-box">
        <form class="login-form" method="POST" action="{{ route('login') }}">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Sign In</h3>
            @error('status')
            <p class="invalid-feedback text-center d-block mb-0" role="alert">
                <strong>{{ $message }}</strong>
            </p>
            @enderror
            @csrf
            <div class="form-group">
                <label class="control-label">Email</label>
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                    placeholder="Email" value="" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="control-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" placeholder="Password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}><span
                                class="label-text">Remember Me</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group btn-container">
                <button type="submit" class="btn btn-primary btn-block"><i
                        class="fa fa-sign-in fa-lg fa-fw"></i>Sign In</button>
            </div>
            <br /><br />
            {{-- <p class="text-center">Don't have an account? <a href="/register">Sign Up</a></p> --}}
        </form>

    </div>
</section>

@endsection

@section('after_script')
<script type="text/javascript">
    // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });
</script>
@endsection
