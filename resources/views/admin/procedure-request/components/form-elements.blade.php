<div class="form-group row alguard_nameign-items-center" :class="{'has-danger': errors.has('no_request'), 'has-success': fields.no_request && fields.no_request.valid }">
    <label for="no_request" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.procedure-request.columns.no_request') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.no_request" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('no_request'), 'form-control-success': fields.no_request && fields.no_request.valid}" id="no_request" name="no_request" placeholder="{{ trans('admin.procedure-request.columns.no_request') }}"  >
        <div v-if="errors.has('no_request')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('no_request') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_academic_degree'), 'has-success': fields.id_academic_degree && fields.id_academic_degree.valid }">
    <label for="id_academic_degree" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.procedure-request.columns.id_academic_degree') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.id_academic_degree" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_academic_degree'), 'form-control-success': fields.id_academic_degree && fields.id_academic_degree.valid}" id="id_academic_degree" name="id_academic_degree" placeholder="{{ trans('admin.procedure-request.columns.id_academic_degree') }}">
            <option v-for="(val,index) in data2" :key="index" :value="val['id']">@{{val['name']}}</option>
        </select>
        <div v-if="errors.has('id_academic_degree')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_academic_degree') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_request_state'), 'has-success': fields.id_request_state && fields.id_request_state.valid }">
    <label for="id_request_state" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.procedure-request.columns.id_request_state') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.id_request_state" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_request_state'), 'form-control-success': fields.id_request_state && fields.id_request_state.valid}" id="id_request_state" name="id_request_state" placeholder="{{ trans('admin.procedure-request.columns.id_request_state') }}"/>
            <option v-for="(val,index) in data3" :key="index" :value="val['id']">@{{val['name']}}</option>
        </select>
        <div v-if="errors.has('id_request_state')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_request_state') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_student'), 'has-success': fields.user_student && fields.user_student.valid }">
    <label for="user_student" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.procedure-request.columns.user_student') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_student" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_student'), 'form-control-success': fields.user_student && fields.user_student.valid}" id="user_student" name="user_student" placeholder="{{ trans('admin.procedure-request.columns.user_student') }}">
        <div v-if="errors.has('user_student')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_student') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_transcriber'), 'has-success': fields.user_transcriber && fields.user_transcriber.valid }">
    <label for="user_transcriber" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.procedure-request.columns.user_transcriber') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_transcriber" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_transcriber'), 'form-control-success': fields.user_transcriber && fields.user_transcriber.valid}" id="user_transcriber" name="user_transcriber" placeholder="{{ trans('admin.procedure-request.columns.user_transcriber') }}">
        <div v-if="errors.has('user_transcriber')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_transcriber') }}</div>
    </div>
</div>


