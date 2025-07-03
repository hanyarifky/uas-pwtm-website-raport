@props(['active' => false])

<a {{ $attributes }}
    class="flex items-center p-2 {{ $active ? 'bg-gray-100 dark:bg-gray-700' : 'dark:text-white ' }} text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

    <svg class="w-5 h-5 {{ $active ? 'text-gray-900 group:text-gray-900 dark:text-white' : 'text-gray-500 dark:text-white dark:group:text-white'  }} text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
        {{ $slot }}
    </svg>
    

    <span class="flex-1 ms-3 whitespace-nowrap">{{ $attributes->get('text') }}</span>
</a>
