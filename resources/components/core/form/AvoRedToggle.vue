<template>
    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:py-5 mt-5 md:mt-0"
        @click="onToggleClick"
    >
        <label class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            {{ label }}
        </label>

        <div role="checkbox"
              tabindex="0"
              :aria-checked="checked"
              class="bg-gray-200 relative inline-block mt-2 flex-shrink-0 h-6 w-12 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline"
              :class="toggleWrap"
        >
            <span
                aria-hidden="true"
                class="inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200"
                :class="toggleClass"
            ></span>
        </div>
        <input
            :id="checkboxName"
            type="hidden"
            :value="checked"
            :name="checkboxName"  />
    </div>
</template>

<script>

    export default {
        name: 'AvoRedToggle',
        props: {
            identifier: null,
            checkboxName: '',
            label: null,
            defaultValue: false,
        },
        data() {
            return {
                checked: false,
                toggleClass: '',
                toggleWrap: '',
            }
        },
        computed: {
        },
        methods: {
            onToggleClick() {
                if (this.checked) {
                    this.checked = 0
                } else {
                    this.checked = 1
                }

                if (this.checked) {
                    this.toggleWrap = 'bg-red-600'
                    this.toggleClass = 'translate-x-5'
                } else {
                    this.toggleWrap = ''
                    this.toggleClass = ''
                }
            },
        },
        mounted() {
            this.checked = this.defaultValue
            if (this.defaultValue) {
                this.toggleWrap = 'bg-red-600'
                this.toggleClass = 'translate-x-5'
            }
        },
    }
</script>
