@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.academic-degree-requirement.actions.edit', ['name' => $academicDegreeRequirement->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <academic-degree-requirement-form
                :action="'{{ $academicDegreeRequirement->resource_url }}'"
                :data="{{ $academicDegreeRequirement->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.academic-degree-requirement.actions.edit', ['name' => $academicDegreeRequirement->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.academic-degree-requirement.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </academic-degree-requirement-form>

        </div>
    
</div>

@endsection