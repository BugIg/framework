<template>
    <div>
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
                    {{ optionAction(i) }}
                </button>
            </div>
        </div>
    </div>

</template>
<script>
const label = {
    ADD: 'Add',
    REMOVE: 'Remove'
}
export default {
    name: 'avored-property-option',
    props: {
        propOptions: {
            type: Array
        }
    },
    methods: {
        randomString(stringLength = 6) {
            let str = 'abcdefghijklmnopqrstuvwxyz'
            return str.split('').sort(() =>  0.5-Math.random() ).join('').substring(0, stringLength);
        },
        performButtonAction(action, i) {
            if (action === label.ADD) {
                this.options.push({
                    key: this.randomString(),
                    value: ''
                });
            } else if(action === label.REMOVE) {
                this.options.splice(i, 1);
            }
        },
        optionAction(i) {
            if (i === 0 && (this.options.length - 1) === 0) {
                return label.ADD
            }

            if ((i === (this.options.length - 1))) {
                return label.ADD
            }
            return label.REMOVE
        },
    },
    data() {
        return {
            options: []
        }
    },
    mounted() {
        if(this.propOptions.length <= 0) {
            let optionKey = this.randomString()
            this.options.push({
                key : optionKey,
                value: ''
            })
        } else {
            this.propOptions.forEach((ele) => {
                this.options.push({
                    key: ele.id,
                    value: ele.display_text
                })
            })
        }



    }
}
</script>
