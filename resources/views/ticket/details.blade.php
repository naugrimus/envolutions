@extends('base')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-6 space-y-6">

        <x-ticket.details :ticket="$ticket" />

        <x-ticket.replies :replies="$replies" />

        <x-ticket.form :ticket="$ticket" />

    </div>
@endsection
