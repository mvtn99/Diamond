@extends('layouts.app')

@section('title', 'Thank You')

@section('content')

   <div class="thank-you-section">
       <h1>Thank you for <br> Your Order!</h1>
       <p>A confirmation email was sent</p>
       <div class="spacer">
       </div>
       <div class="button mt-3">
            <a href="{{ route('home') }}" class="btn min" style="color: white;">Go Homepage</a>
        </div>
   </div>

@endsection