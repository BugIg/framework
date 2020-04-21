<template>
    <div class="mt-4" @click="onToggleClick()">
        <span role="checkbox"
                tabindex="0"
                :aria-checked="checked"
                class="bg-gray-200 relative inline-block flex-shrink-0 h-6 w-12 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline"
                :class="toggleWrap"
        >
            <span
                aria-hidden="true"
                class="inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200"
                :class="toggleClass"
            ></span>
        </span>
        <input
            :id="identifier"
            type="hidden"
            :value="checked"
            :name="checkboxName"  />
        {{ label }}

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
            routeName: ''
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
            getName() {
                return 'permissions['+ this.routeName +']'
            },
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
