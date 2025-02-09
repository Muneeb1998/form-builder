<nav class="bg-white dark:bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center h-16 items-center">
            <img src="{{ asset('images/logo.webp') }}" alt="Logo" class="h-full">
        </div>
        <ul class="flex justify-center items-center">
            <li class="text-white px-2 cursor-pointer {{ app()->getLocale() == 'en' ? 'font-bold underline' : '' }}">
                <a href="{{ url()->current() . '?locale=en' }} ">En</a>
            </li>
            <li class="text-white px-2">|</li>
            <li class="text-white px-2 cursor-pointer {{ app()->getLocale() == 'de' ? 'font-bold underline' : '' }}">
                <a href="{{ url()->current() . '?locale=de'}}">De</a>
            </li>
        </ul>
    </div>
</nav>