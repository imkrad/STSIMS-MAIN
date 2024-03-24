<template>
    <BOffcanvas class="border-0" id="theme-settings-offcanvas" :backdrop="false" header-class="d-flex align-items-center bg-primary bg-gradient p-3" body-class="p-0" z-index="1005" footer-class="offcanvas-footer border p-3 text-center" placement="start" v-model="showOff">
        <template #header>
            <div class="me-2">
                <h5 class="m-0 me-2 text-white">Filter Search</h5>
            </div>
            <button type="button" class="btn-close btn-close-white ms-auto" id="customizerclose-btn" @click="showOff = false"></button>
        </template>

        <simplebar class="h-100 border-end" data-simplebar style="height: calc(100vh - 112px);">
            <b-form action="" class="customform">
                <div class="offcanvas-body">
                    <BRow>
                        <BCol lg="12" class="mt-1">
                            <InputLabel for="program" value="Program" />
                            <Multiselect :options="programs" :searchable="true" v-model="form.program_id" :message="form.errors.program_id" placeholder="Select Program"/>
                            <InputError :message="form.errors.program_id" />
                        </BCol>
                        <BCol lg="12" class="mt-1">
                            <InputLabel for="subprogram" value="Subprogram" />
                            <Multiselect :options="subprograms" :searchable="true" v-model="form.subprogram_id" :message="form.errors.subprogram_id" placeholder="Select Subprogram"/>
                            <InputError :message="form.errors.subprogram_id" />
                        </BCol>
                        <BCol lg="12" class="mt-1 mb-n2"><hr class="text-muted"/></BCol>
                        <BCol lg="12" class="mt-1">
                            <InputLabel for="region" value="School" />
                            <Multiselect  @search-change="checkSearchSchool" 
                            :options="schools" label="name" :searchable="true" 
                            v-model="form.school_id" :message="form.errors.school_id" 
                            placeholder="Select School"/>
                            <InputError :message="form.errors.school_id" />
                        </BCol>
                        <BCol lg="12" class="mt-1">
                                <InputLabel for="region" value="Course" />
                                <Multiselect class="form-control" @search-change="checkSearchCourse"
                                placeholder="Select School" label="name"
                                v-model="form.course_id" :close-on-select="true" 
                                :searchable="true" :options="courses"/>
                            <InputError :message="form.errors.course_id" />
                        </BCol>
                        <BCol lg="12" class="mt-1">
                            <InputLabel for="region" value="Level" />
                            <Multiselect :options="levels" :searchable="true" label="others" v-model="form.level_id" :message="form.errors.level_id" placeholder="Select Level"/>
                            <InputError :message="form.errors.level_id" />
                        </BCol>
                        <BCol lg="12" class="mt-1 mb-n2"><hr class="text-muted"/></BCol>
                        <BCol lg="12" class="mt-1">
                            <InputLabel for="region" value="Region" />
                            <Multiselect :options="dropdowns.regions" :searchable="true" v-model="form.region_code" :message="form.errors.region_code" placeholder="Select Region"/>
                            <InputError :message="form.errors.region_code" />
                        </BCol>
                        <BCol lg="12" class="mt-1">
                            <InputLabel for="province" value="Province" />
                            <Multiselect :options="provinces" :searchable="true" v-model="form.province_code" :message="form.errors.province_code" placeholder="Select Province"/>
                            <InputError :message="form.errors.province_code" />
                        </BCol>
                        <BCol lg="12" class="mt-1">
                            <InputLabel for="municipality" value="Municipality" />
                            <Multiselect :options="municipalities" :searchable="true" v-model="form.municipality_code" :message="form.errors.municipality_code" placeholder="Select Municipality"/>
                            <InputError :message="form.errors.municipality_code" />
                        </BCol>
                        <BCol lg="12" class="mt-1">
                            <InputLabel for="barangay" value="Barangay" />
                            <Multiselect :options="barangays" :searchable="true" v-model="form.barangay_code" :message="form.errors.barangay_code" placeholder="Select Barangay"/>
                            <InputError :message="form.errors.barangay_code" />
                        </BCol>
                    </BRow>
                </div>
            </b-form>
        </simplebar>

        <template #footer>
        <BRow >
            <BCol cols="6">
                <BButton type="button" variant="light" class="w-100" id="reset-layout" @click="resetLayout"> Reset </BButton>
            </BCol>
            <BCol cols="6">
                <BButton @click="filter()" type="button" variant="primary" class="w-100"> Submit </BButton>
            </BCol>
        </BRow>
      </template>
    </BOffcanvas>
</template>
<script>
import _ from 'lodash';
import simplebar from "simplebar-vue";
import { useForm } from '@inertiajs/vue3';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import Multiselect from '@/Shared/Components/Forms/Multiselect.vue';
export default {
    components: { Multiselect, InputLabel, simplebar },
    props:['dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                school_id: null,
                course_id: null,
                program_id: null,
                level_id: null,
                subprogram_id: null,
                region_code: null,
                province_code: null,
                municipality_code: null,
                barangay_code: null
            }),
            schools: [],
            courses: [],
            provinces: [],
            municipalities: [],
            barangays: [],
            showOff: false
        }
    },
    computed: {
        programs : function() {
            return this.dropdowns.programs.filter(x => x.is_sub === 0);
        },
        subprograms : function() {
            return this.dropdowns.programs.filter(x => x.is_sub === 1);
        },
        levels : function() {
            return this.dropdowns.levels;
        }
    },
    watch: {
        'form.region_code'(){
            (this.form.region_code) ? this.fetchProvince(this.form.region_code) : '';
        },
        'form.province_code'(){
            (this.form.province_code) ? this.fetchMunicipality(this.form.province_code) : '';
        },
        'form.municipality_code'(){
            (this.form.municipality_code) ? this.fetchBarangay(this.form.municipality_code) : '';
        }
    },
    methods: {
        filter(){
            this.$emit('filter', this.form);
        },
        show(){
            this.showOff = true;
        },
        checkSearchSchool: _.debounce(function(string) {
            this.fetchSchool(string);
        }, 300),
        checkSearchCourse: _.debounce(function(string) {
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
        fetchBarangay(code){
            axios.get('/lists/locations/',{
                params: {
                    option: 'list_barangay',
                    code: code
                }
            })
            .then(response => {
                this.barangays = response.data;
            })
            .catch(err => console.log(err));
        },
    }
}
</script>