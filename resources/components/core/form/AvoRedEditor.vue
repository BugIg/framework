<template>
    <div>
        <ck-editor
            :editor="editor"
            class="w-full"
            v-model="editorData"
           :config="editorConfig"
        >

        </ck-editor>
            <input type="hidden" :name="name" v-model="editorData" />
        <p v-if="hasErrors(name)" class="text-sm text-red-400 italic">{{ get(errors, name + '.0', '') }}</p>
    </div>
</template>

<script>
    import isNil from 'lodash/isNil'
    import get from 'lodash/get'
    import CKEditor from '@ckeditor/ckeditor5-vue'
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic'


    export default {
        name: 'AvoRedEditor',
        components: {
            'ck-editor': CKEditor.component
        },
        props: {
            value: {
                Number, String,
                default: () => {
                    return ''
                }
            },
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
                editor: ClassicEditor,
                editorData: this.value,
                editorConfig: {
                    width: '5000',
                    height: '25em',
                    toolbar: {
                        items: [
                            'bold',
                            'italic',
                            'link'
                        ]
                    }
                }
            }
        },
        mounted() {
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
                this.editorData = value
            },
            editorData: {
                handler(value) {
                    this.$emit('input', value)
                },
            },
        },
    }
</script>

<style>
</style>
