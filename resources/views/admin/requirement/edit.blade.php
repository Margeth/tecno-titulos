@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.requirement.actions.edit', ['name' => $requirement->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <requirement-form
                :action="'{{ $requirement->resource_url }}'"
                :data="{{ $requirement->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.requirement.actions.edit', ['name' => $requirement->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.requirement.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </requirement-form>

        </div>
    
</div>

@endsection