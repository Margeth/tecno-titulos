import AppForm from '../app-components/Form/AppForm';

Vue.component('signer-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                id_minute:  '' ,
                code_user_academic_degre:  '' ,
                code:  '' ,
                id_step:  '' ,
                is_signed:  false ,
                
            }
        }
    }

});