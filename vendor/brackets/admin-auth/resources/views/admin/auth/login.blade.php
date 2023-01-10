@extends('brackets/admin-ui::admin.layout.master')

@section('title', trans('brackets/admin-auth::admin.login.title'))

@section('content')
<style>
	.main {
		text-align: right;
		font-size: 17px;
		font-weight: bold;
		text-decoration-line: underline;
		text-decoration-color: rgb(2, 173, 216);
		margin: 20px 0px 10px 5px;
		}
</style>
	<div class="container" id="app">
		<div class="main">
			<a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Inicio</a>
		</div>
		
	    <div class="row align-items-center justify-content-center auth">
	        <div class="col-md-6 col-lg-5">
				<div class="card">
					<div class="card-block">
						<auth-form
								:action="'{{ url('/admin/login') }}'"
								:data="{}"
								inline-template>
							<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}" novalidate>
								{{ csrf_field() }}
								<div class="auth-header">
									<h1 class="auth-title">{{ trans('brackets/admin-auth::admin.login.title') }}</h1>
									<p class="auth-subtitle">{{ trans('brackets/admin-auth::admin.login.sign_in_text') }}</p>
								</div>
								<div class="auth-body">
									@include('brackets/admin-auth::admin.auth.includes.messages')
									<div class="form-group" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
										<label for="email">{{ trans('brackets/admin-auth::admin.auth_global.email') }}</label>
										<div class="input-group input-group--custom">
											<div class="input-group-addon"><i class="input-icon input-icon--mail"></i></div>
											<input type="text" v-model="form.email" v-validate="'required|email'" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('brackets/admin-auth::admin.auth_global.email') }}">
										</div>
										<div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
									</div>

									<div class="form-group" :class="{'has-danger': errors.has('password'), 'has-success': fields.password && fields.password.valid }">
										<label for="password">{{ trans('brackets/admin-auth::admin.auth_global.password') }}</label>
										<div class="input-group input-group--custom">
											<div class="input-group-addon"><i class="input-icon input-icon--lock"></i></div>
											<input type="password" v-model="form.password"  class="form-control" :class="{'form-control-danger': errors.has('password'), 'form-control-success': fields.password && fields.password.valid}" id="password" name="password" placeholder="{{ trans('brackets/admin-auth::admin.auth_global.password') }}">
										</div>
										<div v-if="errors.has('password')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('password') }}</div>
									</div>

									<div class="form-group">
										<input type="hidden" name="remember" value="1">
										<button type="submit" class="btn btn-primary btn-block btn-spinner"><i class="fa"></i> {{ trans('brackets/admin-auth::admin.login.button') }}</button>
									</div>
									<div class="form-group text-center">
										<a href="{{ url('/admin/password-reset') }}" class="auth-ghost-link">{{ trans('brackets/admin-auth::admin.login.forgot_password') }}</a>
									</div>
								</div>
							</form>
						</auth-form>
					</div>
				</div>
	        </div>
	    </div>
	</div>
   
@endsection


@section('bottom-scripts')
<script type="text/javascript">
    // fix chrome password autofill
    // https://github.com/vuejs/vue/issues/1331
    document.getElementById('password').dispatchEvent(new Event('input'));
</script>
@endsection