@component('mail::message')
# New Ticket

From:

**Name:** {{ $message->name }}

**Email:** {{ $message->email }}

**Subject:** {{ $message->subject }}

**Message:** ${{ $message->message }}

@component('mail::button', ['url' => route('voyager.dashboard')])
Login To Admin Panel
@endcomponent

{{ config('app.name') }}
@endcomponent
