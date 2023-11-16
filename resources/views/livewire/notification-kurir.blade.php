<div class="grid grid-cols-4 gap-6 overflow-y-auto max-h-[680px]">
    @foreach ($listOrders as $order)
       <div class="h-28 p-6 col-span-4 bg-[#BBE6CD] rounded-[10px]">
           <div class="flex gap-10">
               <div class="flex w-full gap-6">
                   @if ($order->status == 0)
                   <div>
                   <img src="{{ asset('keranjang.svg') }}" alt="" class="w-16 my-auto">
                </div>
                <div class="flex flex-col items-center justify-center">
                    <h2 class="text-base font-bold">Pesananmu dalam antrian, Mohon menunggu pesanan diterima</h2>
                    <h3>Terima kasih, kamu tetap aman di kosan jaga kesehatan diri ya</h3>
                </div>
                   @elseif ($order->status == 1)
                   <div>
                    <img src="{{ asset('pickup.svg') }}" alt="" class="w-12 pt-2 my-auto">
                 </div>
                 <div class="flex flex-col items-center justify-center pl-5 text-center">
                     <h2 class="text-base font-bold">Kurir sedang menuju lokasi anda, siapkan uang dan barang!</h2>
                     <h3>Terima kasih, kamu tetap aman di kosan jaga kesehatan diri ya</h3>
                 </div>
                   @elseif ($order->status == 2)
                   <div>
                    <img src="{{ asset('proses.svg') }}" alt="" class="w-12 pt-1 my-auto">
                 </div>
                 <div class="flex flex-col items-center justify-center pl-4">
                     <h2 class="text-base font-bold">Pakaian kamu sedang kami proses, tenang dijamin kinclong</h2>
                     <h3>Terima kasih, kamu tetap aman di kosan jaga kesehatan diri ya</h3>
                 </div>
                   @elseif ($order->status == 3)
                   <div>
                    <img src="{{ asset('diantar.svg') }}" alt="" class="pt-2 my-auto w-14">
                 </div>
                 <div class="flex flex-col items-center justify-center">
                     <h2 class="text-base font-bold">ngengggggg ngengggg berangkat! pesanan kamu sedang diantar</h2>
                     <h3>Terima kasih, kamu tetap aman di kosan jaga kesehatan diri ya</h3>
                 </div>
                   @elseif ($order->status == 4)
                   <div>
                    <img src="{{ asset('terima.svg') }}" alt="" class="w-16 pt-1 my-auto">
                 </div>
                 <div class="flex flex-col items-center justify-center">
                     <h2 class="text-base font-bold">Pesananmu sudah diterima, terima kasih telah memakai jasa kami</h2>
                     <h3>Terima kasih, kamu tetap aman di kosan jaga kesehatan diri ya</h3>
                 </div>
                   @endif
               </div>
           </div>
       </div>
   @endforeach
   @if ($count < $totalOrder)
   <span wire:loading class="col-span-4 font-bold text-center">Loading ...</span>
   <button wire:click="loadmore" class="col-span-4 py-3 w-full rounded-[10px] text-center bg-[#3AB86D] text-white px-6">Load more</button>
   @endif
   </div>

