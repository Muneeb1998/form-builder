<div class="flex flex-wrap items-center justify-around">
    <!-- Background Color -->
    <div class="w-full md:w-1/2 px-3">
        <h2 class="text-lg mt-4">{{ __('words.background_color') }}</h2>
        <input type="color"
            wire:model.live="background_color"
            class="w-10 h-10 cursor-pointer border rounded-full">
    </div>

    <!-- Form Label Toggle -->
    <div class="w-full md:w-1/2 px-3">
        <h2 class="text-lg mt-4">{{ __('words.form_labels') }}</h2>
        <input type="checkbox"
            wire:model.live="form_label"
            class="sr-only peer">
        <div class="relative w-11 h-6 bg-gray-300 peer-checked:bg-blue-600 rounded-full transition-all">
            <div class="absolute top-[2px] start-[2px] w-5 h-5 bg-white border rounded-full transition-transform peer-checked:translate-x-full"></div>
        </div>
    </div>
    <!-- Font Selection -->
    <div class="w-full md:w-1/2 px-3">
        <h2 class="text-lg mt-4">{{ __('words.font_family') }}</h2>
        <select wire:model.live="font" class="w-full border p-2 rounded">
            <option value="Roboto">Roboto</option>
            <option value="Arial">Arial</option>
            <option value="Sans-serif">Sans-serif</option>
        </select>
    </div>
    <!-- language Selection -->
    <div class="w-full md:w-1/2 px-3">
        <h2 class="text-lg mt-4">{{ __('words.profile_language') }}</h2>
        <select wire:model.live="profile_lang" class="w-full border p-2 rounded">
            <option value="en">English</option>
            <option value="de">German</option>
        </select>
    </div>
</div>