<template>
    <b-modal v-model="showModal" header-class="p-3 bg-light" :title="(!editable) ? 'Create User' : 'Edit User'" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow>
                <BCol lg="12">
                    <div>
                        <h6 class="mb-1">General Information</h6>
                        <p class="text-muted fs-11 mt-n1">Please ensure the user's profile information is accurate and valid. </p>
                    </div>
                    <div>
                        <BRow class="g-3">
                            <BCol lg="12"><hr class="text-muted mt-n1 mb-n4"/></BCol>
                            <BCol lg="6" class="mt-1">
                                <InputLabel for="firstname" value="Firstname" />
                                <TextInput id="firstname" v-model="form.firstname" type="text" class="form-control" autofocus placeholder="Please enter firstname" autocomplete="firstname" required :class="{ 'is-invalid': form.errors.firstname }" @input="handleInput('firstname')" :light="true" />
                                <InputError :message="form.errors.firstname" />
                            </BCol>
                            <BCol lg="6" class="mt-1">
                                <InputLabel for="lastname" value="Lastname" />
                                <TextInput id="lastname" v-model="form.lastname" type="text" class="form-control" autofocus placeholder="Please enter lastname" autocomplete="lastname" required :class="{ 'is-invalid': form.errors.lastname }" @input="handleInput('lastname')" :light="true"/>
                                <InputError :message="form.errors.lastname" />
                            </BCol>
                            <BCol lg="12"><hr class="text-muted mt-n1 mb-n4"/></BCol>
                            <BCol lg="12" class="mt-1 mb-n3">
                                <InputLabel for="email" value="Email" />
                                <TextInput id="email" v-model="form.email" type="email" class="form-control" autofocus placeholder="Please enter email" autocomplete="email" required :class="{ 'is-invalid': form.errors.email }" @input="handleInput('email')" :light="true"/>
                                <InputError :message="form.errors.email" />
                            </BCol>
                            <BCol lg="6">
                                <InputLabel for="username" value="Username" />
                                <TextInput id="username" v-model="form.username" type="text" class="form-control" autofocus placeholder="Please enter username" autocomplete="email" required :class="{ 'is-invalid': form.errors.username }" @input="handleInput('username')" :light="true"/>
                                <InputError :message="form.errors.username" />
                            </BCol>
                            
                            <BCol lg="6">
                                <InputLabel for="mobile" value="Mobile" />
                                <TextInput id="mobile" v-model="form.mobile" type="text" class="form-control" autofocus placeholder="Please enter mobile" autocomplete="mobile" required :class="{ 'is-invalid': form.errors.mobile }" @input="handleInput('mobile')" :light="true"/>
                                <InputError :message="form.errors.mobile" />
                            </BCol>
                            <BCol lg="12"><hr class="text-muted mt-n1 mb-n3"/></BCol>
                            <BCol lg="6"  style="margin-top: 13px; margin-bottom: -12px;">
                               <div class="row">
                                    <div class="col-md-4">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio1" class="custom-control-input me-2" value="Male" v-model="form.gender">
                                            <label class="custom-control-label fw-normal fs-12" for="customRadio1">Male</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio2" class="custom-control-input me-2" value="Female" v-model="form.gender">
                                            <label class="custom-control-label fw-normal fs-12" for="customRadio2">Female</label>
                                        </div>
                                    </div>
                                </div>
                            </BCol>
                            <BCol lg="12"><hr class="text-muted mt-n1 mb-n3"/></BCol>
                        </BRow>
                    </div>    
                </BCol>
            </BRow>
        </form>
          <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Shared/Components/Forms/InputError.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { InputError, InputLabel, TextInput },
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                firstname: null,
                lastname: null,
                username: null,
                email: null,
                mobile: null,
                gender: null,
                profile_id: null
            }),
            showModal: false,
            editable: false
        }
    },
    methods: { 
        show(){
            this.showModal = true;
        },
        edit(data){
            this.form.id = data.id;
            this.form.email = data.email;
            this.form.firstname = data.firstname;
            this.form.lastname = data.lastname;
            this.form.username = data.username;
            this.form.mobile = data.mobile;
            this.form.gender = data.gender;
            this.form.profile_id = data.profile_id,
            this.editable = true;
            this.showModal = true;
        },
        submit(){
            if(this.editable){
                this.form.put('/utility/users/update',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.hide();
                    },
                });
            }else{
                this.form.post('/utility/users',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.hide();
                    },
                });
            }
        },
        handleInput(field) {
            this.form.errors[field] = false;
        },
        hide(){
            this.form.reset();
            this.form.clearErrors();
            this.editable = false;
            this.showModal = false;
        }
    }
}
</script>