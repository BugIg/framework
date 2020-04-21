<a class="inline-block" href="{{ route('admin.category.edit', $model->id) }}">
    <img src="{{asset('vendor/avored/images/icons/icon-edit.svg') }}"
         alt="{{__('avored::system.comms.edit') }}" />
</a>
<a
    class="inline-block"
    href="{{ route('admin.category.destroy', $model->id) }}"
    onclick="event.preventDefault();document.getElementById('admin-category-destroy-{{ $model->id }}').submit();"
>
    <img src="{{ asset('vendor/avored/images/icons/icon-trash.svg') }}"
         alt="{{ __('avored::system.comms.destroy') }}" />

</a>
<form id="admin-category-destroy-{{ $model->id }}"
      action="{{ route('admin.category.destroy', $model->id) }}" method="POST"  class="hidden">
    @csrf
    @method('DELETE')
</form>