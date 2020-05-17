<template>
    <div class="w-full" @drop="dropHandler($event)">
        <div class="relative mt-4 mb-4">
            <div class="border p-12 border-2 border-gray-400 border-dashed texy-white w-full relative">
                Drag and Drop your file here
            </div>
            <input class="cursor-pointer p-12 z-20 absolute block opacity-0 top-0 left-0" 
                @change="handleFiles($event)"
                type="file" :multiple="multiple"
            />
          
            <div class="mt-3">

                <div v-for="(file, index) in mediaCollection" :key="index">
                    <div class="rounded-md relative p-3 w-1/3 border">
                        <img class="h-24" :src="file.path.url" />
                        <div class="hidden">
                            <input type="hidden" 
                                v-if="!multiple"
                                :name="name" 
                                v-model="file.id" />
                        </div>
                        <a href="#" @click.prevent="deleteMedia(file)">
                         <div class="absolute mr-1 mb-1 bottom-0 right-0">
                             <svg fill="fillColor" class="h-6 w-6 text-red-300" viewBox="0 0 24 24">
                                <path d="M8 6V4c0-1.1.9-2 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8H3a1 1 0 1 1 0-2h5zM6 8v12h12V8H6zm8-2V4h-4v2h4zm-4 4a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1z"/>
                            </svg>
                         </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios'
    import filter from 'lodash/filter'
    const urls = {
        uploadUrl: '/admin/media/upload',
        deleteUrl: '/admin/media/'
    };
    export default {
        name: 'avored-upload',
        props: {
          path: {
              type: String
          },
          name: {
              type: String
          },
          value: {
              type: String,
              default: ''
          },
          multiple: {
              type: Boolean,
              default: false
          }
        },
        data() {
            return {
                files: [],
                mediaCollection: []
            }
        },
        computed: {
        },
        methods: {
            getName(file) {
                if (this.files.length > 1) {
                    return 'media[' + file.id + ']'
                }

                return 'media_id'
            },
            deleteMedia(file) {
                var app = this
                axios.delete(urls.deleteUrl + file.id)
                    .then(function (response) {
                        app.mediaCollection = filter(app.mediaCollection, function (ele) {
                            console.log(file.id, ele.id, 'here')
                            ele.id !== file.id
                        })
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            handleFiles(e) {
                for (const file of e.target.files) {
                    var app = this
                    let formData = new FormData();
                    formData.append("file", file)
                    formData.append('path', this.path)

                    axios.post(urls.uploadUrl, formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data; charset=utf-8; boundary=' + Math.random().toString().substr(2)
                        }
                    })
                    .then(function (response) {
                        app.mediaCollection.push(response.data.files)
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                   
                }
            },
            dropHandler(e) {
                e.preventDefault() 
            }
        },
        watch: {
            
        },
        mounted() {
            if (this.value) {
                this.mediaCollection.push(JSON.parse(this.value))
            }
        }
    }

</script>
