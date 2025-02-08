<div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Login</h2>

    <form wire:submit.prevent="login" x-data="{ showPassword: false }" class="space-y-4">
    @csrf 
        <!-- Email -->
        <div>
            <label class="block text-gray-700">Email <span class="text-red-500">*</span></label>
            <input type="email" wire:model="form.email" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @error('form.email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="block text-gray-700">Password <span class="text-red-500">*</span></label>
            <div class="relative">
                <input :type="showPassword ? 'text' : 'password'" wire:model="form.password" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <button type="button" class="absolute right-3 top-2 text-gray-500" @click="showPassword = !showPassword">
                    <i :class="showPassword ? 'bx bxs-lock-open-alt' : 'bx bxs-lock-alt'"></i>
                </button>
            </div>
            @error('form.password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Register Link -->
        <div class="!mt-4 text-right">
            Not registered? <a href="{{ route('register') }}" class="text-sm hover:underline text-blue">
                Create account
            </a>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                Login
            </button>
        </div>
    </form>
</div>
