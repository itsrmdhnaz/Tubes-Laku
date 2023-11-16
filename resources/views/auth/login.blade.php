@extends('layouts.landing')

@push('styles')
    @livewireStyles()
@endpush

@push('scripts')
    @livewireScripts
@endpush

@section('container')
    @livewire('login')
@endsection
