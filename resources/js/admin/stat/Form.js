import AppForm from '../app-components/Form/AppForm';

Vue.component('stat-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});