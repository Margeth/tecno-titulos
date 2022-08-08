import AppForm from '../app-components/Form/AppForm';

Vue.component('academic-degree-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                id_entity:  '' ,
                id_type:  '' ,
                name:  '' ,
                
            }
        }
    }

});