@extends('layouts.main2')

@section('container')

<div class="flex flex-col gap-8 px-12 py-4">
    <h1 class="text-3xl font-semibold">Daftar Pesanan</h1>
        @livewire('list-orders')
</div>



@endsection

@section('script')


@endsection


