<template>
    <div class="offcanvas offcanvas-start" :class="showOff ? 'show' : 'hiding'"  tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header bg-primary">
            <h5 class="offcanvas-title text-white" id="offcanvasExampleLabel">
                Scholar Filter
            </h5>
            <button type="button" class="btn-close text-white" @click="showOff = false"></button>
        </div>
        <b-form action="" class="d-flex flex-column justify-content-end bg-gradient" style="overflow: auto;">
            <div class="offcanvas-body">
                <div class="mb-1">
                    <label for="country-select" class="form-label text-muted text-uppercase fw-semibold mb-0 fs-10">Program</label>
                    <Multiselect class="form-control"
                    placeholder="Select Program" label="name" trackBy="name"
                    v-model="program" :close-on-select="true" 
                    :searchable="false" :options="programs" />
                </div>
                 <div class="mb-1">
                    <label for="country-select" class="form-label text-muted text-uppercase fw-semibold mb-0 fs-10">Subprogram</label>
                    <Multiselect class="form-control"
                    placeholder="Select Subprogram" label="name" trackBy="name"
                    v-model="subprogram" :close-on-select="true" 
                    :searchable="false" :options="subprograms" />
                </div>
                <!-- <hr class="mt-4"/>
                <div class="mb-1">
                    <label for="country-select" class="form-label text-muted text-uppercase fw-semibold mb-0 fs-10">School</label>
                    <Multiselect class="form-control" @search-change="fetchSchool"
                    placeholder="Select School" label="name" trackBy="name"
                    v-model="school" :close-on-select="true" 
                    :searchable="true" :options="schools"/>
                </div>
                <div class="mb-1">
                    <label for="country-select" class="form-label text-muted text-uppercase fw-semibold mb-0 fs-10">Course</label>
                    <Multiselect class="form-control" @search-change="fetchCourses"
                    placeholder="Select Course" label="course" trackBy="course"
                    v-model="course" :close-on-select="true" 
                    :searchable="true" :options="courses"/>
                </div>
                 <div class="mb-1">
                    <label for="country-select" class="form-label text-muted text-uppercase fw-semibold mb-0 fs-10">Level</label>
                    <Multiselect class="form-control"
                    placeholder="Select Level" label="name" trackBy="name"
                    v-model="level" :close-on-select="true" 
                    :searchable="true" :options="levels" />
                </div> -->
                <hr class="mt-4"/>
                <div class="mb-1">
                    <label for="country-select" class="form-label text-muted text-uppercase fw-semibold mb-0 fs-10">Region</label>
                    <Multiselect class="form-control"
                    placeholder="Select Region" label="name" trackBy="name"
                    v-model="region" :close-on-select="true" 
                    :searchable="true" :options="regions" />
                </div>
                <div class="mb-1">
                    <label for="country-select" class="form-label text-muted text-uppercase fw-semibold mb-0 fs-10">Province</label>
                   <Multiselect class="form-control"
                    placeholder="Select Province" label="name" trackBy="name"
                    v-model="province" :close-on-select="true" 
                    :searchable="true" :options="provinces" />
                </div>
                <div class="mb-1">
                    <label for="country-select" class="form-label text-muted text-uppercase fw-semibold mb-0 fs-10">Municipality</label>
                    <Multiselect class="form-control"
                    placeholder="Select Municipality" label="name" trackBy="name"
                    v-model="municipality" :close-on-select="true" 
                    :searchable="true" :options="municipalities" />
                </div>
                  <div class="mb-1">
                    <label for="country-select" class="form-label text-muted text-uppercase fw-semibold mb-0 fs-10">Barangay</label>
                    <Multiselect class="form-control"
                    placeholder="Select Barangay" label="name" trackBy="name"
                    v-model="barangay" :close-on-select="true" 
                    :searchable="true" :options="barangays" />
                </div>
            </div>
            <div class="offcanvas-footer border-top p-3 text-center hstack gap-2">
                <b-button @click="clear()" type="button" variant="light" class="w-100">Clear Filter</b-button>
                <b-button @click="fill()" type="button" variant="success" class="w-100">
                    Filter
                </b-button>
            </div>
        </b-form>
    </div>
</template>
<script>
import Multiselect from "@vueform/multiselect";
import "@vueform/multiselect/themes/default.css";
export default {
    props: ['regions','programs','subprograms','dropdowns'],
    components: { Multiselect },
    data(){
        return {
            currentUrl: window.location.origin,
            provinces: [],
            municipalities: [],
            barangays: [],
            schools: [],
            courses: [],
            school: null,
            course: null,
            level: null,
            region: null,
            province: null,
            municipality: null,
            barangay: null,
            program: null,
            subprogram: null,
            showOff: false
        }
    },
    watch: {
        'region'(){
            this.province = null;
            this.municipality = null;
            this.barangay = null;
            this.fetchProvince(this.region);
        },
        'province'(){
            this.barangay = null;
            this.municipality = null;
            this.fetchMunicipality(this.province);
        },
        'municipality'(){
            this.barangay = null;
            this.fetchBarangay(this.municipality);
        }
    },
    computed: {
        categories : function() {
            return this.dropdowns.data.filter(x => x.classification == 'Category');
        },
        levels : function() {
            return this.dropdowns.data.filter(x => x.classification == 'Level');
        }
    },
    methods: {
        show(){
            this.showOff = true;
        },
        fill(){
            this.filter = {
                program: this.program !== null ? this.program : undefined,
                subprogram: this.subprogram !== null ? this.subprogram : undefined,
                region: this.region !== null ? this.region : undefined,
                province: this.province !== null ? this.province : undefined,
                municipality: this.municipality !== null ? this.municipality : undefined,
                barangay: this.barangay !== null ? this.barangay : undefined,
                // school: this.school !== null ? this.school : undefined,
                // course: this.course !== null ? this.course : undefined,
                // level: this.level !== null ? this.level : undefined,
            };
            this.$emit('status', this.filter);
        },
        fetchProvince($id){
            axios.get(this.currentUrl + '/lists/provinces/'+$id)
            .then(response => {
                this.provinces = response.data.data;
            })
            .catch(err => console.log(err));
        },
        fetchMunicipality($id){
            axios.get(this.currentUrl + '/lists/municipalities/'+$id)
            .then(response => {
                this.municipalities = response.data.data;
            })
            .catch(err => console.log(err));
        },
        fetchBarangay($id){
            axios.get(this.currentUrl + '/lists/barangays/'+$id)
            .then(response => {
                this.barangays = response.data.data;
            })
            .catch(err => console.log(err));
        },
        fetchSchool(value) {
            if(value.length > 5){
                axios.post(this.currentUrl + '/lists/search/schools', {
                    word: value,
                })
                .then(response => {
                    this.schools = response.data.data;
                })
                .catch(err => console.log(err));
            }
        },
        fetchCourses(value) {
            if(value.length > 5){
                axios.post(this.currentUrl + '/lists/search/courses', {
                    word: value,
                })
                .then(response => {
                    this.courses = response.data.data;
                })
                .catch(err => console.log(err));
            }
        },
        clear(){
            this.region = '';
            this.province = '';
            this.municipality = '';
            this.barangay = '';
            this.school = '';
            this.course = '';
            this.level = '';
            this.program = '';
            this.subprogram = '';
            this.status = '';
            this.year = '';
        }
    }
}
</script>