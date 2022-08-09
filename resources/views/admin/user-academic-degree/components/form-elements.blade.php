<div class="form-group row align-items-center" :class="{'has-danger': errors.has('no_request'), 'has-success': fields.no_request && fields.no_request.valid }">
    <label for="no_request" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user-academic-degree.columns.no_request') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.no_request" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('no_request'), 'form-control-success': fields.no_request && fields.no_request.valid}" id="no_request" name="no_request" placeholder="{{ trans('admin.user-academic-degree.columns.no_request') }}">
        <div v-if="errors.has('no_request')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('no_request') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('code_academic_degree'), 'has-success': fields.code_academic_degree && fields.code_academic_degree.valid }">
    <label for="code_academic_degree" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user-academic-degree.columns.code_academic_degree') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.code_academic_degree" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('code_academic_degree'), 'form-control-success': fields.code_academic_degree && fields.code_academic_degree.valid}" id="code_academic_degree" name="code_academic_degree" placeholder="{{ trans('admin.user-academic-degree.columns.code_academic_degree') }}">
        <div v-if="errors.has('code_academic_degree')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('code_academic_degree') }}</div>
    </div>
</div>


