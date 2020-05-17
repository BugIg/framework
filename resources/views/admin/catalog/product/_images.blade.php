
<x-avored-field
    label="avored-admin::system.comms.name"
    for="images"
>
     <avored-upload 
            name="media[]"
            path="catalog/products"
            :multiple="true"
            :init-media-collection="{{ isset($product->images) ?  json_encode($product->images) : '{}' }}"
            upload-url="{{ route('admin.upload.post') }}"
    ></avored-upload>


</x-avored-field>