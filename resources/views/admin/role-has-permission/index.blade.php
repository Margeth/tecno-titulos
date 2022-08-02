@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.role-has-permission.actions.index'))

@section('body')

    <role-has-permission-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/role-has-permissions') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.role-has-permission.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/role-has-permissions/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.role-has-permission.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">

                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">

                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>

                                        <th is='sortable' :column="'permission_id'">{{ trans('admin.role-has-permission.columns.permission_id') }}</th>
                                        <th is='sortable' :column="'role_id'">{{ trans('admin.role-has-permission.columns.role_id') }}</th>

                                        <th></th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.role_id" :class="bulkItems[item.role_id] ? 'bg-bulk' : ''">

                                        <td>@{{ item.permission_id }}</td>
                                        <td>@{{ item.role_id }}</td>

                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                </div>
                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </role-has-permission-listing>

@endsection
