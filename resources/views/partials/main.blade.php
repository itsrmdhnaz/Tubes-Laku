<div class="md:justify-center bg-white md:justify-items-center rounded-[25px] {{ (isset($data['main']) && $data['main'] === "mid") ? "row-span-2 col-span-3 relative left-32 min-h-[800px]" : "md:row-span-3" }} {{ (isset($aside) == "yes") || (isset($data['main']) && $data['main'] === "mid") ? "md:col-span-3" : "md:col-span-3"}} md:p-6bg-white border border-gray-200 shadow row dark:bg-white grid-cl md:max-w-full p-5">
    @yield('container')
</div>
