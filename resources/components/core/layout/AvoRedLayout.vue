<script>

    export default {

        data() {
            return {
                sidebar: false
            }
        },
        methods: {
            sidebarClick() {
                this.sidebar = !this.sidebar
            },
            sidebarMenuClick(key) {
                const refs = this.$refs
                for (const ref in refs) {
                    if (ref.indexOf('sidebar-menu-') == 0) {
                        this.$refs[ref].className = 'hidden transition ease-out duration-500'
                    } 
                }
                this.$refs['sidebar-menu-' + key].className = ''
            }
        }

    }
</script>

<style>
</style>
