<a class="inline-block" href="{{ route('admin.product.edit', $model->id) }}">
    <img src="{{asset('vendor/avored/images/icons/icon-edit.svg') }}"
         alt="{{__('avored-admin::system.comms.edit') }}" />
</a>
<a
    class="inline-block"
    href="{{ route('admin.product.destroy', $model->id) }}"
    onclick="event.preventDefault();document.getElementById('admin-product-destroy-{{ $model->id }}').submit();"
>
    <img src="{{ asset('vendor/avored/images/icons/icon-trash.svg') }}"
         alt="{{ __('avored-admin::system.comms.destroy') }}" />

</a>
<form id="admin-product-destroy-{{ $model->id }}"
      action="{{ route('admin.product.destroy', $model->id) }}" method="POST"  class="hidden">
    @csrf
    @method('DELETE')
</form>
