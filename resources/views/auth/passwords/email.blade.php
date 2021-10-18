@extends('layouts.app')

@section('content')

<x-breadcrumbs>
    <li>
        <a href="{{ route('login') }}">{{ __('login') }}<i class="ti-arrow-right"></i></a>
    </li>
    <li>
        <a href="{{ route('password.request') }}">{{ __('Reset Password') }}</a>
    </li>
</x-breadcrumbs>

<section class="shop login section">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="login-form">
                    <h2>{{ __('Reset Password') }}</h2>
                    <!-- Form -->
                    <form class="form" method="post" action="{{ route('password.email') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('E-Mail Address') }}<span>*</span></label>
                                    <input type="text" name="email" class="@error('email') is-invalid @enderror" placeholder="" required="required">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group login-btn">
                                    <button class="btn" type="submit">{{ __('Send Password Reset Link') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
