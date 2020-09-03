@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">

                    @if(!session('email'))
                    <!-- First Verifying Email Address -->
                    <form method="POST" action="{{ route('verifyEmail') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- The Verify button -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Verify') }}
                                </button>

                               <!--  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                        <!-- The Verify Button -->

                    </form>

                    @endif
                    <!-- First Verifying Email Address -->
                    

                       
                        <!-- Option Wheel Start -->
                        @if(session('email'))
                        <p style="">Email Verified</p>
                        <div>

                            <div style="text-align: center;margin-left: -17px;">
                           
                            <div id="x" style="display: inline-block; vertical-align: middle; width:318px;height:319px;background-image: url('colorcircle.PNG');"></div>

                            <div style="display: inline-block; vertical-align: middle; width:270px;height:270px;background-image: url('alphabetcircle.PNG');margin-left: -299px;"></div>

                            </div>

                        </div>

                        <!-- Option Wheel End -->
                        <br>
                        <!-- Selector Buttons Start -->

                        <div class="form-group row">
                        <div class="col-md-4" style="text-align: right;">
                            <input type="hidden" style="display: none;" id="inner" value="1" name="">
                            <input type="hidden" style="display: none;" id="outer" value="a" name="">

                            
                            <div><button type="button" style="outline: none;background: transparent;border:none;color: #6c757d;" onclick="rotateAnticlockwise()"><i class="fas fa-undo-alt fa-5x"></i></button> </div>
                        </div>
                        <div class="col-md-4" style="text-align: center;">
                            <button type="button" style="margin-bottom: 5px;" class="btn btn-secondary" onclick="innerValue()">Inner Value</button>
                            <br>
                            <button type="button" style="" class="btn btn-secondary" onclick="outerValue()">Outer Value</button>
                        </div>
                        <div class="col-md-4" style="text-align: left;">
                            <div><button type="button" style="outline: none;background: transparent;border:none;color: #6c757d;" onclick="rotateClockwise()"><i class="fas fa-redo fa-5x"></i></button> </div>
                        </div> 
                        </div>
                        
                        @endif
                        <!-- Selector Buttons End  -->

                        <br>

                        <!-- Password Field starts -->

                        @if(session('email'))
                         <!-- This is a copy -->
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- This is a copy -->

                        <div>
                        <input type="hidden" name="email" value="{{ session('email') }}">
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- <div class="col-md-2" style="text-align: left;"> -->
                                <button type="button" style="z-index: 1; margin-left: -55px; border:none;outline: none;background: transparent;color: #6c757d;font-size: 20px;" onclick="backspace()"><i class="fas fa-backspace"></i></button>
                            <!-- </div> -->
                        </div>
                        <!-- Password field ends -->

                        <!-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <!-- The login button -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                               
                            </div>
                        </div>
                        <!-- The Login Button -->

                        <br><br>

                        <!-- <p>{{ session('color') }}</p> -->

                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
    window.xy= '{{ session("color") }}';
    document.getElementById('x').style.transform="rotateZ("+window.xy+"deg)";
</script> -->



@endsection
