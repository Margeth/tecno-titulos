<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_type_academic_degree'), 'has-success': fields.id_type_academic_degree && fields.id_type_academic_degree.valid }">
    <label for="id_type_academic_degree" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.academic-degree-requirement.columns.id_type_academic_degree') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_type_academic_degree" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_type_academic_degree'), 'form-control-success': fields.id_type_academic_degree && fields.id_type_academic_degree.valid}" id="id_type_academic_degree" name="id_type_academic_degree" placeholder="{{ trans('admin.academic-degree-requirement.columns.id_type_academic_degree') }}">
        <div v-if="errors.has('id_type_academic_degree')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_type_academic_degree') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_requirement'), 'has-success': fields.id_requirement && fields.id_requirement.valid }">
    <label for="id_requirement" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.academic-degree-requirement.columns.id_requirement') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_requirement" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_requirement'), 'form-control-success': fields.id_requirement && fields.id_requirement.valid}" id="id_requirement" name="id_requirement" placeholder="{{ trans('admin.academic-degree-requirement.columns.id_requirement') }}">
        <div v-if="errors.has('id_requirement')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_requirement') }}</div>
    </div>
</div>


