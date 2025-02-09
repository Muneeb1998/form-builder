<div class="relative mt-4" x-data="{
    custom_fields: @entangle('custom_fields'),
    open: false,
    addField(type) {
    console.log(this.custom_fields)
        // Add a new field and sync with Livewire
        this.open = false;
        // Sync with Livewire
        $wire.call('addField', type);
    },
    updateField(type, value, index) {
        if (value !== '') {
            // Update the field and sync with Livewire
            this.custom_fields = this.custom_fields.map((field, i) => 
                i === index ? { ...field, value } : field
            );
            this.open = false;
            $wire.call('updateField', type, value, index);
        }
    },
    removeField(index) {
        $wire.call('removeField', index);
    }
}">
    <!-- Loop through fields -->
    <template x-for="(field, index) in custom_fields" :key="index">
        <div class="mt-4 flex items-center justify-between  px-3">
            <input :type="field.type"
                   x-model="field.value"
                   @blur="updateField(field.type, $event.target.value, index)"
                   class="w-full border p-2 rounded" 
                   placeholder="Custom Field">
            <button type="button" 
                    @click="removeField(index)" 
                    class="text-red-500 ml-2">X</button>
        </div>
    </template>

    <!-- Add New Field Button -->
    <div class="px-3">
        <button type="button" @click="open = !open" class="border border-dotted border-blue-500 w-fit mb-5 text-blue-500 px-6 py-2.5 mt-4">
            + {{ __('words.add_new_field') }}
            <i class="bx bx-chevron-down"></i>
        </button>
    </div>

    <!-- Dropdown -->
    <div x-show="open" class="absolute z-10 bg-white rounded-lg shadow-sm w-60 dark:bg-gray-700">
        <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200">
            <li @click="addField('text')" class="cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Text Field
            </li>
            <li @click="addField('email')" class="cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Email Field
            </li>
            <li @click="addField('number')" class="cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Number Field
            </li>

            <li @click="addField('password')" class="cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Password Field
            </li>
        </ul>
    </div> 
</div>