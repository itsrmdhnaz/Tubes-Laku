@extends('layouts.main2')

@section('container')
<div class="min-h-[870px] max-h-[1200px]">
    @livewire('status-order')
</div>
@endsection

@section('script')
    <script>
      $(document).ready(function () {

        //close modal
        $('#close_modal').click(function(e) {
                e.preventDefault();
                $('#modal').addClass('hidden');
                $('#modal').find('input:not(:radio)').val("");
                $('.save_error').html("");
            });

        $(document).on('click', '#open_modal' , function (e) {
            e.preventDefault();
            $('#modal').removeClass('hidden');

            var order_id = $(this).val();
            console.log(order_id);
            $('.get_order_id').val(order_id);

            $.ajax({
                type: "Get",
                url: "/daftar-pesanan/" + order_id,
                success: function (response) {
                $.each(response.order.order_items, function(index, item) {
                    var itemQuantity = item.quantity;
                    var itemName = item.item.name; // Akses nama item di sini
                    if(response.order.status == 0){
                        $('.list_item').append('<div class="flex gap-4"><h2>' + itemName + ' ' + itemQuantity + ' item</h2><input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 my-auto text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"></div>');
                    } else {
                        $('.list_item').html("");
                        $('.list_item').append('<div class="flex gap-4"><h2>' + itemName + ' ' + itemQuantity + ' item</h2></div>');
                    }
                 });
                    $('.order_name').html(response.order.user.name);
                    $('.order_phone').html(response.order.address.phone);
                    $('.order_address').html(response.order.address.address);
                    $('.order_message').html(response.order.message_order);
                    $('.total_harga').html(response.order.total_price);
                    var statusOrder = response.order.status;
                    if (statusOrder == 0) {
                        $('.name_button').html('assign kurir')
                        $('.name_button_kurir').html('Pilih kurir')
                    } else if (statusOrder == 1) {
                        $('.name_button').html('Selesai di pick up')
                    } else if (statusOrder == 2) {
                        $('.name_button').html('Selesai di proses')
                    } else if (statusOrder == 3) {
                        $('.name_button').html('Selesai di diantar')
                    } else if (statusOrder == 4) {
                        $('.selesai').html('Pesanan selesai')
                        $('.btn_hidden').addClass('hidden');
                    }
                }
            });
        });

        //assign kurir
        $(document).on('click', '.assign_kurir' , function (e) {
            e.preventDefault();
            var order_id = $('.get_order_id').val();
            var data = {
                "kurir_id" : $('.get_kurir_id').val(),
            }

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.ajax({
                type: "PUT",
                url: "/assign-kurir/" +order_id,
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        $('.save_error').html("");

                        $('.save_error').html("Pilih kurir terlebih dahulu");
                    } else {
                    Livewire.emit('userAdded');
                    $('#modal').find('input:not(:radio)').val("");
                    $('.save_error').html("");
                    $('.alert_message').html(response.message);
                    $('#modal').addClass('hidden');
                    $('.alert').removeClass('hidden');
                    }
                }
            });
        });

        //update status
        $(document).on('click', '.update_status' , function (e) {
            e.preventDefault();
            var order_id = $('.get_order_id').val();

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.ajax({
                type: "PUT",
                url: "/update-pesanan/" +order_id,
                success: function (response) {
                    Livewire.emit('userAdded');
                    $('#modal').find('input:not(:radio)').val("");
                    $('.save_error').html("");
                    $('.alert_message').html(response.message);
                    $('#modal').addClass('hidden');
                    $('.alert').removeClass('hidden');
                }
            });
        });


        //open modal plih
        $(document).on('click', '.choose_kurir' , function (e) {
            e.preventDefault()
            $('#kurir_modal').removeClass('hidden');
        });

        $(document).on('click', '#close_kurir_modal' , function (e) {
            e.preventDefault();
            $('#kurir_modal').addClass('hidden');
        });

        $(document).on('click', '.kurir' ,function (e) {
            e.preventDefault();
            var kurir_id = $(this).val();
            $('.get_kurir_id').val(kurir_id);
            $('#kurir_modal').addClass('hidden');
        });

      });


    </script>
@endsection
