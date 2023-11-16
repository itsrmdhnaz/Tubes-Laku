@extends('layouts.main2')

    @section('container')
        <div class="bg-[#3AB86D] min-h-full rounded-[10px]">
            <div class="px-12 text-white pt-14">
                <div class="flex flex-col gap-6">
                    <div class="flex justify-between">
                        <h1 class="text-3xl"><span class="font-bold">Detail pesanan</span> {{ $order->order_id }}</h1>
                        <a href="{{ route('list.order') }}"><img src="{{ asset('silanx.svg') }}" alt="" class="w-7"></a>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h2>Waktu pemesanan : {{ $order->order_date ? $order->order_date->format('d/m/Y \j\a\m h:i A') : '-' }}
                        </h2>
                        <h2>Waktu pengambilan :
                            {{ $order->pickup_date ? $order->pickup_date->format('d/m/Y \j\a\m h:i A') : '-' }}</h2>
                        <h2>Waktu pengiriman :
                            {{ $order->delivery_date ? $order->delivery_date->format('d/m/Y \j\a\m h:i A') : '-' }}</h2>
                    </div>
                    <div class="px-8 py-6 border-t-2 border-b-2">
                        <div class="flex flex-col gap-8 overflow-y-auto min-h-[250px]">
                            <h2 class="text-2xl font-bold">Barang</h2>
                            <div class="flex flex-col justify-center gap-4 px-4">
                                @foreach ($order->orderItems as $item)
                                    <div class="flex gap-20">
                                        <h2 class="my-auto"><span class="text-2xl font-bold">{{ $item->quantity }}</span> Item
                                        </h2>
                                        <div class="flex items-center gap-24">
                                            <div class="flex items-center gap-5 w-52">
                                                <img src="{{ asset('../products/' . $item->item->image) }}" alt=""
                                                    class="w-12">
                                                <h2 class="text-lg font-medium">{{ $item->item->name }}</h2>
                                            </div>
                                            <div>
                                                <h2 class="text-2xl font-medium">Rp.{{ $item->price }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <h2 class="text-xl font-medium">Biaya antar jemput : </h2>
                            @if ($order->method_order == 0 || $order->method_order == 1)
                                <h2 class="text-2xl font-medium">Rp.5000</h2>
                            @else
                                <h2 class="text-2xl font-medium">Rp.7000</h2>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <h2 class="px-8 py-2 text-xl font-medium">Total :</h2>
                        <h2 class="px-8 py-2 text-2xl font-medium">Rp.{{ $order->total_price }}</h2>
                    </div>
                    <div class="flex">
                        <div class="w-24 h-24 rounded-[10px] bg-[#BBE6CD]">
                            <img src="{{ asset('keranjang.svg') }}" alt="" class="w-16 py-4 mx-auto my-auto">
                        </div>
                        <hr
                            class="my-auto border-4 {{ $order->status == 1 || $order->status == 2 || $order->status == 3 || $order->status == 4 ? 'border-[#BBE6CD]' : 'border-white' }} w-11">
                        <div
                            class="w-24 h-24 rounded-[10px] {{ $order->status == 1 || $order->status == 2 || $order->status == 3 || $order->status == 4 ? 'bg-[#BBE6CD]' : 'bg-white' }}">
                            <img src="{{ asset('pickup.svg') }}" alt="" class="w-10 mx-auto my-auto py-7">
                        </div>
                        <hr
                            class="my-auto border-4 {{ $order->status == 2 || $order->status == 3 || $order->status == 4 ? 'border-[#BBE6CD]' : 'border-white' }} w-11">
                        <div
                            class="w-24 h-24 rounded-[10px] {{ $order->status == 2 || $order->status == 3 || $order->status == 4 ? 'bg-[#BBE6CD]' : 'bg-white' }}">
                            <img src="{{ asset('proses.svg') }}" alt="" class="w-10 py-6 mx-auto my-auto">
                        </div>
                        <hr
                            class="my-auto border-4 {{ $order->status == 3 || $order->status == 4 ? 'border-[#BBE6CD]' : 'border-white' }} w-11">
                        <div
                            class="w-24 h-24 rounded-[10px] {{ $order->status == 3 || $order->status == 4 ? 'bg-[#BBE6CD]' : 'bg-white' }}">
                            <img src="{{ asset('diantar.svg') }}" alt="" class="py-8 mx-auto my-auto w-11">
                        </div>
                        <hr class="my-auto border-4 {{ $order->status == 4 ? 'border-[#BBE6CD]' : 'border-white' }} w-11">
                        <div class="w-24 h-24 rounded-[10px] {{ $order->status == 4 ? 'bg-[#BBE6CD]' : 'bg-white' }}">
                            <img src="{{ asset('terima.svg') }}" alt="" class="w-12 mx-auto my-auto py-7">
                        </div>
                    </div>

                </div>
            </div>
            <div class="flex pt-2 pb-8 pl-10 text-sm text-white gap-7">
                <h2>Pesanan di order</h2>
                <h2>Pesanan di pickup</h2>
                <h2>Pesanan di proses</h2>
                <h2>Pesanan di antar</h2>
                <h2>Pesanan di terima</h2>
            </div>
        </div>
    @endsection
