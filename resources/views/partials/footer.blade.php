<div class="{{ (isset($title) === '/' || (isset($data['main']) && $data['main'] === "mid")) ? 'mt-16' : ''}}
p-6 bg-white rounded-[25px] flex shadow dark:bg-white col-span-5 min-h-[200px] justify-around">
    <img src="{{ asset('logo.svg') }}" alt="Nama Gambar" class="w-40">
    <div class="flex flex-col gap-14">
      <p class="mt-5">“Kami menyediakan layanan laundry online yang cepat dan terjangkau"</p>
      <div class="flex gap-16">
      <p>Hubungi kami</p>
      <div class="bg-[#BBE6CD] rounded-[10px] pr-60 pl-5">
      <p>Laundryku@gmail.com</p>
      </div>
      </div>
    </div>

  <div class="my-auto w-max">
      <p class="mx-auto mt-5 text-center">Follow us</p>
      <div class="flex my-3">
      <a href=""><img src="{{ asset('image 28.svg') }}" alt=""></a>
      <a href=""><img src="{{ asset('image 29.svg') }}" alt=""></a>
      <a href=""><img src="{{ asset('image 30.svg') }}" alt=""></a>
      </div>
      <p>Copyright &copy; 2023 LAKU!</p>
  </div>


