@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.role-has-permission.actions.edit', ['name' => $roleHasPermission->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <role-has-permission-form
                :action="'{{ $roleHasPermission->resource_url }}'"
                :data="{{ $roleHasPermission->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.role-has-permission.actions.edit', ['name' => $roleHasPermission->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.role-has-permission.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </role-has-permission-form>

        </div>
    
</div>

@endsection