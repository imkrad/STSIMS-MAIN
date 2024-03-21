<template>
    <b-modal v-model="showModal" header-class="p-3 bg-light" title="API Key" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <div v-if="user">
            <div class="mt-1 mb-n3">
                 <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <label>Api Key:</label>
                        <div class="position-relative auth-pass-inputgroup mb-3">
                                <input :type="(!showPassword) ? 'password' : 'text'" v-model="token" class="form-control pe-5" placeholder="Generate new Token"
                                id="password-input" />
                                <b-button @click="toggle" variant="link" class="position-absolute end-0 top-0 text-decoration-none text-muted"
                                type="button" id="password-addon">
                                <i class="ri-eye-fill align-middle"></i>
                                </b-button>
                                <div class="invalid-feedback">
                                <span></span>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
export default {
    data(){
        return {
            currentUrl: window.location.origin,
            user: {},
            form: {},
            token: null,
            type: null,
            showModal: false,
            showPassword: false
        }
    },
    methods: { 
        show(data){
            this.user = data;
            this.showModal = true;
        },
        submit(){
            axios.get(this.currentUrl + '/utility/users',{
                params : {
                    id: this.user.id,
                    option: 'token'
                }
            })
            .then(response => {
                this.token = response.data;
            })
            .catch(error => {
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors;
                }
            });
        },
        toggle(){
            if(this.showPassword){
                this.showPassword = false;
            }else{
                this.showPassword = true;
            }
        },
        hide(){
            this.user = {};
            this.showModal = false;
        }
    }
}
</script>