<script>

    export default {

        data() {
            return {
                userDropdown: false
            }
        },
        methods: {
            userDropdownClick(e) {
                console.log(e.target)
                if (this.userDropdown) {
                    this.userDropdown = false
                } else{
                    this.userDropdown = true
                }
            }
        }

    }
</script>

<style>
</style>
