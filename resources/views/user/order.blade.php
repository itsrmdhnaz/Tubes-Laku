@extends('layouts.main')

@section('container')
    <form id="orderForm" action="{{ route('order.storeFirst') }}" method="POST">
        @csrf
        <div class="flex flex-col gap-6 p-3">
            <h1 class="text-3xl font-semibold">Pilih Pakaian</h1>
            <div class="grid grid-cols-4 gap-6 overflow-y-auto max-h-[700px]">
                @foreach ($items as $item)
                    <div class="h-24 col-span-4 bg-[#BBE6CD] rounded-[10px]">
                        <div class="flex justify-between">
                            <div class="flex gap-6 py-3 pl-7">
                                <img src="{{ "../products/$item->image" }}" alt="{{ $item->name }}">
                                <div class="my-auto">
                                    <h1 class="text-xl font-medium">{{ $item->name }}</h1>
                                    <h1 class="font-bold text-md">Rp. {{ $item->price }}</h1>
                                </div>
                            </div>
                            <div class="flex gap-3 text-white pr-7">
                                <button type="button" class="pointer-events-auto decrement-btn"><img src="../kurang.svg"
                                        alt="" class="my-auto"></button>
                                <input type="number"
                                    class="px-1 py-0 my-auto text-black bg-transparent border-0 appearance-none pointer-events-none quantity quantity-input w-max h-max"
                                    name="items[quantity][]" readonly value="0" min="0" max="100" 33>
                                <button type="button" class="pointer-events-auto increment-btn"><img src="../tambah.svg"
                                        alt="" class="my-auto"></button>
                            </div>
                        </div>
                        <input type="hidden" name="items[item_id][]" value="{{ $item->item_id }}">
                        <input type="hidden" name="items[price][]" value="{{ $item->price }}">
                    </div>
                @endforeach
            </div>
        </div>
    @endsection

    @section('script')
        <script>
            function calculateTotal() {
                const quantities = document.querySelectorAll('input[name="items[quantity][]"]');
                let totalPrice = 0;

                quantities.forEach((input) => {
                    const quantity = parseInt(input.value);
                    const price = parseFloat(input.parentNode.parentNode.querySelector('.font-bold').textContent.slice(
                        4));
                    const itemTotal = price * quantity;
                    totalPrice += itemTotal;
                });

                const totalPriceInput = document.getElementById('total-price-input');
                totalPriceInput.value = totalPrice;

                const dynamicWidthInput = document.querySelector('.dynamic-width');
                dynamicWidthInput.style.width = `${totalPrice.toString().length + 2}ch`;
            }

            document.addEventListener('DOMContentLoaded', function() {
                calculateTotal();
            });
            const decrementBtns = document.querySelectorAll('.decrement-btn');
            const incrementBtns = document.querySelectorAll('.increment-btn');
            const quantityInputs = document.querySelectorAll('.quantity-input');

            // Loop through all quantity inputs
            quantityInputs.forEach(function(quantityInput, index) {
                const itemQuantity = parseInt(quantityInput.value);
                const decrementBtn = decrementBtns[index];
                const incrementBtn = incrementBtns[index];

                // Show or hide decrement button based on quantity value
                if (itemQuantity === 0) {
                    decrementBtn.style.opacity = "0";
                    decrementBtn.style.pointerEvents = "none";
                }

                // Show or hide increment button based on quantity value
                if (itemQuantity === 100) {
                    incrementBtn.style.opacity = "0";
                    incrementBtn.style.pointerEvents = "none";
                }

                // Listen for changes in the input value
                quantityInput.addEventListener('change', function() {
                    const newQuantity = parseInt(quantityInput.value);

                    // Show or hide decrement button based on quantity value
                    if (newQuantity === 0) {
                        decrementBtn.style.opacity = "0";
                        decrementBtn.style.pointerEvents = "none";
                    } else {
                        decrementBtn.style.opacity = "1";
                        decrementBtn.style.pointerEvents = "auto";
                    }

                    // Show or hide increment button based on quantity value
                    if (newQuantity === 100) {
                        incrementBtn.style.opacity = "0";
                        incrementBtn.style.pointerEvents = "none";
                    } else {
                        incrementBtn.style.opacity = "1";
                        incrementBtn.style.pointerEvents = "auto";
                    }

                    calculateTotal();
                });

                // Add click event listener to decrement button
                decrementBtn.addEventListener('click', function() {
                    let currentQuantity = parseInt(quantityInput.value);
                    if (currentQuantity > 0) {
                        currentQuantity--;
                        quantityInput.value = currentQuantity;
                        decrementBtn.style.opacity = currentQuantity === 0 ? "0" : "1";
                        decrementBtn.style.pointerEvents = currentQuantity === 0 ? "none" : "auto";
                        incrementBtn.style.opacity = "1";
                        incrementBtn.style.pointerEvents = "auto";
                    }

                    calculateTotal();
                });

                // Add click event listener to increment button
                incrementBtn.addEventListener('click', function() {
                    let currentQuantity = parseInt(quantityInput.value);
                    if (currentQuantity < 100) {
                        currentQuantity++;
                        quantityInput.value = currentQuantity;
                        incrementBtn.style.opacity = currentQuantity === 100 ? "0" : "1";
                        incrementBtn.style.pointerEvents = currentQuantity === 100 ? "none" : "auto";
                        decrementBtn.style.opacity = "1";
                        decrementBtn.style.pointerEvents = "auto";
                    }

                    calculateTotal();
                });

            });
        </script>
    @endsection
