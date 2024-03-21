<template>
    <b-modal v-model="showModal" header-class="p-3 bg-light" :title="(!editable) ? 'Create Agency' : 'Edit Agency'" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
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
                            <Bcol lg="12" class="mt-1">
                                <InputLabel for="name" value="Name"/>
                                <TextInput id="name" v-model="form.name" type="text" class="form-control" autofocus placeholder="Please enter name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" @input="handleInput('name')" :light="true"/>
                                <InputError :message="form.errors.name" />
                            </BCol>
                            <BCol lg="6" class="mt-0">
                                <InputLabel for="acronym" value="Acronym"/>
                                <TextInput id="acronym" v-model="form.acronym" type="text" class="form-control" autofocus placeholder="Please enter acronym" autocomplete="acronym" required :class="{ 'is-invalid': form.errors.acronym }" @input="handleInput('acronym')" :light="true"/>
                                <InputError :message="form.errors.acronym" />
                            </BCol>
                            <BCol lg="6" class="mt-0">
                                <InputLabel for="code" value="Code"/>
                                <TextInput id="code" v-model="form.code" type="text" class="form-control" autofocus placeholder="Please enter code" autocomplete="code" required :class="{ 'is-invalid': form.errors.code }" @input="handleInput('code')" :light="true"/>
                                <InputError :message="form.errors.code" />
                            </BCol>
                            <Bcol lg="12" class="mt-0">
                                <InputLabel for="website" value="Website"/>
                                <TextInput id="website" v-model="form.website" type="text" class="form-control" autofocus placeholder="Please enter website" autocomplete="website" required :class="{ 'is-invalid': form.errors.website }" @input="handleInput('website')" :light="true"/>
                                <InputError :message="form.errors.website" />
                            </BCol>
                            <Bcol lg="12" class="mt-0 mb-2">
                                <InputLabel for="region" value="Region" />
                                <Multiselect :options="regions" v-model="form.region_code" :message="form.errors.region_code" placeholder="Select Region"/>
                                <InputError :message="form.errors.region_code" />
                            </Bcol>
                            <BCol lg="12"><hr class="text-muted mt-n1 mb-n4"/></BCol>
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
import _ from 'lodash';
import { useForm } from '@inertiajs/vue3';
import Multiselect from '@/Shared/Components/Forms/Multiselect.vue';
import InputError from '@/Shared/Components/Forms/InputError.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { InputError, InputLabel, TextInput, Multiselect },
    props: ['regions'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                name: null,
                acronym: null,
                code: null,
                website: null,
                region_code: null
            }),
            schools: [],
            courses: [],
            showModal: false,
            editable: false
        }
    },
    methods: { 
        show(){
            this.showModal = true;
        },
        edit(data){
            const r = this.regions.filter(region => region.value === data.region.code);
            this.form.id = data.id
            this.form.name = data.name;
            this.form.acronym = data.acronym;
            this.form.code = data.code;
            this.form.website = data.website;
            this.form.region_code = r[0];
            this.editable = true;
            this.showModal = true;
            console.log(this.form.region_code);
        },
        submit(){
            if(this.editable){
                this.form.put('/lists/agencies/update',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.hide();
                    }
                });
            }else{
                this.form.post('/lists/agencies',{
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
<style scoped>
.multiselect-search {
  background: #f5f6f7 !important;
}
</style>