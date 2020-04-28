<template>
    <div>
        <div 
            class="mt-3 sm:col-span-2 relative" 
            v-for="(option, i) in options"
            :key="'property-option-' + option.key"
        >
            <div class="max-w-lg flex rounded-md shadow-sm">
                <input
                    :name="'options['+ option.key +']'"
                    class="form-input flex-1 block w-full px-3 py-2 
                        focus:border-gray-200 focus:shadow-none rounded-none rounded-l-md 
                        sm:text-sm sm:leading-5 border-r-0"
                />
                <button 
                    type="button"
                    @click="addRow()"
                    class="inline-flex items-center cursor-pointer px-3 rounded-r-md border border-gray-300 bg-gray-50 text-gray-900 sm:text-sm">
                    {{ buttonLabel(i) }}
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
    methods: {
        randomString(stringLength = 6) {
            let str = 'abcdefghijklmnopqrstuvwxyz'
            return str.split('').sort(() =>  0.5-Math.random() ).join('').substring(0, stringLength);
        },
        addRow() {
            this.options.push({
                key: this.randomString()
            });
        },
        buttonLabel(i) {
            if (i === 0 && (this.options.length - 1) === 0) {
                return 'Add'
            }

            if ((i === (this.options.length - 1))) {
                return 'Add'
            }
            return 'Remove'
        }
    },
    data() {
        return {
            options: []
        }
    },
    mounted() {
        let optionKey = this.randomString()

        this.options.push({
            key : optionKey
        })
    }
}
</script>