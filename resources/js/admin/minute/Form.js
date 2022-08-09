import AppForm from '../app-components/Form/AppForm';

Vue.component('minute-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                no_request:  '' ,
                
            }
        }
    }

});