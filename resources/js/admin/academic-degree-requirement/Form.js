import AppForm from '../app-components/Form/AppForm';

Vue.component('academic-degree-requirement-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                id_type_academic_degree:  '' ,
                id_requirement:  '' ,
                
            }
        }
    }

});