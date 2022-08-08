import AppForm from '../app-components/Form/AppForm';

Vue.component('entity-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                code:  '' ,
                name:  '' ,
                
            }
        }
    }

});