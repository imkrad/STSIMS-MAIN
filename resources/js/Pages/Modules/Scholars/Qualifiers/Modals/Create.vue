<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 580px;" header-class="p-3 bg-light" :title="(!editable) ? 'Create Certification' : 'Edit Certification'" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
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
                            <BCol lg="12" class="mt-2 mb-0">
                                <!-- <Multiselect class="form-control" @search-change="checkSearchStr"
                                    placeholder="Select School" label="name" 
                                    v-model="form.school_id" :close-on-select="true" 
                                    :searchable="true" :options="schools"/>
                                <InputError :message="form.errors.school_id" /> -->
                                 <InputLabel for="region" value="School" />
                                <Multiselect  @search-change="checkSearchStr" :options="schools" label="name" :searchable="true" v-model="form.school_id" :message="form.errors.school_id" placeholder="Select School"/>
                                 <InputError :message="form.errors.school_id" />
                            </BCol>
                             <BCol lg="12" class="mt-2 mb-1">
                                 <InputLabel for="region" value="Course" />
                                <Multiselect class="form-control" @search-change="checkSearchStr2"
                                    placeholder="Select School" label="name"
                                    v-model="form.course_id" :close-on-select="true" 
                                    :searchable="true" :options="courses"/>
                                <InputError :message="form.errors.course_id" />
                            </BCol>
                            <BCol lg="12"><hr class="text-muted mt-n1 mb-n3"/></BCol>
                            <BCol lg="6" class="mt-1">
                                <InputLabel for="region" value="Certification" />
                                <Multiselect :options="certifications" v-model="form.certification_id" label="name" :message="form.errors.certification_id" placeholder="Select Certification"/>
                                <InputError :message="form.errors.certification_id" />
                            </BCol>
                            <BCol lg="6" class="mt-1 mb-2">
                                <InputLabel for="region" value="Years" />
                                <Multiselect :options="years" label="name" v-model="form.years" :message="form.errors.years" placeholder="Select Years"/>
                                <InputError :message="form.errors.years" />
                            </BCol>
                            <BCol lg="6" class="mt-n1">
                                <InputLabel for="start_at" value="Start At" />
                                <TextInput id="start_at" v-model="form.start_at" type="date" class="form-control" autofocus placeholder="Please enter start_at" autocomplete="start_at" required :class="{ 'is-invalid': form.errors.start_at }" @input="handleInput('start_at')" :light="true"/>
                                <InputError :message="form.errors.start_at" />
                            </BCol>
                            <BCol lg="6" class="mt-n1">
                                <InputLabel for="end_at" value="End At" />
                                <TextInput id="end_at" v-model="form.end_at" type="date" class="form-control" autofocus placeholder="Please enter end_at" autocomplete="end_at" required :class="{ 'is-invalid': form.errors.end_at }" @input="handleInput('end_at')" :light="true"/>
                                <InputError :message="form.errors.end_at" />
                            </BCol>
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
    props: ['certifications','years'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                school_id: null,
                course_id: null,
                certification_id: null,
                years: null,
                start_at: null,
                end_at: null
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
        submit(){
            if(this.editable){
                this.form.put('/directory/certifications/update',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.hide();
                    }
                });
            }else{
                this.form.post('/directory/certifications',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.hide();
                    },
                });
            }
        },
        checkSearchStr: _.debounce(function(string) {
            this.fetchSchool(string);
        }, 300),
        checkSearchStr2: _.debounce(function(string) {
            this.fetchCourse(string);
        }, 300),
        fetchSchool(value) {
            axios.get(this.currentUrl + '/directory/schools', {
                params : {
                    keyword: value,
                    option: 'dropdowns'
                }
            })
            .then(response => {
                this.schools = response.data;
            })
            .catch(err => console.log(err));
        },
        fetchCourse(value) {
            axios.get(this.currentUrl + '/directory/courses', {
                params : {
                    keyword: value,
                    option: 'dropdowns'
                }
            })
            .then(response => {
                this.courses = response.data;
            })
            .catch(err => console.log(err));
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
/* .input-group input {
    border: 1px solid #e9eaed;
    background-color: #f5f6f7;
    height: 37.5px;
}
.testbutton {
    height: 38px;
} */
</style>