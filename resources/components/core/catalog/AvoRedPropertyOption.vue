<template>
    <div>
        <div 
            class="mt-1 sm:mt-0 sm:col-span-2 relative" 
            v-for="option in options"
            :key="'property-option-' + option.key"
        >
            <div class="max-w-lg flex rounded-md shadow-sm">
                <input
                    class="form-input flex-1 block w-full px-3 py-2 
                        focus:border-gray-200 focus:shadow-none rounded-none rounded-l-md 
                        sm:text-sm sm:leading-5 border-r-0"
                />
                <button class="inline-flex items-center cursor-pointer px-3 rounded-r-md border border-gray-300 bg-gray-50 text-gray-900 sm:text-sm">
                    + Add
                </button>
            </div>
        </div>
    </div>

</template>
<script>
export default {
    name: 'avored-property-option',
    props: {

    },
    methods() {
        
    },
    data() {
        return {
            options: []
        }
    },
    mounted() {
        this.options.push({
            key : 'option1'
        })
    }
}
</script>