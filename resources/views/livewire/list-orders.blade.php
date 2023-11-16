<div class="grid grid-cols-4 gap-6 overflow-y-auto max-h-[680px]">
 @foreach ($listOrders as $order)
    <div class="h-28 p-6 col-span-4 bg-[#BBE6CD] rounded-[10px]">
        <div class="flex gap-10">
            <div class="flex flex-col gap-4">
                <h2>Kode pemesanan</h2>
                <h2>{{ $order->order_id }}</h2>
            </div>
            <div class="my-auto text-xl max-w-[268px] w-full">
                @if ($order->status == 0)
                <h2 class="text-red-500">Pesanan sedang dalam antrian</h2>
                @elseif ($order->status == 1)
                <h2 class="text-yellow-400">Pesanan sedang di pickup</h2>
                @elseif ($order->status == 2)
                <h2 class="text-yellow-400">Pesanan sedang di proses</h2>
                @elseif ($order->status == 3)
                <h2 class="text-yellow-400">Pesanan sedang di diantar</h2>
                @elseif ($order->status == 4)
                <h2 class="w-full text-green-500">Pesanan Selesai</h2>
                @endif
            </div>
            <div class="my-auto">
                <a href="detailpesanan/{{ $order->order_id }}" class="py-4 rounded-[10px] text-center bg-[#3AB86D] text-white px-9">Detail</a>
            </div>
        </div>
    </div>
@endforeach
@if ($count < $totalOrder)
<span wire:loading class="col-span-4 font-bold text-center">Loading ...</span>
<button wire:click="loadmore" class="col-span-4 py-3 w-full rounded-[10px] text-center bg-[#3AB86D] text-white px-6">Load more</button>
@endif
</div>

