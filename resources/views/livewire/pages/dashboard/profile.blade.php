<div class="flex h-screen">
    <!-- Sidebar -->
    <livewire:components.sidebar />

    <!-- Main Content -->
    <div class="flex-1 bg-gray-100 p-6">
        @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <form wire:submit.prevent="save" x-data="{ showPassword: false }" class="space-y-4">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-semibold">{{ __('Profile') }}</h1>
            </div>

            <div class="flex mt-6 space-x-6">
                <!-- Form Container -->
                <div class="w-full bg-white p-6 rounded-lg shadow">

                    <div class="flex flex-wrap">
                        <div class="w-full sm:w-1/2 px-3">
                            <label class="block text-gray-700">{{ __('words.first_name') }}</label>
                            <input type="text" wire:model="first_name" class="w-full border p-2 rounded" placeholder="John">
                        </div>
                        <div class="w-full sm:w-1/2 px-3">
                            <label class="block text-gray-700">{{ __('words.last_name') }}</label>
                            <input type="text" wire:model="last_name" class="w-full border p-2 rounded" placeholder="Doe">
                        </div>
                    </div>

                    <div class="flex flex-wrap">
                        <div class="w-full sm:w-1/2 px-3">
                            <label class="block text-gray-700">{{ __('words.password') }}</label>
                            <input type="password" wire:model="password" class="w-full border p-2 rounded" placeholder="New Password">
                        </div>
                        <div class="w-full sm:w-1/2 px-3">
                            <label class="block text-gray-700">{{ __('words.confirm_password') }}</label>
                            <input type="password" wire:model="password_confirmation" class="w-full border p-2 rounded" placeholder="Confirm Password">
                        </div>
                    </div>
                    <livewire:components.form-settings 
                    :background_color="$formSettings['background_color']" 
                                  :font="$formSettings['font']"
                                  :form_label="$formSettings['form_label']"
                                  wire:key="form-settings-{{ now()->timestamp }}" />
                    <div class="mt-6 text-center">
                        <button class="bg-blue-600 text-white py-2.5 px-[60px] py-2 rounded">{{ __('words.save') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>