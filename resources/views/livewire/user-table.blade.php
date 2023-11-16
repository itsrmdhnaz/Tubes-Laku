@push('scripts')
    @livewireScripts()
@endpush

<div class="w-full h-full">
    <div class="flex justify-between p-4">
        <h1 class="text-3xl font-bold">
            @if ($role == 0)
                Managemen user
            @elseif ($role == 2)
                Managemen kurir
            @elseif ($managemen == 'barangTable')
                Managemen barang
            @elseif($managemen == 'orderTable')
                Managemen pesanan
            @endif
        </h1>
        <button
            class="flex w-full gap-2 px-3 py-2 my-auto text-sm font-medium text-center text-white bg-blue-700 rounded-lg md:w-auto hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button" id="openModal">
            <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_147_434)">
                    <path
                        d="M9.80668 1.83716C5.65311 1.83716 2.2821 5.34567 2.2821 9.66865C2.2821 13.9916 5.65311 17.5001 9.80668 17.5001C13.9602 17.5001 17.3312 13.9916 17.3312 9.66865C17.3312 5.34567 13.9602 1.83716 9.80668 1.83716ZM6.09706 14.5868C6.42062 13.882 8.39206 13.1928 9.80668 13.1928C11.2213 13.1928 13.2003 13.882 13.5163 14.5868C12.4929 15.4326 11.2062 15.9338 9.80668 15.9338C8.40711 15.9338 7.1204 15.4326 6.09706 14.5868ZM14.5923 13.4513C13.5163 12.0886 10.9053 11.6265 9.80668 11.6265C8.70809 11.6265 6.09706 12.0886 5.02105 13.4513C4.25354 12.4018 3.78702 11.094 3.78702 9.66865C3.78702 6.21496 6.48834 3.40346 9.80668 3.40346C13.125 3.40346 15.8263 6.21496 15.8263 9.66865C15.8263 11.094 15.3598 12.4018 14.5923 13.4513ZM9.80668 4.96975C8.34691 4.96975 7.17308 6.19147 7.17308 7.71078C7.17308 9.23009 8.34691 10.4518 9.80668 10.4518C11.2664 10.4518 12.4403 9.23009 12.4403 7.71078C12.4403 6.19147 11.2664 4.96975 9.80668 4.96975ZM9.80668 8.8855C9.18214 8.8855 8.67799 8.36079 8.67799 7.71078C8.67799 7.06076 9.18214 6.53605 9.80668 6.53605C10.4312 6.53605 10.9354 7.06076 10.9354 7.71078C10.9354 8.36079 10.4312 8.8855 9.80668 8.8855Z"
                        fill="#FFF9F9" />
                </g>
                <defs>
                    <clipPath id="clip0_147_434">
                        <rect width="18.059" height="18.7956" fill="white" transform="translate(0.777222 0.270752)" />
                    </clipPath>
                </defs>
            </svg>
            <span>
                @if ($role == 0)
                    Add User
                @elseif ($role == 2)
                    Add Kurir
                @elseif ($managemen == 'barangTable')
                    Add Barang
                @elseif ($managemen == 'orderTable')
                    add pesanan
                @endif
            </span>
        </button>
    </div>
    <div class="flex flex-col w-full h-[92%] bg-white rounded-2xl drop-shadow-xl">
        <div class="flex justify-between p-4">
            <div id="dropdownHoverButton" data-dropdown-trigger="hover" data-dropdown-toggle="dropdownHover"
                class="hover dropdownHoverBtn w-max outline-none text-lg text-black focus:ring-4 focus:outline-none  font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center">
                <span>
                    @if ($role == 0)
                        Managemen User
                    @elseif ($role == 2)
                        Managemen Kurir
                    @elseif ($managemen == 'barangTable')
                        Managemen Barang
                    @elseif($managemen == 'orderTable')
                        Managemen pesanan
                    @endif
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 my-auto ml-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>

            </div>
            <!-- Dropdown menu -->
            <div id="dropdownHover"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow dropdownHoverBtn w-44 dark:bg-gray-700">
                <ul id="role" class="py-2 text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownDefaultButton">
                    <li>
                        <button type="button" wire:click="setRoleAndManagemen('2', 'userTable')"
                            class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white kurir_dropdown">
                            Kurir
                        </button>
                    </li>
                    <li>
                        <button type="button" wire:click="setRoleAndManagemen('0', 'userTable')"
                            class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white users_dropdown">
                            Users
                        </button>
                    </li>
                    <li>
                        <button type="button" wire:click="setRoleAndManagemen('', 'barangTable')"
                            class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white barang_dropdown">
                            Barang
                        </button>
                    </li>
                    <li>
                        <button type="button" wire:click="setRoleAndManagemen('', 'orderTable')"
                            class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white barang_dropdown">
                            Order
                        </button>
                    </li>
                </ul>
            </div>
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input wire:model="search" type="search" id="default-search"
                    class="block w-full py-4 mr-20 text-sm text-gray-900 border border-gray-300 rounded-[15px] pl-11 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search @if ($role == 0) user...
                @elseif ($role == 2)kurir...
                @elseif ($managemen == 'barangTable')barang...  
                @elseif($managemen == 'orderTable')pesanan... @endif"
                    required>
            </div>
        </div>
        <div class="overflow-y-auto min-h-[651px] border-b-[1px]">
            <table class="w-full bg-[#42BB73] text-sm text-black-500 ">
                <thead class="sticky top-0 text-xs text-white uppercase text-black-700">
                    <tr class="bg-[#42BB73]">
                        <th scope="col" class="pl-11 w-[12%] px-6 py-3 text-left">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3 w-[20%] text-left">
                            @if ($role == 0)
                                Nama User
                            @elseif ($role == 2)
                                Nama Kurir
                            @elseif ($managemen == 'barangTable')
                                Nama Barang
                            @elseif($managemen == 'orderTable')
                                Nama pesanan
                            @endif
                        </th>
                        <th scope="col" class="py-3 px-6 w-[30%]">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($userTable))
                        @foreach ($userTable as $index => $user)
                            <tr class="bg-white border-b">
                                <td scope="row" class="py-4 pl-12 pr-6 font-medium whitespace-nowrap">
                                    {{ $userTable->firstItem() + $index }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->name }}
                                </td>
                                <td class="flex items-center justify-center gap-6 px-6 py-4 text-white">
                                    <button type="button" value="{{ $user->user_id }}"
                                        class="flex items-center justify-center px-2 py-1 text-xs bg-green-500 rounded-full detail_user">
                                        <svg width="20" height="20" viewBox="0 0 19 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_150_2007)">
                                                <path
                                                    d="M8.3856 5.47811C8.38471 5.09811 8.49898 4.78285 8.72839 4.53231C8.96783 4.29175 9.26255 4.17106 9.61255 4.17024C9.96255 4.16942 10.2528 4.28875 10.4834 4.52821C10.724 4.77765 10.8447 5.09237 10.8456 5.47236C10.8465 5.84236 10.7272 6.14764 10.4877 6.3882C10.2583 6.62874 9.96858 6.74942 9.61858 6.75024C9.26858 6.75105 8.9733 6.63174 8.73274 6.39231C8.50218 6.15284 8.38647 5.84811 8.3856 5.47811ZM8.39471 9.37459C8.39382 8.99459 8.50808 8.67932 8.7375 8.42878C8.97694 8.18822 9.27166 8.06753 9.62165 8.06672C9.97165 8.0659 10.2619 8.18522 10.4925 8.42468C10.7331 8.67412 10.8538 8.98884 10.8547 9.36884C10.8556 9.73884 10.7363 10.0441 10.4968 10.2847C10.2674 10.5252 9.97768 10.6459 9.62768 10.6467C9.27768 10.6475 8.9824 10.5282 8.74184 10.2888C8.51128 10.0493 8.39557 9.74459 8.39471 9.37459ZM8.40381 13.2711C8.40293 12.8911 8.51719 12.5758 8.7466 12.3253C8.98604 12.0847 9.28076 11.964 9.63076 11.9632C9.98076 11.9624 10.271 12.0817 10.5016 12.3212C10.7422 12.5706 10.8629 12.8853 10.8638 13.2653C10.8647 13.6353 10.7454 13.9406 10.5059 14.1812C10.2765 14.4217 9.98679 14.5424 9.63679 14.5432C9.28679 14.544 8.99151 14.4247 8.75095 14.1853C8.52039 13.9458 8.40468 13.6411 8.40381 13.2711Z"
                                                    fill="white" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_150_2007">
                                                    <rect width="17.3901" height="18.7956" fill="white"
                                                        transform="translate(0.777222 0.237549)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        Detail</button>
                                    <button type="button" value="{{ $user->user_id }}"
                                        class="flex items-center justify-center gap-1 px-3 py-1 text-xs bg-blue-600 rounded-full edit_user">
                                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>

                                        Edit</button>
                                    <button type="button" value="{{ $user->user_id }}"
                                        class="flex items-center justify-center px-2 py-1 text-xs bg-red-600 rounded-full delete_user">
                                        <svg width="20" height="20" viewBox="0 0 19 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.9708 2.60303H5.27572C4.47867 2.60303 3.82654 3.45998 3.82654 4.50736V19.7421C3.82654 20.7894 4.47867 21.6464 5.27572 21.6464H13.9708C14.7678 21.6464 15.42 20.7894 15.42 19.7421V4.50736C15.42 3.45998 14.7678 2.60303 13.9708 2.60303ZM13.9708 4.50736V11.1725H11.0724V10.2204H8.17407V11.1725H5.27572V4.50736H13.9708ZM5.27572 19.7421V13.0769H13.9708V19.7421H5.27572Z"
                                                fill="white" />
                                        </svg>

                                        Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    @elseif (isset($barangTable))
                        @foreach ($barangTable as $index => $item)
                            <tr class="bg-white border-b">
                                <td scope="row" class="py-4 pl-12 pr-6 font-medium whitespace-nowrap">
                                    {{ $barangTable->firstItem() + $index }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('Products/' . $item->image) }}" alt=""
                                            class="w-6">
                                        {{ $item->name }}
                                    </div>
                                </td>
                                <td class="flex items-center justify-center gap-6 px-6 py-4 text-white">
                                    <button type="button" value="{{ $item->item_id }}"
                                        class="flex items-center justify-center px-2 py-1 text-xs bg-green-500 rounded-full detail_user">
                                        <svg width="20" height="20" viewBox="0 0 19 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_150_2007)">
                                                <path
                                                    d="M8.3856 5.47811C8.38471 5.09811 8.49898 4.78285 8.72839 4.53231C8.96783 4.29175 9.26255 4.17106 9.61255 4.17024C9.96255 4.16942 10.2528 4.28875 10.4834 4.52821C10.724 4.77765 10.8447 5.09237 10.8456 5.47236C10.8465 5.84236 10.7272 6.14764 10.4877 6.3882C10.2583 6.62874 9.96858 6.74942 9.61858 6.75024C9.26858 6.75105 8.9733 6.63174 8.73274 6.39231C8.50218 6.15284 8.38647 5.84811 8.3856 5.47811ZM8.39471 9.37459C8.39382 8.99459 8.50808 8.67932 8.7375 8.42878C8.97694 8.18822 9.27166 8.06753 9.62165 8.06672C9.97165 8.0659 10.2619 8.18522 10.4925 8.42468C10.7331 8.67412 10.8538 8.98884 10.8547 9.36884C10.8556 9.73884 10.7363 10.0441 10.4968 10.2847C10.2674 10.5252 9.97768 10.6459 9.62768 10.6467C9.27768 10.6475 8.9824 10.5282 8.74184 10.2888C8.51128 10.0493 8.39557 9.74459 8.39471 9.37459ZM8.40381 13.2711C8.40293 12.8911 8.51719 12.5758 8.7466 12.3253C8.98604 12.0847 9.28076 11.964 9.63076 11.9632C9.98076 11.9624 10.271 12.0817 10.5016 12.3212C10.7422 12.5706 10.8629 12.8853 10.8638 13.2653C10.8647 13.6353 10.7454 13.9406 10.5059 14.1812C10.2765 14.4217 9.98679 14.5424 9.63679 14.5432C9.28679 14.544 8.99151 14.4247 8.75095 14.1853C8.52039 13.9458 8.40468 13.6411 8.40381 13.2711Z"
                                                    fill="white" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_150_2007">
                                                    <rect width="17.3901" height="18.7956" fill="white"
                                                        transform="translate(0.777222 0.237549)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        Detail</button>
                                    <button type="button" value="{{ $item->item_id }}"
                                        class="flex items-center justify-center gap-1 px-3 py-1 text-xs bg-blue-600 rounded-full edit_user">
                                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>

                                        Edit</button>
                                    <button type="button" value="{{ $item->item_id }}"
                                        class="flex items-center justify-center px-2 py-1 text-xs bg-red-600 rounded-full delete_user">
                                        <svg width="20" height="20" viewBox="0 0 19 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.9708 2.60303H5.27572C4.47867 2.60303 3.82654 3.45998 3.82654 4.50736V19.7421C3.82654 20.7894 4.47867 21.6464 5.27572 21.6464H13.9708C14.7678 21.6464 15.42 20.7894 15.42 19.7421V4.50736C15.42 3.45998 14.7678 2.60303 13.9708 2.60303ZM13.9708 4.50736V11.1725H11.0724V10.2204H8.17407V11.1725H5.27572V4.50736H13.9708ZM5.27572 19.7421V13.0769H13.9708V19.7421H5.27572Z"
                                                fill="white" />
                                        </svg>
                                        Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    @elseif (isset($orderTable))
                        @foreach ($orderTable as $index => $item)
                            <tr class="bg-white border-b">
                                <td scope="row" class="py-4 pl-12 pr-6 font-medium whitespace-nowrap">
                                    {{ $orderTable->firstItem() + $index }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        {{-- <img src="{{ asset('Products/' . $item->image) }}" alt="" class="w-6"> --}}
                                        {{ $item->order_id }}
                                    </div>
                                </td>
                                <td class="flex items-center justify-center gap-6 px-6 py-4 text-white">
                                    <button type="button" value="{{ $item->order_id }}"
                                        class="flex items-center justify-center px-2 py-1 text-xs bg-green-500 rounded-full detail_user">
                                        <svg width="20" height="20" viewBox="0 0 19 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_150_2007)">
                                                <path
                                                    d="M8.3856 5.47811C8.38471 5.09811 8.49898 4.78285 8.72839 4.53231C8.96783 4.29175 9.26255 4.17106 9.61255 4.17024C9.96255 4.16942 10.2528 4.28875 10.4834 4.52821C10.724 4.77765 10.8447 5.09237 10.8456 5.47236C10.8465 5.84236 10.7272 6.14764 10.4877 6.3882C10.2583 6.62874 9.96858 6.74942 9.61858 6.75024C9.26858 6.75105 8.9733 6.63174 8.73274 6.39231C8.50218 6.15284 8.38647 5.84811 8.3856 5.47811ZM8.39471 9.37459C8.39382 8.99459 8.50808 8.67932 8.7375 8.42878C8.97694 8.18822 9.27166 8.06753 9.62165 8.06672C9.97165 8.0659 10.2619 8.18522 10.4925 8.42468C10.7331 8.67412 10.8538 8.98884 10.8547 9.36884C10.8556 9.73884 10.7363 10.0441 10.4968 10.2847C10.2674 10.5252 9.97768 10.6459 9.62768 10.6467C9.27768 10.6475 8.9824 10.5282 8.74184 10.2888C8.51128 10.0493 8.39557 9.74459 8.39471 9.37459ZM8.40381 13.2711C8.40293 12.8911 8.51719 12.5758 8.7466 12.3253C8.98604 12.0847 9.28076 11.964 9.63076 11.9632C9.98076 11.9624 10.271 12.0817 10.5016 12.3212C10.7422 12.5706 10.8629 12.8853 10.8638 13.2653C10.8647 13.6353 10.7454 13.9406 10.5059 14.1812C10.2765 14.4217 9.98679 14.5424 9.63679 14.5432C9.28679 14.544 8.99151 14.4247 8.75095 14.1853C8.52039 13.9458 8.40468 13.6411 8.40381 13.2711Z"
                                                    fill="white" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_150_2007">
                                                    <rect width="17.3901" height="18.7956" fill="white"
                                                        transform="translate(0.777222 0.237549)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        Detail</button>
                                    <button type="button" value="{{ $item->order_id }}"
                                        class="flex items-center justify-center gap-1 px-3 py-1 text-xs bg-blue-600 rounded-full edit_user">
                                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>

                                        Edit</button>
                                    <button type="button" value="{{ $item->order_id }}"
                                        class="flex items-center justify-center px-2 py-1 text-xs bg-red-600 rounded-full delete_user">
                                        <svg width="20" height="20" viewBox="0 0 19 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.9708 2.60303H5.27572C4.47867 2.60303 3.82654 3.45998 3.82654 4.50736V19.7421C3.82654 20.7894 4.47867 21.6464 5.27572 21.6464H13.9708C14.7678 21.6464 15.42 20.7894 15.42 19.7421V4.50736C15.42 3.45998 14.7678 2.60303 13.9708 2.60303ZM13.9708 4.50736V11.1725H11.0724V10.2204H8.17407V11.1725H5.27572V4.50736H13.9708ZM5.27572 19.7421V13.0769H13.9708V19.7421H5.27572Z"
                                                fill="white" />
                                        </svg>
                                        Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="py-3 mr-2">
            @if (isset($userTable))
                {{ $userTable->links('livewire.pagination-links') }}
            @elseif (isset($barangTable))
                {{ $barangTable->links('livewire.pagination-links') }}
            @elseif (isset($orderTable))
                {{ $orderTable->links('livewire.pagination-links') }}
            @endif
        </div>
    </div>

    {{-- add user --}}
    <div id="modal" class="fixed inset-0 z-40 hidden bg-gray-900 bg-opacity-50 modal dark:bg-opacity-80">
        <div tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full p-4 overflow-x-hidden overflow-y-auto">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-[25px] shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex flex-col gap-2 p-5 border-b dark:border-gray-600">
                        <div class="flex justify-between">
                            <h2 class="text-xl font-bold modal-label">
                                @if ($role == 0)
                                    Menambahkan User
                                @elseif ($role == 2)
                                    Menambahkan Kurir
                                @elseif ($managemen == 'barangTable')
                                    Menambahkan Barang
                                @elseif ($managemen == 'orderTable')
                                    Menambahkan Order
                                @endif
                            </h2>
                            <button type="button" id="closeModal"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-[25px] text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <p class="text-sm">
                            @if ($role == 0)
                                Menambahkan user dan memberikan akses untuk masuk user
                            @elseif ($role == 2)
                                Menambahkan kurir an memberikan akses untuk masuk kurir
                            @elseif ($managemen == 'barangTable')
                                Menambahkan barang ke daftar pilihan pakaian laundry
                            @elseif ($managemen == 'orderTable')
                                Menambahkan Order untuk pesanan
                            @endif
                        </p>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6 overflow-y-auto max-h-[250px]">
                        @if ($role == 0 || $role == 2)
                            <div>
                                <label for="name" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    NAMA LENGKAP
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md name"
                                        type="text" placeholder="" name="name" />
                                </label>
                                <div class="save_error_name"></div>
                                <label for="address" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    ALAMAT
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md address"
                                        type="text" name="address" />
                                </label>
                                <div class="save_error_address"></div>
                                <label for="phone" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    NO TELEPON
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md phone"
                                        type="number" name="phone" />
                                </label>
                                <div class="save_error_phone"></div>
                                <label for="email" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    EMAIL
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md email"
                                        type="text" placeholder="" name="email" />
                                </label>
                                <div class="save_error_email"></div>
                                <label for="password" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    password
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md password"
                                        type="password" placeholder="" name="password" />
                                </label>
                                <div class="save_error_password"></div>
                                <label for="password_confirmation"
                                    class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    Password Confirmation
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md password_confirmation"
                                        type="password" placeholder="" name="password_confirmation" />
                                </label>
                                <div class="save_error_password_confirmation"></div>
                                <label class=" text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    KELAMIN
                                    <div class="flex justify-center gap-6">
                                        <input class="hidden gender_add" id="radio_1" type="radio"
                                            name="gender" value="L">
                                        <label
                                            class="w-32 p-4 my-auto text-center bg-white border-2 border-gray-400 rounded-lg cursor-pointer"
                                            for="radio_1">
                                            Laki Laki
                                        </label>
                                        <input class="hidden gender_add" id="radio_2" type="radio"
                                            name="gender" value="P">
                                        <label
                                            class="w-32 p-4 text-center bg-white border-2 border-gray-400 rounded-lg cursor-pointer"
                                            for="radio_2">
                                            Perempuan
                                        </label>
                                    </div>
                                </label>
                            </div>
                        @elseif ($managemen == 'barangTable')
                            <div>
                                <label for="name"
                                    class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">Nama barang
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md name_barang"
                                        type="text" placeholder="" name="name" />
                                </label>
                                <div class="save_error_barang_name"></div>
                                <label for="price" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    Harga
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md price"
                                        type="number" placeholder="" name="price" />
                                </label>
                                <div class="save_error_barang_price"></div>

                                <label
                                    class="text-[#3AB86D] flex flex-col gap-4 mb-2 text-sm font-bold dark:text-white"
                                    for="image">Image
                                    <div class="flex items-center justify-center">
                                        <img src="" id="preImg1" class="max-w-20">
                                    </div>
                                    <input id="myImage1"
                                        class="image w-full mb-5 text-xs file:bg-[#3AB86D] text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-[#3AB86D] dark:border-[#3AB86D] dark:placeholder-[#3AB86D]"
                                        name="image" type="file">
                                </label>
                                <div class="save_error_barang_image"></div>
                                {{-- <div class="insert_image"></div> --}}
                            </div>
                        @elseif ($managemen == 'orderTable')
                            <div class="space-y-4">
                                <label for="order_date" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    Order Date Pesanan
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md order_date_pesanan"
                                        type="text" placeholder="" name="order_date_pesanan" />
                                </label>

                                <label for="pickup_date" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    Pickup Date Pesanan
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md pickup_date_pesanan"
                                        type="text" placeholder="" name="pickup_date_pesanan" />
                                </label>

                                <label for="process_date"
                                    class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    Process Date Pesanan
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md process_date_pesanan"
                                        type="text" placeholder="" name="process_date_pesanan" />
                                </label>

                                <label for="delivery_date"
                                    class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    Delivery Date Pesanan
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md delivery_date_pesanan"
                                        type="text" placeholder="" name="delivery_date_pesanan" />
                                </label>

                                <label for="received_date"
                                    class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    Received Date Pesanan
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md received_date_pesanan"
                                        type="text" placeholder="" name="received_date_pesanan" />
                                </label>

                                <label for="message_order"
                                    class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    Message Order Pesanan
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md message_order_pesanan"
                                        type="text" placeholder="" name="message_order_pesanan" />
                                </label>

                                <label for="total_price" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    Total Price Pesanan
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md total_price_pesanan"
                                        type="text" placeholder="" name="total_price_pesanan" />
                                </label>

                                <label for="address_id" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    Address ID Pesanan
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md address_id_pesanan"
                                        type="text" placeholder="" name="address_id_pesanan" />
                                </label>

                                <label for="user_id" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    User ID Pesanan
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md user_id_pesanan"
                                        type="text" placeholder="" name="user_id_pesanan" />
                                </label>

                                <label for="courier_id" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    Courier ID Pesanan
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md courier_id_pesanan"
                                        type="text" placeholder="" name="courier_id_pesanan" />
                                </label>

                                <label for="status" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    Status Pesanan
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md status_pesanan"
                                        type="text" placeholder="" name="status_pesanan" />
                                </label>

                                <label for="method_order"
                                    class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    Method Order Pesanan
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md method_order_pesanan"
                                        type="text" placeholder="" name="method_order_pesanan" />
                                </label>
                            </div>
                        @endif
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center justify-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        @if ($role == 0)
                            <button type="submit" id="closeModal"
                                class="add_user text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Tambah User</button>
                        @elseif ($role == 2)
                            <button type="submit" id="closeModal"
                                class="add_kurir text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Tambah Kurir</button>
                        @elseif ($managemen == 'barangTable')
                            <button type="submit" id="closeModal"
                                class="add_barang text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Tambah Barang</button>
                        @elseif ($managemen == 'orderTable')
                            <button type="submit" id="closeModal"
                                class="add_pesanan text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Tambah Barang</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end add user --}}

    {{-- Edit user --}}
    <div id="edit_modal" class="fixed inset-0 z-40 hidden bg-gray-900 bg-opacity-50 modal dark:bg-opacity-80">
        <div tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full p-4 overflow-x-hidden overflow-y-auto">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-[25px] shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex flex-col gap-2 p-5 border-b dark:border-gray-600">
                        <div class="flex justify-between">
                            <h2 class="text-xl font-bold modal-label">
                                @if ($role == 0)
                                    Edit User
                                @elseif ($role == 2)
                                    Edit Kurir
                                @elseif ($managemen == 'barangTable')
                                    Edit Barang
                                @elseif ($managemen == 'orderTable')
                                    Edit Pesanan
                                @endif
                            </h2>
                            <button type="button" id="close_modal_edit"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-[25px] text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <p class="text-sm">
                            @if ($role == 0)
                                Edit user dan memberikan akses untuk masuk user
                            @elseif ($role == 2)
                                Edit kurir dan memberikan akses untuk masuk kurir
                            @elseif ($managemen == 'barangTable')
                                Edit barang dan menganti data dari daftar pakaian laundry
                            @elseif ($managemen == 'orderTable')
                                Edit pesanan
                            @endif
                        </p>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6 overflow-y-auto max-h-[250px]">
                        @if ($role == 0 || $role == 2)
                            <div>
                                <label for="name" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    NAMA LENGKAP
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md name_edit"
                                        type="text" placeholder="" name="name" />
                                </label>
                                <div class="save_error_name_edit"></div>
                                <label for="address" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    ALAMAT
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md address_edit"
                                        type="text" name="address" />
                                </label>
                                <div class="save_error_address_edit"></div>
                                <label for="phone" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    NO TELEPON
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md phone_edit"
                                        type="number" name="phone" />
                                </label>
                                <div class="save_error_phone_edit"></div>
                                <label for="email" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    EMAIL
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md email_edit"
                                        type="text" placeholder="" name="email" />
                                </label>
                                <div class="save_error_email_edit"></div>
                                <label for="password" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    password
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md password_edit"Edit
                                        type="password" placeholder="" name="password" />
                                </label>
                                <div class="save_error_password_edit"></div>
                                <label for="password_confirmation"
                                    class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    Password Confirmation
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md password_confirmation_edit"
                                        type="password" placeholder="" name="password_confirmation" />
                                </label>
                                <div class="save_error_password_confirmation_edit"></div>

                                <label class="gender text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    KELAMIN
                                    <div class="flex justify-center gap-6">
                                        <input class="hidden gender_edit" id="radio_3" type="radio"
                                            name="gender2" value="L">
                                        <label
                                            class="w-32 p-4 my-auto text-center bg-white border-2 border-gray-400 rounded-lg cursor-pointer"
                                            for="radio_3">
                                            Laki Laki
                                        </label>
                                        <input class="hidden gender_edit" id="radio_4" type="radio"
                                            name="gender2" value="P">
                                        <label
                                            class="w-32 p-4 text-center bg-white border-2 border-gray-400 rounded-lg cursor-pointer"
                                            for="radio_4">
                                            Perempuan
                                        </label>
                                    </div>
                                </label>
                                <input type="text" class="hidden edit_user_id">
                            </div>
                        @elseif ($managemen == 'barangTable')
                            <div>
                                <label for="name"
                                    class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">Nama barang
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md name_barang_edit"
                                        type="text" placeholder="" name="name" />
                                </label>
                                <div class="save_error_barang_edit_name"></div>
                                <label for="price" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                                    Harga
                                    <input
                                        class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md price_edit"
                                        type="number" placeholder="" name="price" />
                                </label>
                                <div class="save_error_barang_edit_price"></div>
                                <label
                                    class="text-[#3AB86D] flex flex-col gap-4 mb-2 text-sm font-bold dark:text-white"
                                    for="image">Image
                                    <div class="flex items-center justify-center">
                                        <img src="" id="preImg" class="max-w-20">
                                    </div>
                                    <input id="myImage"
                                        class="image_edit w-full mb-5 text-xs file:bg-[#3AB86D] text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-[#3AB86D] dark:border-[#3AB86D] dark:placeholder-[#3AB86D]"
                                        name="image" type="file">
                                </label>
                                <div class="save_error_barang_edit_image"></div>
                                <input type="text" class="hidden edit_barang_id">
                            </div>
                        @endif
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center justify-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        @if ($role == 0)
                            <button type="submit" id="close_modal_edit"
                                class="update_user text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Update user</button>
                        @elseif ($role == 2)
                            <button type="submit" id="close_modal_edit"
                                class="update_user text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Update kurir</button>
                        @elseif ($managemen == 'barangTable')
                            <button type="submit" id="close_modal_edit"
                                class="update_barang text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Update barang</button>
                        @elseif ($managemen == 'orderTable')
                            <button type="submit" id="close_modal_edit"
                                class="update_pesanan text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Update pesanan</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end edit user --}}

    {{-- delete user --}}
    <div id="delete_modal" class="fixed inset-0 z-40 hidden bg-gray-900 bg-opacity-50 modal dark:bg-opacity-80">
        <div tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full p-4 overflow-x-hidden overflow-y-auto">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-[25px] shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex flex-col gap-2 p-5 border-b dark:border-gray-600">
                        <div class="flex justify-between">
                            <h2 class="text-xl font-bold modal-label">
                                @if ($role == 0)
                                    Delete user
                                @elseif ($role == 2)
                                    Delete kurir
                                @elseif ($managemen == 'barangTable')
                                    Delete barang
                                @elseif ($managemen == 'orderTable')
                                    Delete pesanan
                                @endif
                            </h2>
                            <button type="button" id="close_modal_delete"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-[25px] text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <p class="text-sm">
                            @if ($role == 0)
                                Delete user dan menghapus akses untuk masuk user
                            @elseif ($role == 2)
                                Delete kurir dan menghapus akses untuk masuk kurir
                            @elseif ($managemen == 'barangTable')
                                Delete barang dan menghapus barang di daftar pakaian
                            @elseif ($managemen == 'orderTable')
                                Delete barang dan menghapus pesanan
                            @endif
                        </p>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6 overflow-y-auto max-h-[250px] flex justify-center items-center">
                        <input type="text" class="hidden delete_user_id">
                        @if ($role == 0)
                            <h1 class="pb-6 my-auto">Anda yakin ingin menghapus user <span
                                    class="font-bold delete_name"></span>?</h1>
                        @elseif ($role == 2)
                            <h1 class="pb-6 my-auto">Anda yakin ingin menghapus kurir <span
                                    class="font-bold delete_name"></span>?</h1>
                        @elseif ($managemen == 'barangTable')
                            <h1 class="pb-6 my-auto">Anda yakin ingin menghapus barang <span
                                    class="font-bold delete_name"></span>?</h1>
                        @elseif ($managemen == 'orderTable')
                            <h1 class="pb-6 my-auto">Anda yakin ingin menghapus pesanan <span
                                    class="font-bold delete_name"></span>?</h1>
                        @endif
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center justify-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        @if ($role == 0)
                            <button type="submit" id="close_modal_delete"
                                class="delete_user_btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Delete user</button>
                        @elseif ($role == 2)
                            <button type="submit" id="close_modal_delete"
                                class="delete_user_btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Delete kurir</button>
                        @elseif ($managemen == 'barangTable')
                            <button type="submit" id="close_modal_delete"
                                class="delete_barang_btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Delete barang</button>
                        @elseif ($managemen == 'orderTable')
                            <button type="submit" id="close_modal_delete"
                                class="delete_pesanan_btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Delete barang</button>
                        @endif
                        {{-- <button type="button" id="close_modal_delete"
                            class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Close</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end delete user --}}

    {{-- detail user --}}
    <div id="detail_modal" class="fixed inset-0 z-40 hidden bg-gray-900 bg-opacity-50 modal dark:bg-opacity-80">
        <div tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full p-4 overflow-x-hidden overflow-y-auto">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-[25px] shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex flex-col gap-2 p-5 border-b dark:border-gray-600">
                        <div class="flex justify-between">
                            <h2 class="text-xl font-bold modal-label">
                                @if ($role == 0)
                                    Detail user
                                @elseif ($role == 2)
                                    Detail kurir
                                @elseif ($managemen == 'barangTable')
                                    Detail barang
                                @elseif ($managemen == 'orderTable')
                                    Detail pesanan
                                @endif
                            </h2>
                            <button type="button" id="close_modal_detail"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-[25px] text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <p class="text-sm">
                            @if ($role == 0)
                                Detail user melihat informasi terkait user
                            @elseif ($role == 2)
                                Detail kurir melihat informasi terkait kurir
                            @elseif ($managemen == 'barangTable')
                                Detail barang melihat informasi terkait barang
                            @elseif ($managemen == 'orderTable')
                                Detail barang melihat informasi terkait pesanan
                            @endif
                        </p>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-1 overflow-y-auto max-h-[250px]">
                        @if ($role == 0 || $role == 2)
                            <h1 class="pb-6 my-auto font-bold text-center detail_id"></h1>
                            <h1 class="pb-6 my-auto">Nama : <span class="font-bold detail_nama"></span></h1>
                            <h1 class="pb-6 my-auto">address : <span class="font-bold detail_address"></span></h1>
                            <h1 class="pb-6 my-auto">phone : <span class="font-bold detail_phone"></span></h1>
                            <h1 class="pb-6 my-auto">email : <span class="font-bold detail_email"></span></h1>
                            <h1 class="pb-6 my-auto">gender : <span class="font-bold detail_gender"></span></h1>
                        @elseif ($managemen == 'barangTable')
                            <img src="" alt="" class="mx-auto foto_barang">
                            <h1 class="pb-6 my-auto">Item id: <span class="font-bold detail_item_id"></span></h1>
                            <h1 class="pb-6 my-auto">Nama barang : <span class="font-bold detail_nama_barang"></span>
                            </h1>
                            <h1 class="pb-6 my-auto">Harga : <span class="font-bold detail_harga_barang"></span></h1>
                        @endif
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center justify-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="button" id="close_modal_detail"
                            class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end detail user --}}
</div>
