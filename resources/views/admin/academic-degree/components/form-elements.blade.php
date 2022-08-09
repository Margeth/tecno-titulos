<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_entity'), 'has-success': fields.id_entity && fields.id_entity.valid }">
    <label for="id_entity" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.academic-degree.columns.id_entity') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_entity" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_entity'), 'form-control-success': fields.id_entity && fields.id_entity.valid}" id="id_entity" name="id_entity" placeholder="{{ trans('admin.academic-degree.columns.id_entity') }}">
        <div v-if="errors.has('id_entity')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_entity') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_type'), 'has-success': fields.id_type && fields.id_type.valid }">
    <label for="id_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.academic-degree.columns.id_type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_type" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_type'), 'form-control-success': fields.id_type && fields.id_type.valid}" id="id_type" name="id_type" placeholder="{{ trans('admin.academic-degree.columns.id_type') }}">
        <div v-if="errors.has('id_type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_type') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.academic-degree.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.academic-degree.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>


