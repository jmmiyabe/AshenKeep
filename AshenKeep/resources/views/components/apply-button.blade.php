<button 
    {{ $attributes->merge([
        'type' => $attributes->get('href') ? 'button' : 'submit', 
        'onclick' => $attributes->get('href') ? "window.location.href='{$attributes->get('href')}'" : '',
        'class' => 'inline-flex justify-center items-center w-[350px] h-[45px] max-w-full px-4 py-2 bg-[#254E7A] dark:bg-gray-200 border border-transparent rounded-[35px] font-semibold text-xs text-[#F9F4F1] dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150'
    ]) }}
>
    {{ $slot }}
</button>