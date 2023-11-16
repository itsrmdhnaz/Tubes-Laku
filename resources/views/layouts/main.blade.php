<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laku! | {{ (isset($title) === true || (isset($data['title']) && $data['title'] === true)) ? $title : $data['title'] }}
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->

    @vite('resources/css/app.css')
</head>

<body bgcolor="#3AB86D">
    <div class="grid md:grid-cols-5 {{ (isset($data['main']) && $data['main'] === "mid") ? "md:grid-rows-2" : "md:grid-rows-3" }} md:p-12 gap-9 md:w-[1451px] xl:[2000px] md:mx-auto bg-[#3AB86D] min-h-screen">
        @include('partials.nav')


        @include('partials.main')

        @if (isset($data['title']) && $data['title'] === "pemesanan")
        <div class="col-span-4 row-span-1 mx-auto max-h-[20px]">
            <div class="flex gap-10 mx-auto">
                <div class="py-5 px-10 mx-auto rounded-[25px] bg-white">
                   <h1>Harga total: Rp.<input type="number" class="w-10 my-auto text-black bg-transparent bg-red-100 border-0 appearance-none pointer-events-none quantity-input dynamic-width h-max"
                    id="total-price-input" name="total_price" value="0" readonly>
                </h1>
                </div>
                <button class="rounded-[25px] bg-[#BBE6CD]" onclick="document.getElementById('orderForm').submit();">
                    <div class="py-5 px-20 rounded-[25px] bg-[#BBE6CD]">
                        Atur jadwal
                    </div>
                </button>
            </div>
        </div>
    </form>
    @elseif (isset($data['title']) && $data['title'] === "pemesanan2")
    <div class="col-span-4 row-span-1 mx-auto max-h-[20px]">
    <button type="submit" class="rounded-[25px] bg-[#BBE6CD]" onclick="document.getElementById('orderForm').submit();">
        <div class="py-5 px-20 rounded-[25px] bg-[#BBE6CD]">
           Pesan Sekarang!
        </div>
    </button>
</div>
</form>
    @endif


       @if((isset($aside) == "yes" || isset($data['aside']) && $data['aside'] === "yes"))
       @include('partials.asideup')
        @include('partials.asidedown')
       @endif


        @include('partials.footer')
  </div>
    @vite('resources/js/app.js')
</body>

@yield("script")


</html>
