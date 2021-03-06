 <div class="mt-3 flex w-full">
    <avored-input
        label-text="{{ __('avored::system.admin-user.first_name') }}"
        field-name="first_name"
        init-value="{{ $adminUser->first_name ?? '' }}" 
        error-text="{{ $errors->first('first_name') }}"
    >
    </avored-input>
</div>

<div class="mt-3 flex w-full">
    <avored-input
        label-text="{{ __('avored::system.admin-user.last_name') }}"
        field-name="last_name"
        init-value="{{ $adminUser->last_name ?? '' }}" 
        error-text="{{ $errors->first('last_name') }}"
    >
    </avored-input>
</div>


<div class="mt-3 flex w-full">
    <avored-toggle
        label-text="{{ __('avored::system.admin-user.is_super_admin') }}"
        error-text="{{ $errors->first('is_super_admin') }}"
        field-name="is_super_admin"
        init-value="{{ $adminUser->is_super_admin ?? '' }}"
    >
    </avored-toggle>
</div>

<div class="mt-3 flex w-full">
    <avored-input
        label-text="{{ __('avored::system.admin-user.email') }}"
        field-name="email"
        init-value="{{ $adminUser->email ?? '' }}" 
        error-text="{{ $errors->first('email') }}"
        :is-disabled="true"
    >
    </avored-input>
</div>

<a-form-item
    @if ($errors->has('image_file'))
        validate-status="error"
        help="{{ $errors->first('image_file') }}"
    @endif
    label="{{ __('avored::system.admin-user.image_file') }}"
>
    <a-upload 
        name="image_file"
        :default-file-list="userImageList"
        :multiple="false"
        list-type="picture"
        action="{{ route('admin.admin-user-image-upload') }}" 
        :headers="headers"
        v-on:change="handleUploadImageChange">
        <a-button>
        <a-icon type="upload"></a-icon> Click to Upload
        </a-button>
    </a-upload>
</a-form-item>
<input type="hidden" name="image_path" v-model="image_path" />

@if (!isset($adminUser))

    <div class="mt-3 flex w-full">
        <avored-input
            label-text="{{ __('avored::system.admin-user.password') }}"
            field-name="password"
            type="password"
            init-value="{{ $adminUser->password ?? '' }}" 
            error-text="{{ $errors->first('password') }}"
        >
        </avored-input>
    </div>
    <div class="mt-3 flex w-full">
        <avored-input
            label-text="{{ __('avored::system.admin-user.password_confirmation') }}"
            field-name="password_confirmation"
            type="password_confirmation"
            init-value="{{ $adminUser->password_confirmation ?? '' }}" 
            error-text="{{ $errors->first('password_confirmation') }}"
        >
        </avored-input>
    </div>
@endif



<div class="mt-3 w-full">
    <avored-select
        label-text="{{ __('avored::system.admin-user.language') }}"
        error-text="{{ $errors->first('language') }}"
        field-name="language"
        :options="{{ json_encode($languageOptions) }}"
        init-value="{{ $adminUser->language ?? '' }}"
    >
    </avored-select>
</div>

<div class="mt-3 mb-6 w-full">
    <avored-select
        label-text="{{ __('avored::system.admin-user.role_id') }}"
        error-text="{{ $errors->first('role_id') }}"
        field-name="role_id"
        :options="{{ json_encode($roleOptions) }}"
        init-value="{{ $adminUser->role_id ?? '' }}"
    >
    </avored-select>
</div>
