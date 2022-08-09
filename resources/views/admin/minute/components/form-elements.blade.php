<div class="form-group row align-items-center" :class="{'has-danger': errors.has('no_request'), 'has-success': fields.no_request && fields.no_request.valid }">
    <label for="no_request" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.minute.columns.no_request') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.no_request" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('no_request'), 'form-control-success': fields.no_request && fields.no_request.valid}" id="no_request" name="no_request" placeholder="{{ trans('admin.minute.columns.no_request') }}">
        <div v-if="errors.has('no_request')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('no_request') }}</div>
    </div>
</div>


