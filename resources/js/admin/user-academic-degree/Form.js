import AppForm from '../app-components/Form/AppForm';

Vue.component('user-academic-degree-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                no_request:  '' ,
                code_academic_degree:  '' ,
                
            }
        }
    }

});