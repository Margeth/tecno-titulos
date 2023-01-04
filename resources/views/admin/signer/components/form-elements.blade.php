<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_minute'), 'has-success': fields.id_minute && fields.id_minute.valid }">
    <label for="id_minute" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.signer.columns.id_minute') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_minute" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_minute'), 'form-control-success': fields.id_minute && fields.id_minute.valid}" id="id_minute" name="id_minute" placeholder="{{ trans('admin.signer.columns.id_minute') }}">
        <div v-if="errors.has('id_minute')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_minute') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('code_user_academic_degre'), 'has-success': fields.code_user_academic_degre && fields.code_user_academic_degre.valid }">
    <label for="code_user_academic_degre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.signer.columns.code_user_academic_degre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.code_user_academic_degre" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('code_user_academic_degre'), 'form-control-success': fields.code_user_academic_degre && fields.code_user_academic_degre.valid}" id="code_user_academic_degre" name="code_user_academic_degre" placeholder="{{ trans('admin.signer.columns.code_user_academic_degre') }}">
        <div v-if="errors.has('code_user_academic_degre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('code_user_academic_degre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('code'), 'has-success': fields.code && fields.code.valid }">
    <label for="code" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.signer.columns.code') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.code" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('code'), 'form-control-success': fields.code && fields.code.valid}" id="code" name="code" placeholder="{{ trans('admin.signer.columns.code') }}">
        <div v-if="errors.has('code')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('code') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_step'), 'has-success': fields.id_step && fields.id_step.valid }">
    <label for="id_step" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.signer.columns.id_step') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select type="text" v-model="form.id_step" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_step'), 'form-control-success': fields.id_step && fields.id_step.valid}" id="id_step" name="id_step" placeholder="{{ trans('admin.signer.columns.id_step') }}">
          <option v-for="(item,index) in data2" :key="index" :value="item['id']"> @{{item.name}}</option>
        </select>                 
        <div v-if="errors.has('id_step')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_step') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('is_signed'), 'has-success': fields.is_signed && fields.is_signed.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="is_signed" type="checkbox" v-model="form.is_signed" v-validate="''" data-vv-name="is_signed"  name="is_signed_fake_element">
        <label class="form-check-label" for="is_signed">
            {{ trans('admin.signer.columns.is_signed') }}
        </label>
        <input type="hidden" name="is_signed" :value="form.is_signed">
        <div v-if="errors.has('is_signed')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_signed') }}</div>
    </div>
</div>


