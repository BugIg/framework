<script>

import isNil from 'lodash/isNil'

const label = {
    ADD: 'Add',
    REMOVE: 'Remove'
}
export default {
    name: 'avored-attribute-option',
    props: ['propAttribute'],
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
            options: [],
            displayOptions: false
        }
    },
    mounted() {

        if(isNil(this.propAttribute) || this.propAttribute.dropdown_options.length <= 0) {
            let optionKey = this.randomString()
            this.options.push({
                key : optionKey,
                value: ''
            })
        } else {
            console.log(this.propAttribute, 'here')
            this.propAttribute.dropdown_options.forEach((ele) => {
                this.options.push({
                    key: ele.id,
                    value: ele.display_text
                })
            })
        }



    }
}
</script>
