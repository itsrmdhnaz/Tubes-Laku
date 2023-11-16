@if ($paginator->haspages())
    <ul class="flex justify-end">
        <li class="pr-4 my-auto">
            <p class="text-xs">Baris per page {{ $paginator->perPage() }}</p>
        </li>
        <li class="pr-4 my-auto">
            <p class="text-xs">{{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} dari {{ $paginator->total() }}</p>
        </li>
        <div class="flex">
        @if ($paginator->onFirstPage())
        <li wire:click="">
            <div  class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only">Previous</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </div>
        </li>
        @else
        <li wire:click="previousPage">
            <div  class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only">Previous</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </div>
        </li>
        @endif
        @if ($paginator->hasMorePages())
        <li wire:click="nextPage">
            <div class="block px-3 py-2 leading-tight text-gray-500 bg-white rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only">Next</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
              </div>
        </li>
        @else
        <li wire:click="">
            <div class="block px-3 py-2 leading-tight text-gray-500 bg-white rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only">Next</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
              </div>
        </li>
        @endif
    </div>
    </ul>
@endif
