@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.academic-degree.actions.edit', ['name' => $academicDegree->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <academic-degree-form
                :action="'{{ $academicDegree->resource_url }}'"
                :data="{{ $academicDegree->toJson() }}"
                :data2="{{ $data2}}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.academic-degree.actions.edit', ['name' => $academicDegree->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.academic-degree.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </academic-degree-form>

        </div>
    
</div>

@endsection