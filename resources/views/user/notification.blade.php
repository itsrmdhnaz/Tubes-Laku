
@if(Request::ajax())

<div class="flex flex-col gap-8 px-12 py-4">
    <h1 class="text-3xl font-semibold">Notifikasi</h1>
        @livewire('notification-list')
</div>
@endif

@if(!Request::ajax())
@include('partials.defaults.notification')
@endif


