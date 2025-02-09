<!-- Main Content -->

<div class="flex-1 bg-gray-100 p-6">
    @if (session('error'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" class="bg-red-100 text-red-800 p-2 rounded mb-4">
        <strong>Error!</strong> {{ session('error') }}
    </div>
    @endif
    @if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" class="bg-green-100 text-green-800 p-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <form wire:submit.prevent="save" x-data="{ showPassword: false }" class="space-y-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold"><i class='bx bxs-help-circle'></i> {{ __('words.help_and_support') }}</h1>
        </div>

        <div class="flex mt-6 space-x-6">
            <!-- Form Container -->
            <div class="w-full bg-white p-6 rounded-lg shadow">
                <div class="flex flex-wrap">
                    <div class="w-full">
                        <label class="block text-gray-700">{{ __('words.subject') }}</label>
                        <input type="text" wire:model="subject" class="w-full border p-2 rounded" placeholder="subject">
                        @error('subject')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="flex flex-wrap mt-4">
                    <div class="w-full">
                        <label class="block text-gray-700">{{ __('words.message') }}</label>
                        <textarea wire:model="message" rows="4" class="block p-2.5 w-full text-sm rounded-lg border border-gray-300" placeholder="Write your thoughts here..."></textarea>
                        @error('message')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="mt-6 text-center">
                    <button class="bg-gray-900 text-white py-2.5 px-[60px] py-2 rounded">{{ __('words.save') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>