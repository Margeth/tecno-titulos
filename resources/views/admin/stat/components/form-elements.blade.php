<div class="form-group row align-items-center" :class="{'has-danger': errors.has('page_name'), 'has-success': fields.page_name && fields.page_name.valid }">
    <label for="page_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.stat.columns.page_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.page_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('page_name'), 'form-control-success': fields.page_name && fields.page_name.valid}" id="page_name" name="page_name" placeholder="{{ trans('admin.stat.columns.page_name') }}">
        <div v-if="errors.has('page_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('page_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('count'), 'has-success': fields.count && fields.count.valid }">
    <label for="count" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.stat.columns.count') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.count" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('count'), 'form-control-success': fields.count && fields.count.valid}" id="count" name="count" placeholder="{{ trans('admin.stat.columns.count') }}">
        <div v-if="errors.has('count')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('count') }}</div>
    </div>
</div>


