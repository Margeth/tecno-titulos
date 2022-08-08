import AppForm from '../app-components/Form/AppForm';

Vue.component('type-academic-degree-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                
            }
        }
    }

});