<div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ __('words.register') }} </h2>

    @if (session()->has('success'))
    <div class="p-2 mb-4 text-green-600 bg-green-200 rounded">
        {{ session('success') }}
    </div>
    @endif

    <form wire:submit.prevent="register" x-data="{ showPassword: false }" class="space-y-4">
        <div>
            <label class="block text-gray-700">{{ __('words.first_name') }} ({{ __('words.optional') }})</label>
            <input type="text" wire:model="first_name" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-gray-700">{{ __('words.last_name') }} <span class="text-red-500">*</span></label>
            <input type="text" wire:model="last_name" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-gray-700">{{ __('words.email') }} <span class="text-red-500">*</span></label>
            <input type="email" wire:model="email" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-gray-700">{{ __('words.password') }} <span class="text-red-500">*</span></label>
            <div class="relative">
                <input :type="showPassword ? 'text' : 'password'" wire:model="password" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <button type="button" class="absolute right-3 top-2 text-gray-500" @click="showPassword = !showPassword">
                    <i :class="showPassword ? 'bx bxs-lock-open-alt' : 'bx bxs-lock-alt'"></i>
                </button>
            </div>
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700">{{ __('words.confirm_password') }} <span class="text-red-500">*</span></label>
            <div class="relative">
                <input :type="showPassword ? 'text' : 'password'" wire:model="password_confirmation" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <button type="button" class="absolute right-3 top-2 text-gray-500" @click="showPassword = !showPassword">
                    <i :class="showPassword ? 'bx bxs-lock-open-alt' : 'bx bxs-lock-alt'"></i>
                </button>
            </div>
            @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="!mt-4 text-right">
            <a href="{{ locale_route('login') }}" class="text-sm hover:underline">
            {{ __('words.already_account') }} 
            </a>
        </div>
        <div>
            <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
            {{ __('words.register') }} 
            </button>
        </div>
    </form>
</div>