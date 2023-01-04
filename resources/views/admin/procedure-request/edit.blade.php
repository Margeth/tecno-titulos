@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.procedure-request.actions.edit', ['name' => $procedureRequest->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <procedure-request-form
                :action="'{{ $procedureRequest->resource_url }}'"
                :data="{{ $procedureRequest->toJson() }}" 
                :data2="{{$data2}}"
                :data3="{{$data3}}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.procedure-request.actions.edit', ['name' => $procedureRequest->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.procedure-request.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </procedure-request-form>

        </div>
    
</div>

@endsection