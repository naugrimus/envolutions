@extends('base')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-6 space-y-6">

        <x-ticket.details :ticket="$ticket" :readonly="$readonly" :statusses="$statusses"/>

        <x-ticket.replies :replies="$replies" :readonly="$readonly"/>

        @if (!$readonly)
            <x-ticket.form :ticket="$ticket"  />
        @endif


    </div>
@endsection
