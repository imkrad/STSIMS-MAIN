<template>
    <b-modal v-model="showModal" size="lg" header-class="p-3 bg-light" :title="(!editable) ? 'Create School' : 'Edit School'" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
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
                            <BCol lg="12" class="mt-1 mb-0">
                                <InputLabel for="campus" value="School" />
                                <TextInput id="campus" v-model="form.campus" type="text" class="form-control" autofocus placeholder="Please enter campus" autocomplete="campus" required :class="{ 'is-invalid': form.errors.campus }" @input="handleInput('campus')" :light="true"/>
                                <InputError :message="form.errors.campus" />
                            </BCol>
                            <BCol lg="12"><hr class="text-muted mt-n1 mb-n4"/></BCol>
                            <BCol lg="4" class="mt-1 mb-n1">
                                <InputLabel for="campus" value="Campus" />
                                <TextInput id="campus" v-model="form.campus" type="text" class="form-control" autofocus placeholder="Please enter campus" autocomplete="campus" required :class="{ 'is-invalid': form.errors.campus }" @input="handleInput('campus')" :light="true"/>
                                <InputError :message="form.errors.campus" />
                            </BCol>
                             <BCol lg="4" class="mt-1">
                                <InputLabel for="term" value="Term Type" />
                                <Multiselect :options="dropdowns.terms" v-model="form.gender" :message="form.errors.term_id" placeholder="Select Term"/>
                                <InputError :message="form.errors.term_id" />
                            </BCol>
                             <BCol lg="4" class="mt-1">
                                <InputLabel for="grading" value="Grading Type" />
                                <Multiselect :options="dropdowns.gradings" v-model="form.gender" :message="form.errors.grading_id" placeholder="Select Grading"/>
                                <InputError :message="form.errors.grading_id" />
                            </BCol>
                            <!-- <BCol lg="4" class="mt-1 mb-n1">
                                <InputLabel for="address" value="Address" />
                                <TextInput id="address" v-model="form.address" type="text" class="form-control" autofocus placeholder="Please enter address" autocomplete="address" required :class="{ 'is-invalid': form.errors.address }" @input="handleInput('address')" :light="true"/>
                                <InputError :message="form.errors.address" />
                            </BCol> -->
                            <BCol lg="4" class="mt-1">
                                <InputLabel for="region" value="Region" />
                                <Multiselect :options="regions" v-model="form.region_code" :message="form.errors.region_code" placeholder="Select Region"/>
                                <InputError :message="form.errors.region_code" />
                            </BCol>
                            <BCol lg="4" class="mt-1">
                                <InputLabel for="province" value="Province" />
                                <Multiselect :options="provinces" v-model="form.province_code" :message="form.errors.province_code" placeholder="Select Province"/>
                                <InputError :message="form.errors.province_code" />
                            </BCol>
                            <BCol lg="4" class="mt-1">
                                <InputLabel for="municipality" value="Municipality" />
                                <Multiselect :options="municipalities" v-model="form.municipality_code" :message="form.errors.municipality_code" placeholder="Select Municipality"/>
                                <InputError :message="form.errors.municipality_code" />
                            </BCol>
                            <BCol lg="8" class="mt-1 mb-n1">
                                <InputLabel for="address" value="Address" />
                                <TextInput id="address" v-model="form.address" type="text" class="form-control" autofocus placeholder="Please enter address" autocomplete="address" required :class="{ 'is-invalid': form.errors.address }" @input="handleInput('address')" :light="true"/>
                                <InputError :message="form.errors.address" />
                            </BCol>
                            <BCol lg="4" class="mt-1">
                                <InputLabel for="assigned" value="Assigned Region" />
                                <Multiselect :options="regions" v-model="form.assigned_region" :message="form.errors.assigned_region" placeholder="Select Region" />
                                <InputError :message="form.errors.assigned_region" />
                            </BCol>
                            <BCol lg="12"><hr class="text-muted mt-1 mb-1"/></BCol>
                            <BCol lg="8"  style="margin-top: 13px; margin-bottom: -12px;" class="fs-12">Is the campus name the only affiliated with the school?</BCol>
                            <BCol lg="4"  style="margin-top: 13px; margin-bottom: -12px;">
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio1" class="custom-control-input me-2" :value="true" v-model="form.is_alone">
                                            <label class="custom-control-label fw-normal fs-12" for="customRadio1">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio2" class="custom-control-input me-2" :value="false" v-model="form.is_alone">
                                            <label class="custom-control-label fw-normal fs-12" for="customRadio2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </BCol>
                            <BCol lg="12"><hr class="text-muted mt-n1 mb-n3"/></BCol>
                            <BCol lg="8"  style="margin-top: 13px; margin-bottom: -12px;" class="fs-12">Does your menu have a child menu?</BCol>
                            <BCol lg="4"  style="margin-top: 13px; margin-bottom: -12px;">
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio1" class="custom-control-input me-2" :value="true" v-model="form.is_main">
                                            <label class="custom-control-label fw-normal fs-12" for="customRadio1">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio2" class="custom-control-input me-2" :value="false" v-model="form.has_child">
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
import Multiselect from '@/Shared/Components/Forms/Multiselect.vue';
import InputError from '@/Shared/Components/Forms/InputError.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { InputError, InputLabel, TextInput, Multiselect },
    props: ['regions','dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                campus: null,
                address: null,
                region_code: null,
                province_code: null,
                municipality_code: null,
                assigned_region: null,
                is_main: null,
                is_alone: null,
                school_id: null
            }),
            provinces: [],
            municipalities: [],
            showModal: false,
            editable: false
        }
    },
    watch: {
        'form.region_code'(){
            (this.form.region_code) ? this.fetchProvince(this.form.region_code) : '';
        },
        'form.province_code'(){
            (this.form.province_code) ? this.fetchMunicipality(this.form.province_code) : '';
        }
    },
    methods: { 
        show(){
            this.showModal = true;
        },
        edit(data){
            this.form.id = data.id
            this.form.address = data.address;
            this.form.campus = data.shortcut;
            this.form.abbreviation = data.abbreviation;
            this.form.others = data.others;
            this.editable = true;
            this.showModal = true;
        },
        submit(){
            if(this.editable){
                this.form.put('/directory/schools/update',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.hide();
                    }
                });
            }else{
                this.form.post('/directory/schools',{
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
        fetchProvince(code){
            axios.get('/lists/locations/',{
                params: {
                    option: 'list_province',
                    code: code
                }
            })
            .then(response => {
                this.provinces = response.data;
            })
            .catch(err => console.log(err));
        },
        fetchMunicipality(code){
            axios.get('/lists/locations/',{
                params: {
                    option: 'list_municipality',
                    code: code
                }
            })
            .then(response => {
                this.municipalities = response.data;
            })
            .catch(err => console.log(err));
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