<template>
    <b-modal v-model="showModal" title="View Profile" size="lg" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>    
        <template v-slot:header>
            <div style="border-bottom: 1px solid #ccc; width: 100%;">
                <i @click="showModal=false" class="ri-close-circle-fill float-end me-3" style="cursor:pointer; font-size: 30px;"></i>
                <b-row class="mt-n1" style="margin-bottom: 12px;">
                    <b-col md>
                        <b-row class="align-items-center g-1">
                            <b-col md="auto">
                                <b-img class="img-thumbnail rounded-circle" style="width: 50px; height: 50px;" alt="img" src="/images/avatars/avatar.jpg" data-holder-rendered="true"></b-img>
                            </b-col>
                            <b-col md>
                                <div class="ms-2 mt-n2">
                                    <h5 class="modal-title fs-15">{{user.profile.name}}</h5>
                                    <div class="hstack gap-3 flex-wrap mt-0 mb-n2">
                                        <div class="text-primary"><i class="ri-account-circle-fill align-bottom me-1"></i>
                                            <span class="text-body text-muted fs-12">{{user.spas_id }}</span>
                                        </div>
                                        <div class="vr"></div>
                                        <div class="text-primary"><i class="ri-map-pin-2-fill align-bottom me-1"></i>
                                            <span class="text-body text-muted fs-12">
                                                {{(user.address.municipality) ? user.address.municipality.name+',' : ''}}
                                                {{(user.address.province) ? user.address.province.name+',' : ''}}
                                                {{(user.address.region) ? user.address.region.region : ''}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </b-col>
                        </b-row>
                    </b-col>
                </b-row>
            </div>
        </template>
        <div class="mb-3 mt-n1">
            <BTabs nav-class="nav-pills nav-custom nav-custom-light" pills small>
                <BTab title="Overview">
                    <hr class="text-muted"/>
                    <div class="row mb-2">
                        <div class="col-sm-3">
                            <div class="p-1 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-0">
                                        <div class="avatar-title rounded bg-transparent text-primary fs-24"><i
                                                class="ri-file-copy-2-fill"></i></div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted fs-11 mb-0">Status :</p>
                                        <span :class="'badge '+user.status.color+' '+user.status.others">{{user.status.name}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="p-1 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-0">
                                        <div class="avatar-title rounded bg-transparent text-primary fs-24"><i
                                                class="mdi mdi-seal-variant"></i></div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted fs-11 mb-0">Program :</p>
                                        <h5 class="fs-13 text-success mb-0">{{user.program.name}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="p-1 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-0">
                                        <div class="avatar-title rounded bg-transparent text-primary fs-24"><i
                                                class="ri-award-line"></i></div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted fs-11 mb-0">Subprogram :</p>
                                        <h5 class="fs-13 mb-0">{{user.subprogram.name}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="p-1 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-0">
                                        <div class="avatar-title rounded bg-transparent text-primary fs-20"><i class="ri-calendar-2-line"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted fs-11 mb-0">Qualified Year:</p>
                                        <h5 class="fs-13 mb-0">{{user.qualified_year}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="text-muted"/>
                    <b-form class="customform mb-2" v-if="user.status.name == 'Waiting' || user.status.name == 'Deferment'">
                        <div class="row g-2">
                            <div class="col-md-12" v-if="user.status.name == 'Deferment'">
                                <div class="alert alert-dark mb-xl-0" role="alert"><b>REASON:</b> {{user.deferment.reason}}</div>
                            </div>
                            <div class="col-md-12">
                                <Multiselect class="form-control"
                                placeholder="Select Action"
                                v-model="type" :close-on-select="true" 
                                :searchable="false" 
                                :options="['Update Qualifier','Add Qualifier','Endorse Qualifier']"/>
                            </div>
                            <div class="col-md-12">
                                <div class="row g-2" v-if="type == 'Update Qualifier'">
                                    <div class="col-md-12 mb-2">
                                        <div class="alert alert-info mb-xl-0" role="alert">Updating the qualifier status to "Not Availing" or "Deferment."</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select v-model="status" class="form-select" id="floatingSelect">
                                                <option :value="null" selected>Select Status</option>
                                                <option :value="list.value" v-for="list in waiting_status" v-bind:key="list.value">{{list.name}}</option>
                                            </select>
                                            <label for="floatingSelect" :class="(form.errors) ? (form.errors.status_type) ? 'text-danger' : '' : ''">Status</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <textarea class="form-control" v-model="reason" rows="3" placeholder="Enter Reason"></textarea>
                                            <label for="floatingSelect" :class="(form.errors) ? (form.errors.reason) ? 'text-danger' : '' : ''">Reason</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-2" v-if="type == 'Add Qualifier'">
                                    <div class="col-md-12 mb-2">
                                        <div class="alert alert-info mb-xl-0" role="alert">Add a qualifier to the scholar list and make it downloadable via API.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label v-if="!user.school">School: <span v-if="form.errors" v-text="form.errors.school_id" class="haveerror"></span></label>
                                        <div v-if="user.school" class="form-floating">
                                            <input type="text" v-model="user.school" class="form-control" readonly>
                                            <label :class="(form.errors) ? (form.errors.school_id) ? 'text-danger' : '' : ''">School</label>
                                        </div>
                                        <Multiselect class="form-control" @search-change="fetchSchool"
                                        placeholder="Select School" label="name" trackBy="name"
                                        v-model="school" :close-on-select="true" 
                                        :searchable="true" :options="schools"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label v-if="!user.course">Course: <span v-if="form.errors" v-text="form.errors.course_id" class="haveerror"></span></label>
                                        <div v-if="user.course" class="form-floating">
                                            <input type="text" v-model="user.course" class="form-control" readonly>
                                            <label :class="(form.errors) ? (form.errors.course_id) ? 'text-danger' : '' : ''">Course</label>
                                        </div>
                                        <Multiselect class="form-control"
                                            placeholder="Select Course" label="course" trackBy="course"
                                            v-model="course" :close-on-select="true" 
                                            :searchable="true" :options="courses"/>
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <label>School: <span v-if="form.errors" v-text="form.errors.school_id" class="haveerror"></span></label>
                                        <Multiselect class="form-control" @search-change="fetchSchool"
                                        placeholder="Select School" label="name" trackBy="name"
                                        v-model="school" :close-on-select="true" 
                                        :searchable="true" :options="schools"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Course: <span v-if="form.errors" v-text="form.errors.course_id" class="haveerror"></span></label>
                                        <Multiselect class="form-control"
                                            placeholder="Select Course" label="course" trackBy="course"
                                            v-model="course" :close-on-select="true" 
                                            :searchable="false" :options="courses"/>
                                    </div> -->
                                    <!-- <div class="col-md-6" style="margin-top: 18px;">
                                        <div class="form-group">
                                            <label>Account No.: <span v-if="form.errors" v-text="form.errors.account_no" class="haveerror"></span></label>
                                            <input type="text" class="form-control" v-model="account_no">
                                        </div>
                                    </div> -->
                                    <div class="col-md-12 mt-3">
                                        <div class="alert alert-warning mb-xl-0" role="alert">Please double-check all fields before saving. <b>Once submitted, changes cannot be undone.</b></div>
                                    </div>
                                </div>
                                <div class="row g-2" v-if="type == 'Endorse Qualifier'">
                                    <div class="col-md-12 mb-2">
                                        <div class="alert alert-info mb-xl-0" role="alert">Endorse to the assigned region that handles the school.</div>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" v-model="user.school" class="form-control" readonly>
                                            <label :class="(form.errors) ? (form.errors.school_id) ? 'text-danger' : '' : ''">School</label>
                                        </div>
                                        <Multiselect class="form-control" @search-change="fetchSchool"
                                        placeholder="Select School" label="name" trackBy="name"
                                        v-model="school" :close-on-select="true" 
                                        :searchable="true" :options="schools"/>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" v-model="user.course" class="form-control" readonly>
                                            <label :class="(form.errors) ? (form.errors.course_id) ? 'text-danger' : '' : ''">Course</label>
                                        </div>
                                        <Multiselect class="form-control"
                                            placeholder="Select Course" label="course" trackBy="course"
                                            v-model="course" :close-on-select="true" 
                                            :searchable="false" :options="courses"/>
                                    </div> -->
                                    <div class="col-md-6">
                                        <label v-if="!user.school">School: <span v-if="form.errors" v-text="form.errors.school_id" class="haveerror"></span></label>
                                        <div v-if="user.school" class="form-floating">
                                            <input type="text" v-model="user.school" class="form-control" readonly>
                                            <label :class="(form.errors) ? (form.errors.school_id) ? 'text-danger' : '' : ''">School</label>
                                        </div>
                                        <Multiselect class="form-control" @search-change="fetchSchool"
                                        placeholder="Select School" label="name" trackBy="name"
                                        v-model="school" :close-on-select="true" 
                                        :searchable="true" :options="schools"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label v-if="!user.course">Course: <span v-if="form.errors" v-text="form.errors.course_id" class="haveerror"></span></label>
                                        <div v-if="user.course" class="form-floating">
                                            <input type="text" v-model="user.course" class="form-control" readonly>
                                            <label :class="(form.errors) ? (form.errors.course_id) ? 'text-danger' : '' : ''">Course</label>
                                        </div>
                                        <Multiselect class="form-control"
                                            placeholder="Select Course" label="course" trackBy="course"
                                            v-model="course" :close-on-select="true" 
                                            :searchable="true" :options="courses"/>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="alert alert-warning mb-xl-0" role="alert">Please double-check all fields before saving. <b>Once submitted, changes cannot be undone.</b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </b-form>
                    <b-form class="customform mb-n4" v-if="user.status.name == 'Not Avail'">
                        <div class="row g-2">
                            <div class="col-md-12 mb-2">
                                <div class="alert alert-danger mb-xl-0" role="alert"><b>Reason:</b> {{user.notavail.reason}}</div>
                            </div>
                        </div>
                    </b-form>
                </BTab>
                <BTab title="Profile">
                    <hr class="text-muted"/>
                    <b-form class="row customform mb-n1 mt-n2 g-2">
                        <div class="col-lg-3">
                            <div class="form-floating">
                                <input type="text" v-model="user.profile.lastname" class="form-control" readonly>
                                <label>Lastname</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-floating">
                                <input type="text" v-model="user.profile.firstname" class="form-control" readonly>
                                <label>Firstname</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-floating">
                                <input type="text" v-model="user.profile.middlename" class="form-control" readonly>
                                <label>Middlename</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-floating">
                                <input type="text" v-model="user.profile.suffix" class="form-control" readonly>
                                <label>Suffix</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating">
                                <input type="text" v-model="user.address.region.region" class="form-control" readonly>
                                <label>Region</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating">
                                <input type="text" v-model="user.address.province.name" class="form-control" readonly>
                                <label>Province</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating">
                                <input type="text" v-model="user.address.municipality.name" class="form-control" readonly>
                                <label>Municipality</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating">
                                <input type="text" v-model="user.address.barangay.name" class="form-control" readonly>
                                <label>Barangay</label>
                            </div>
                        </div>
                    </b-form>
                </BTab>  
            </BTabs>
        </div>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="create('ok')" v-if="type != null || user.status.name == 'Deferment'" variant="primary" :disabled="form.processing" block>Proceed</b-button>
        </template>
    </b-modal>
    <Confirm @status="hide()" ref="confirm"/>
</template>
<script>
import Confirm from './Confirm.vue';
import Multiselect from "@vueform/multiselect";
import "@vueform/multiselect/themes/default.css";
export default {
    props: ['statuses'],
    components: { Multiselect, Confirm },
    data(){
        return {
            currentUrl: window.location.origin,
            errors: [],
            user: {
                status: {},
                address: {
                    info: {},
                    region: {},
                    province: {},
                    municipality: {},
                    barangay: {}
                },
                type: {},
                profile: {},
                program: {},
                subprogram: {}
            },
            form: {},
            type: null,
            status: null,
            reason: null,
            schools: [],
            school: null,
            courses:[],
            course: null,
            showModal: false
        }
    },
    computed: {
        waiting_status : function() {
            const excludedStatusNames = (this.user.status.name == 'Deferment') ? ['Enrolled','Waiting','Deferment'] : ['Enrolled','Waiting'];
            return this.statuses.filter(x => !excludedStatusNames.includes(x.name));
        }
    },
    watch : {
        school(newVal){
            this.fetchCourse(this.school);
        },
    },
    methods : {
        show(data){
            this.type = null;
            this.user = data;
            (this.user.is_endorsed) ? this.type = 'Endorse Qualifier' : ''; 
            this.showModal = true;
        },
        create(){
            if(this.type == 'Update Qualifier'){
                this.form = this.$inertia.form({
                    id: this.user.id,
                    status_id: this.status,
                    reason: this.reason,
                    type: 'edit'
                });
            }else if(this.type == 'Add Qualifier'){
                this.form = this.$inertia.form({
                    user: this.user,
                    school_id: this.school,
                    course_id: this.course,
                    account_no: this.account_no,
                    type: 'enroll'
                });
            }else if(this.type == 'Endorse Qualifier'){
                this.form = this.$inertia.form({
                    user: this.user,
                    school_id: this.school,
                    course_id: this.course,
                    type: 'endorse'
                });
            }
            this.$refs.confirm.show(this.form);
        },
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
        hide(){
            this.$emit('status',true);
            this.school = null;
            this.course = null;
            this.type = null;
            this.status = null;
            this.reason = null;
            this.showModal = false;
        },
    }
}
</script>
<style>
.modal-header {
    padding-top: 15px;
    padding-left: 0px;
    padding-right: 0px;
}
.form-floating > .form-control {
  height: 50px;
  min-height: 50px;
  line-height: 1;
  padding-top: 1.300rem;
  font-size: 12px;
}
</style>