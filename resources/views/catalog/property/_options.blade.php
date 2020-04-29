<x-avored-field
    label="avored::system.comms.options"
>
    
        <div
            class="mt-3 sm:col-span-2 relative"
            v-for="(option, i) in options"
            :key="'property-option-' + option.key"
        >
            <div class="max-w-lg flex rounded-md shadow-sm">
                <input
                    :name="'dropdown_option['+ option.key +']'"
                    v-model="option.value"
                    class="form-input flex-1 block w-full px-3 py-2
                        focus:border-gray-200 focus:shadow-none rounded-none rounded-l-md
                        sm:text-sm sm:leading-5 border-r-0"
                />
                <button
                    type="button"
                    @click="performButtonAction(optionAction(i), i)"
                    class="inline-flex items-center cursor-pointer px-3 rounded-r-md border border-gray-300 bg-gray-50 text-gray-900 sm:text-sm">
                    @{{ optionAction(i) }}
                </button>
            </div>
        </div>
   

</x-avored-field>
