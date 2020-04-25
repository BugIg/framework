<a class="inline-block" href="{{ route('admin.user-group.edit', $model->id) }}">
    <img src="{{asset('vendor/avored/images/icons/icon-edit.svg') }}"
         alt="{{__('avored::system.comms.edit') }}" />
</a>
<a
    class="inline-block"
    href="{{ route('admin.user-group.destroy', $model->id) }}"
    onclick="event.preventDefault();document.getElementById('admin-userGroup-destroy-{{ $model->id }}').submit();"
>
    <img src="{{ asset('vendor/avored/images/icons/icon-trash.svg') }}"
         alt="{{ __('avored::system.comms.destroy') }}" />

</a>
<form id="admin-userGroup-destroy-{{ $model->id }}"
      action="{{ route('admin.user-group.destroy', $model->id) }}" method="POST"  class="hidden">
    @csrf
    @method('DELETE')
</form>
