import AppForm from '../app-components/Form/AppForm';

Vue.component('requirement-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                quantity:  '' ,
                observation:  '' ,
                
            }
        }
    }

});