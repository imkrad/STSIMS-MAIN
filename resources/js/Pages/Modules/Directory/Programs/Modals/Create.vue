<template>
    <b-modal v-model="showModal" header-class="p-3 bg-light" :title="(!editable) ? 'Create Program' : 'Edit Program'" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow>
                <BCol lg="12">
                    <div>
                        <h6 class="mb-1">General Information</h6>
                        <p class="text-muted fs-11 mt-n1">A structured program of study offered by an educational institution.</p>
                    </div>
                    <div>
                        <BRow class="g-3">
                            <BCol lg="12"><hr class="text-muted mt-n1 mb-n4"/></BCol>
                            <BCol lg="12" class="mt-1 mb-n1">
                                <InputLabel for="name" value="Name" />
                                <TextInput id="name" v-model="form.name" type="text" class="form-control" autofocus placeholder="Please enter role name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" @input="handleInput('name')" :light="true"/>
                                <InputError :message="form.errors.name" />
                            </BCol>
                            <BCol lg="12" class="mt-1">
                                <InputLabel for="others" value="Others" />
                                <TextInput id="others" v-model="form.others" type="text" class="form-control" autofocus placeholder="Please enter others" autocomplete="others" required :class="{ 'is-invalid': form.errors.others }" @input="handleInput('others')" :light="true"/>
                                <InputError :message="form.errors.others" />
                            </BCol>
                            <BCol lg="12"><hr class="text-muted mt-0 mb-n3"/></BCol>
                            <BCol lg="8"  style="margin-top: 13px; margin-bottom: -12px;" class="fs-12">Is sub-program?</BCol>
                            <BCol lg="4"  style="margin-top: 13px; margin-bottom: -12px;">
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio1" class="custom-control-input me-2" :value="true" v-model="form.is_sub">
                                            <label class="custom-control-label fw-normal fs-12" for="customRadio1">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio2" class="custom-control-input me-2" :value="false" v-model="form.is_sub">
                                            <label class="custom-control-label fw-normal fs-12" for="customRadio2">No</label>
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
                name: null,
                others: null,
                is_active: null,
                is_sub: null
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
            this.form.id = data.id
            this.form.name = data.name;
            this.form.others = data.others;
            this.form.is_sub = (data.is_sub) ? true : false;
            this.form.is_active = data.is_active;
            this.editable = true;
            this.showModal = true;
        },
        submit(){
            if(this.editable){
                this.form.put('/directory/programs/update',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.hide();
                    }
                });
            }else{
                this.form.post('/directory/programs',{
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