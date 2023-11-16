@extends('layouts.main2')

@section('container')
    @livewire('edit-profile')
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

            // close alert
            $('#close_alert').click(function(e) {
                e.preventDefault();
                $('.alert').addClass('hidden');
            });

            $(document).on('change', '#myImage1', function(e) {
                e.preventDefault();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preImg1').prop('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            // update user
            $(document).on('click', '.update_profile', function(e) {
                e.preventDefault();
                var user_id = $('.get_user_id').val();

                var data = new FormData();
                data.append('_method', 'PUT');
                data.append('name', $('.name').val());
                data.append('email', $('.email').val());
                data.append('address', $('.address').val());
                data.append('phone', $('.phone').val());
                data.append('password', $('.password').val());
                data.append('password_confirmation', $('.password_confirmation').val());
                data.append('gender', $('input[name="gender"]:checked').val());
                data.append('image', $('.image').prop('files')[0]);


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/update-profile/" + user_id,
                    data: data,
                    dataType: "json",
                    processData: false,
                    contentType: false,
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

                            $('.alert_message').html(response.message);
                            // $('.update_user').html('Update user');
                            $('#edit_modal').addClass('hidden');
                            // Reset radio inputs
                            $('.alert').removeClass('hidden');
                            Livewire.emit('userAdded');
                            var component = window.livewire.find('AsideUp');

                            if (component) {
                                component.emit('userAdded',
                                data); // Emit event "userAdded" ke komponen Livewire AsideUp
                            }
                        }
                    }
                });
            });

        });
    </script>
@endsection
