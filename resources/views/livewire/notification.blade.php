<div class="{{ ($notification == 0) ? 'hidden' : ''  }}  absolute inline-flex items-center justify-center text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full w-7 h-7 top-4 right-5 dark:border-gray-900">
    {{ $notification }}
</div>
{{-- @section('script')
    <script>
        setInterval(function() {
            @this.call('poll');
        }, 5000); // Panggil poll() setiap 5 detik (5000 milidetik)
    </script>
@endsection --}}
