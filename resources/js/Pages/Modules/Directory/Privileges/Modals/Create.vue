<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 700px;" header-class="p-3 bg-light" :title="(!editable) ? 'Create Privilege' : 'Edit Privilege'" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
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
                                <InputLabel for="name" value="Name" :message="form.errors.name"/>
                                <TextInput id="name" v-model="form.name" type="text" class="form-control" autofocus placeholder="Please enter privilege name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" @input="handleInput('name')" :light="true"/>
                            </BCol>
                            <BCol lg="6" class="mt-1">
                                <InputLabel for="type" value="Type" :message="form.errors.type"/>
                                <Multiselect :options="types" v-model="form.type" :message="form.errors.type" placeholder="Select type" ref="multitype"/>
                            </BCol>
                             <BCol lg="6" class="mt-1 mb-n1">
                                <InputLabel for="short" value="Short" :message="form.errors.short"/>
                                <TextInput id="short" v-model="form.short" type="text" class="form-control" autofocus placeholder="Please enter short name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" @input="handleInput('short')" :light="true"/>
                            </BCol>
                            <BCol lg="6" class="mt-2">
                                <InputLabel for="name" value="Regular Amount"/>
                                <Amount @amount="regular" ref="regular" :readonly="false" type="regular"/>
                            </BCol>
                            <BCol lg="6" class="mt-2">
                                <InputLabel for="name" value="Summer Amount"/>
                                <Amount @amount="summer" ref="summer" :readonly="false" type="summer"/>
                            </BCol>
                            <BCol lg="12"><hr class="text-muted mt-0 mb-n3"/></BCol>
                            <BCol lg="8"  style="margin-top: 13px; margin-bottom: -12px;" class="fs-12">Is fixed?</BCol>
                            <BCol lg="4"  style="margin-top: 13px; margin-bottom: -12px;">
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio1" class="custom-control-input me-2" :value="true" v-model="form.is_fixed">
                                            <label class="custom-control-label fw-normal fs-12" for="customRadio1">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio2" class="custom-control-input me-2" :value="false" v-model="form.is_fixed">
                                            <label class="custom-control-label fw-normal fs-12" for="customRadio2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </BCol>
                            <BCol lg="12"><hr class="text-muted mt-n1 mb-n3"/></BCol>
                            <BCol lg="8"  style="margin-top: 13px; margin-bottom: -12px;" class="fs-12">Is reimburseable?</BCol>
                            <BCol lg="4"  style="margin-top: 13px; margin-bottom: -12px;">
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio1" class="custom-control-input me-2" :value="true" v-model="form.is_reimburseable">
                                            <label class="custom-control-label fw-normal fs-12" for="customRadio1">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio2" class="custom-control-input me-2" :value="false" v-model="form.is_reimburseable">
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
import Amount from '@/Shared/Components/Forms/Amount.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
import Multiselect from '@/Shared/Components/Forms/Multiselect.vue';
export default {
    components: { InputLabel, TextInput, Multiselect, Amount },
    props: ['types'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                name: null,
                type: null,
                short: null,
                regular_amount: null,
                summer_amount: null,
                is_fixed: null,
                is_reimburseable: null
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
            this.form.short = data.short;
            this.$refs.multitype.emitSelectedValues(data.type);
            this.$refs.regular.emitValue(data.regular_amount);
            this.$refs.summer.emitValue(data.summer_amount);
            this.form.is_fixed = (data.is_fixed) ? true : false;
            this.form.is_reimburseable = (data.is_reimburseable) ? true : false;
            this.editable = true;
            this.showModal = true;
        },
        submit(){
            if(this.editable){
                this.form.put('/directory/privileges/update',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.hide();
                    }
                });
            }else{
                this.form.post('/directory/privileges',{
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
        regular(val){
            this.form.regular_amount = val;
        },
        summer(val){
            this.form.summer_amount = val;
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