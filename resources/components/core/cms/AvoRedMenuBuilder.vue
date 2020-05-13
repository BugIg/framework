<template>
    <div>
        <div class="flex mt-3">
            <div class="w-1/2 pr-8">
                <div class="bg-white overflow-hidden sm:rounded-lg sm:shadow">
                    <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Category
                        </h3>
                    </div>
                    <ul>
                        <li>
                            <div  v-for="category in categories" :key="'category-id-' + category.id"
                                class="block">
                                <div class="px-4 py-4 flex items-center sm:px-6">
                                    <div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
                                        <div class="text-sm leading-5 font-medium text-red-600 truncate">
                                            {{ category.name }}
                                            <span class="ml-1 font-normal text-gray-500">
                                              {{ category.slug }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="ml-5 flex-shrink-0">
                                        <a href="#"
                                           class="hover:bg-gray-50 focus:outline-none focus:bg-gray-50"
                                           @click.prevent="moveRightOnclick(category, 'category')"
                                        >
                                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                      clip-rule="evenodd">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>


                <div class="mt-5 bg-white overflow-hidden sm:rounded-lg sm:shadow">
                    <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Front Menus
                        </h3>
                    </div>
                    <ul>
                        <li>
                            <div  v-for="frontMenu in frontMenus" :key="'frontMenu-id-' + frontMenu.id"
                                class="block">
                                <div class="px-4 py-4 flex items-center sm:px-6">
                                    <div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
                                        <div class="text-sm leading-5 font-medium text-red-600 truncate">
                                            {{ frontMenu.name }}
                                            <span class="ml-1 font-normal text-gray-500">
                                            {{ frontMenu.route }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="ml-5 flex-shrink-0">
                                        <a href="#"
                                        class="hover:bg-gray-50 focus:outline-none focus:bg-gray-50"
                                        @click.prevent="moveRightOnclick(frontMenu, 'frontMenu')"
                                        >
                                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

                <div class="w-1/2 pl-8">
                    <div class="bg-white overflow-hidden sm:rounded-lg sm:shadow">
                        <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Menu Items
                            </h3>
                        </div>
                        <ul>
                            <li>
                                <Tree :value="treeData">
                                    <div class="block border-b border-gray-500" slot-scope="{node}">
                                        <!-- available data for slot-scope="{node, index, path, tree}" -->
                                        <div class="px-4 py-4 flex items-center sm:px-6">
                                            <div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
                                                <div class="text-sm leading-5 font-medium text-red-600 truncate">
                                                    <span class="cursor-move">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-4 w-4 inline-block"
                                                            viewBox="0 0 24 24" fill="currentColor">
                                                            <path class="heroicon-ui" d="M5 3h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5h-4zM5 13h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4h-4z"/>
                                                        </svg>

                                                    </span>
                                                    <span class="inline-block ml-3">
                                                        {{ node.name }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </Tree>
                            </li>
                        </ul>
                    </div>
                </div>

            <input type="hidden" name="menu_tree" v-model="menu_tree" />
        </div>

    </div>
</template>

<script>
    import {
        Tree,
        Fold,
        Draggable
    } from 'he-tree-vue'


    export default {
        name: 'AvoRedMenuBuilder',
        components: {
            Tree: Tree.mixPlugins([Fold, Draggable])
        },
        props: {
            categories: {
                type: Array
            },
            frontMenus: {
                type: Array
            },
            categoryRouteName: {
                type: String
            },
            initTree: {
                type: Array
            }

        },
        data() {
            return {
                treeData: []
            }
        },
        mounted() {
           this.treeData = this.initTree
        },
        computed: {
          menu_tree() {
              return JSON.stringify(this.treeData)
          }
        },
        methods: {
            moveRightOnclick(menuItem, type = 'category') {
                let menu = {};
              
                if (type === 'category') {
                    menu = {
                        name: menuItem.name,
                        key: 'category-' + menuItem.slug,
                        route: this.categoryRouteName,
                        params: {
                            slug: menuItem.slug
                        }
                    }
                }
                if (type === 'frontMenu') {
                    menu = {
                        name: menuItem.name,
                        key: menuItem.key,
                        route: menuItem.route,
                        params: menuItem.params
                    }
                }
                this.treeData.push(menu)
            }
        },
        watch: {

        },
    }
</script>

<style>
</style>
