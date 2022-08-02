import AppForm from '../app-components/Form/AppForm';

Vue.component('user-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                ci:  '' ,
                phone:  '' ,
                address:  '' ,
                date_bird:  '' ,
                gender:  '' ,
                country:  '' ,
                city:  '' ,
                province:  '' ,
                email:  '' ,
                email_verified_at:  '' ,
                password:  '' ,
                
            }
        }
    }

});