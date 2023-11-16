@extends('layouts.main2')

@section('container')

    <div>
        @livewire('user-table')
    </div>
    {{-- alert --}}
    <div class="hidden alert">
        <div class="fixed top-0 bottom-0 left-0 right-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="flex items-center">
                <div class="flex p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    <span class="sr-only">Info</span>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="font-medium text-green-500 alert_message"></span>
                    </div>
                    <button type="button" id="close_alert"
                        class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end alert --}}
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            //off click
            $('#dropdownHoverButton').off('click');

            // close alert
            $('#close_alert').click(function(e) {
                e.preventDefault();
                $('.alert').addClass('hidden');
            });

            // open modal
            $('#openModal').click(function(e) {
                e.preventDefault();
                $('#modal').removeClass('hidden');

                $('#myImage1').change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                $('#preImg1').prop('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
                });
            });

            // close modal
            $('#closeModal').click(function(e) {
                e.preventDefault();
                $('#modal').addClass('hidden');
                $('#modal').find('input:not(:radio)').val("");
                // Reset radio inputs
                $('.gender_add').prop('checked', false);
                $('.save_error_name').html("");
                $('.save_error_email').html("");
                $('.save_error_address').html("");
                $('.save_error_phone').html("");
                $('.save_error_password').html("");
                $('.save_error_password_confirmation').html("");
            });


            // add user
            $(document).on('click', '.add_user', function(e) {
                e.preventDefault();

                // alert('success');
                var data = {
                    'name': $('.name').val(),
                    'email': $('.email').val(),
                    'address': $('.address').val(),
                    'phone': $('.phone').val(),
                    'password': $('.password').val(),
                    'password_confirmation': $('.password_confirmation').val(),
                    'gender': $('input[name="gender"]:checked').val(),
                };

                // alert(data.gender);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('storeUser') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            // Clear all previous error messages
                            $.each(data, function(key) {
                                $('.save_error_' + key).html(
                                    ""); // Clear error messages
                            });

                            $.each(response.errors, function(key, err_values) {
                                var errorId = ".save_error_" + key;
                                $(errorId).html("<h1>" + err_values + "</h1>");
                                $(errorId).addClass("text-red-400 pb-3");
                            });
                        } else {
                            // Clear all error messages
                            $.each(data, function(key) {
                                $('.save_error_' + key).html(
                                    ""); // Clear error messages
                            });
                            Livewire.emit('userAdded');
                            $('#modal').addClass('hidden');
                            // Clear input fields except radio buttons
                            $('#modal').find('input:not(:radio)').val("");
                            // Reset radio inputs
                            $('.gender_add').prop('checked', false);
                            $('.alert_message').html(response.message);
                            $('.alert').removeClass('hidden');
                        }
                    },
                });
            });

            // close modal
            $('#close_modal_edit').click(function(e) {
                e.preventDefault();
                $('#edit_modal').addClass('hidden');
            });

            // open edit modal
            $(document).on('click', '.edit_user', function(e) {
                e.preventDefault();
                var user_id = $(this).val();

                // open modal
                $('#edit_modal').removeClass('hidden');

                $('#myImage').change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                $('#preImg').prop('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
                });

                // get data user ajax
                $.ajax({
                    type: "GET",
                    url: "/edit-user/" + user_id,
                    success: function(response) {
                       if(response.managemen == "user") {
                        $('.name_edit').val(response.user.name);
                        $('.email_edit').val(response.user.email);
                        // alert(response.user.gender);
                        if (response.user.gender == "L") {
                            $('#radio_4').prop('checked', false);
                            $('#radio_3').prop('checked', true);
                        } else if (response.user.gender == "P") {
                            $('#radio_3').prop('checked', false);
                            $('#radio_4').prop('checked', true);
                        }
                        $('.address_edit').val(response.addresses.address);
                        $('.phone_edit').val(response.addresses.phone);
                        $('.edit_user_id').val(user_id);
                       } else if (response.managemen == "barang") {
                            $('.edit_barang_id').val(response.barang.item_id)
                           $('.name_barang_edit').val(response.barang.name)
                           $('.price_edit').val(response.barang.price)
                           $('#preImg').attr('src', '{{ url('products') }}/' + response.barang.image);
                       }
                    }
                });

            });

            // update user
            $(document).on('click', '.update_user', function(e) {
                e.preventDefault();
                // $(this).text('Updating user');

                var user_id = $('.edit_user_id').val();
                var data = {
                    'name': $('.name_edit').val(),
                    'email': $('.email_edit').val(),
                    'address': $('.address_edit').val(),
                    'phone': $('.phone_edit').val(),
                    'password': $('.password_edit').val(),
                    'password_confirmation': $('.password_confirmation_edit').val(),
                    'gender': $('input[name="gender2"]:checked').val(),
                };

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/update-user/" + user_id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            // Clear all previous error messages
                            $.each(data, function(key) {
                                $('.save_error_' + key + "_edit").html(
                                    ""); // Clear error messages
                            });

                            $.each(response.errors, function(key, err_values) {
                                var errorId = ".save_error_" + key + "_edit";
                                $(errorId).html("<h1>" + err_values + "</h1>");
                                $(errorId).addClass("text-red-400 pb-3");
                            });
                            // $('.update_user').html('Update user');
                        } else {
                            // Clear all error messages
                            $.each(data, function(key) {
                                $('.save_error_' + key + "_edit").html(
                                    ""); // Clear error messages
                            });
                            Livewire.emit('userAdded');
                            $('.alert_message').html(response.message);
                            // $('.update_user').html('Update user');
                            $('#edit_modal').addClass('hidden');

                            // Reset radio inputs
                            $('.alert').removeClass('hidden');
                        }
                    }
                });
            });

            //close modal delete
            $(document).on('click', '#close_modal_delete', function(e) {
                e.preventDefault();
                $('#delete_modal').addClass('hidden');
            });

            // delete user modal
            $(document).on('click', '.delete_user', function(e) {
                e.preventDefault();
                var user_id = $(this).val();
                $('.delete_user_id').val(user_id);
                $('#delete_modal').removeClass('hidden');

                $.ajax({
                    type: "GET",
                    url: "/edit-user/" + user_id,
                    success: function(response) {
                        if(response.managemen == "user") {
                            $('.delete_name').html(response.user.name);
                        } else if(response.managemen == "barang") {
                            $('.delete_name').html(response.barang.name);
                        }
                    }
                });
            });

            //delete user
            $(document).on('click', '.delete_user_btn', function(e) {
                e.preventDefault();
                var user_id = $('.delete_user_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: "/delete-user/" + user_id,
                    success: function(response) {
                        Livewire.emit('userAdded');
                        $('#delete_modal').addClass('hidden');
                        $('.alert').removeClass('hidden');
                        $('.alert_message').html(response.message);

                    }
                });
            });

            //close modal detail user
            $(document).on('click', '#close_modal_detail', function(e) {
                e.preventDefault();
                $('#detail_modal').addClass('hidden');
            });

            //open modal detail user
            $(document).on('click', '.detail_user', function(e) {

                e.preventDefault();
                var user_id = $(this).val();

                // open modal
                $('#detail_modal').removeClass('hidden');

                // update ajax
                $.ajax({
                    type: "GET",
                    url: "/edit-user/" + user_id,
                    success: function(response) {
                        if(response.managemen == "user"){
                        $('.detail_nama').html(response.user.name);
                        $('.detail_email').html(response.user.email);
                        $('.detail_id').html(response.user.user_id);
                        if (response.user.gender == 'L') {
                            $('.detail_gender').html('Laki-Laki')
                        } else if (response.user.gender == 'P') {
                            $('.detail_gender').html('Perempuan')
                        }
                        $('.detail_address').html(response.addresses.address);
                        $('.detail_phone').html(response.addresses.phone);
                    } else if(response.managemen == "barang") {
                        $('.foto_barang').attr('src', '{{ url('products') }}/' + response.barang.image);
                        $('.detail_item_id').html(response.barang.item_id);
                        $('.detail_nama_barang').html(response.barang.name);
                        $('.detail_harga_barang').html(response.barang.price);
                    }
                    }
                });

            });


            //add kurir
            $(document).on('click', '.add_kurir', function(e) {
                e.preventDefault();

                // alert('success');
                var data = {
                    'name': $('.name').val(),
                    'email': $('.email').val(),
                    'address': $('.address').val(),
                    'phone': $('.phone').val(),
                    'password': $('.password').val(),
                    'password_confirmation': $('.password_confirmation').val(),
                    'gender': $('input[name="gender"]:checked').val(),
                };


                // alert(data.gender);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('storeKurir') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            // Clear all previous error messages
                            $.each(data, function(key) {
                                $('.save_error_' + key).html(
                                    ""); // Clear error messages
                            });

                            $.each(response.errors, function(key, err_values) {
                                var errorId = ".save_error_" + key;
                                $(errorId).html("<h1>" + err_values + "</h1>");
                                $(errorId).addClass("text-red-400 pb-3");
                            });
                        } else {
                            // Clear all error messages
                            $.each(data, function(key) {
                                $('.save_error_' + key).html(
                                    ""); // Clear error messages
                            });
                            Livewire.emit('userAdded');
                            $('#modal').addClass('hidden');
                            // Clear input fields except radio buttons
                            $('#modal').find('input:not(:radio)').val("");
                            // Reset radio inputs
                            $('.gender_add').prop('checked', false);
                            $('.alert_message').html(response.message);
                            $('.alert').removeClass('hidden');
                        }
                    },
                });
            });

            //add barang
            $(document).on('click', '.add_barang', function(e) {
                e.preventDefault();

                var data = new FormData();
                data.append('name', $('.name_barang').val());
                data.append('price', $('.price').val());
                data.append('image', $('.image').prop('files')[0]);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('storeBarang') }}",
                    data: data,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == 400) {
                            // Clear all previous error messages
                            $.each(data, function(key) {
                                $('.save_error_barang_' + key).html(
                                    ""); // Clear error messages
                            });

                            $.each(response.errors, function(key, err_values) {
                                var errorId = ".save_error_barang_" + key;
                                $(errorId).html("<h1>" + err_values + "</h1>");
                                $(errorId).addClass("text-red-400 pb-3");
                            });
                        } else {
                            // Clear all error messages
                            $.each(data, function(key) {
                                $('.save_error_barang_' + key).html(
                                    ""); // Clear error messages
                            });
                            Livewire.emit('userAdded');
                            $('#modal').addClass('hidden');
                            // Clear input fields except radio buttons
                            $('#modal').find('input:not(:radio)').val("");
                            // Reset radio inputs
                            $('.alert_message').html(response.message);
                            $('.alert').removeClass('hidden');
                        }
                    }
                });
            });

            //update barang
            $(document).on('click', '.update_barang' ,function (e) {
                e.preventDefault();

                var barang = $('.edit_barang_id').val();

                var dataEdit = new FormData();
                dataEdit.append('_method', 'PUT');
                dataEdit.append('name', $('.name_barang_edit').val());
                dataEdit.append('price', $('.price_edit').val());
                dataEdit.append('image', $('.image_edit').prop('files')[0]);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/update-barang/" + barang,
                    data: dataEdit,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.status == 400) {
                            // Clear all previous error messages
                            $.each(dataEdit, function(key) {
                                $('.save_error_barang_edit_' + key).html(
                                    ""); // Clear error messages
                            });

                            $.each(response.errors, function(key, err_values) {
                                var errorId = ".save_error_barang_edit_" + key;
                                $(errorId).html("<h1>" + err_values + "</h1>");
                                $(errorId).addClass("text-red-400 pb-3");
                            });
                        } else {
                            // Clear all error messages
                            $.each(dataEdit, function(key) {
                                $('.save_error_barang_edit' + key).html(
                                    ""); // Clear error messages
                            });
                            Livewire.emit('userAdded');
                            $('#edit_modal').addClass('hidden');

                            $('.alert_message').html(response.message);
                            $('.alert').removeClass('hidden');
                        }
                    }
                });

            });

            //delete barang
            $(document).on('click', '.delete_barang_btn', function(e) {
                e.preventDefault();
                var barang = $('.delete_user_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: "/delete-barang/" + barang,
                    success: function(response) {
                        Livewire.emit('userAdded');
                        $('#delete_modal').addClass('hidden');
                        $('.alert').removeClass('hidden');
                        $('.alert_message').html(response.message);

                    }
                });
            });

            //change page to daftar pesanan
            $(document).on('click', '#daftar_pesanan' , function (e) {
                e.preventDefault();

            $.ajax({
            url: "{{ route('admin.daftar.pesanan') }}",
            method: "GET",
            success: function(response) {
                $('#page').html(response);
            }
            });

            });

             //change page to daftar pesanan
             $(document).on('click', '#admin_home' , function () {
                e.preventDefault();
            });
        });
    </script>
@endsection
