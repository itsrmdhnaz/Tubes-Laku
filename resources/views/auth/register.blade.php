@extends('layouts.landing')

@push('styles')
    @livewireStyles()
@endpush

@push('scripts')
    @livewireScripts
@endpush

@section('container')
    @livewire('register')
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(".peek_password").click(function(e) {
                e.preventDefault();
                $("#password").attr("type", "text");
                $(".password_peek").addClass('hidden');
                $(".close_peek_password").removeClass('hidden');
            });

            $(".close_peek_password").click(function(e) {
                e.preventDefault();
                $("#password").attr("type", "password");
                $(".close_peek_password").addClass('hidden');
                $(".password_peek").removeClass('hidden');
            });

            $(".peek_confirmation").click(function(e) {
                e.preventDefault();
                $("#password_confirmation").attr("type", "text");
                $(".peek_confirmation").addClass('hidden');
                $(".close_peek_confirmation").removeClass('hidden');
            });

            $(".close_peek_confirmation").click(function(e) {
                e.preventDefault();
                $("#password_confirmation").attr("type", "password");
                $(".close_peek_confirmation").addClass('hidden');
                $(".peek_confirmation").removeClass('hidden');
            });
        });
    </script>
@endsection
