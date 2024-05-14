@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row  mb-3">
        @livewire('booking-list-two')
    </div>
    <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 pb-9 bg-body-emphasis border-top">
        @livewire('booking-list')
    </div>
</div>

@endsection
