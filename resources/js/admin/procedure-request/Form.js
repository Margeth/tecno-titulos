import AppForm from '../app-components/Form/AppForm';

Vue.component('procedure-request-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                no_request:  '' ,
                id_academic_degree:  '' ,
                id_request_state:  '' ,
                user_student:  '' ,
                user_transcriber:  '' ,
                
            }
        }
    }

});