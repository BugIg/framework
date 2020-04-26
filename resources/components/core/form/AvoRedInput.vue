<template>
    <div>
        <input
            :name="name"
            :type="type"
            class="form-control"
            v-bind="$attrs"
            v-model="inputValue"
            @change="$emit('change', inputValue)"
        />
        <p v-if="hasErrors(name)" class="text-sm text-red-400 italic">{{ get(errors, name + '.0', '') }}</p>
    </div>
</template>


<script>
    import isNil from 'lodash/isNil'
    import get from 'lodash/get'

    export default {
        name: 'AInput',
        props: {
            value: [Number, String],
            type: { type: String, default: 'text' },
            name: { type: String },
            errors: {
                type: [Object, Array],
                default: function () {
                    return {}
                }
            }
        },
        data() {
            return {
                inputValue: this.value,
            }
        },
        computed: {
        },
        methods: {
            get,
            hasErrors(name) {
                if (!isNil(this.errors[name])) {
                    return true
                }
                return false
            }
        },
        watch: {
            value(value) {
                this.inputValue = value
            },
            inputValue: {
                handler(value) {
                    this.$emit('input', value)
                },
            },
        },
    }
</script>

<style>
</style>
