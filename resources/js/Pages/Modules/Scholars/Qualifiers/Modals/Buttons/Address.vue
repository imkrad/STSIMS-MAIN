<template>
    <b-modal v-model="showModal" title="View Profile" size="lg" class="v-modal-custom" modal-class="zoomIn" centered>    
        <template v-slot:header>
            <div style="border-bottom: 1px solid #ccc; width: 100%;">
                <i @click="showModal=false" class="ri-close-circle-fill float-end me-3" style="cursor:pointer; font-size: 30px;"></i>
                <b-row class="mt-n1" style="margin-bottom: 12px;">
                    <b-col md>
                        <b-row class="align-items-center g-1">
                            <b-col md="auto">
                                <b-img class="img-thumbnail rounded-circle" style="width: 50px; height: 50px;" alt="img" src="/imagess/avatars/avatar.jpg" data-holder-rendered="true"></b-img>
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
        <div class="alert alert-danger mb-xl-0" role="alert">Please update the <b>qualifier's address</b> to view their profile and proceed.</div>
        <div class="alert alert-dark border-0 mt-2 mb-2" role="alert">  {{(user.address.info.barangay) ? user.address.info.barangay+', ' : ''}}
            {{user.address.info.municipality+', '}}
            {{user.address.info.province}}
        </div>
        <hr class="text-muted"/>
        <b-form class="row customform mb-n1 mt-n2 g-2">
            <div class="col-lg-6">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" disabled>
                    <option selected>{{user.address.region.region}}</option>
                    </select>
                    <label for="floatingSelect">Region</label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" disabled>
                    <option selected>{{user.address.province.name}}</option>
                    </select>
                    <label for="floatingSelect">Province</label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-floating">
                    <select v-model="municipality" class="form-select" id="floatingSelect" :disabled="(user.address.municipality) ? true : false">
                        <option v-if="user.address.municipality" selected>{{user.address.municipality.name}}</option>
                        <option v-else selected>Select Municipality</option>
                        <option :value="list.value" v-for="list in municipalities" v-bind:key="list.value">{{list.name}}</option>
                    </select>
                    <label for="floatingSelect" :class="(form.errors) ? (form.errors.municipality_code) ? 'text-danger' : '' : ''">Municipality</label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-floating">
                    <select v-model="barangay" class="form-select" id="floatingSelect" :disabled="(user.address.barangay) ? true : false">
                        <option v-if="user.address.barangay" selected>{{user.address.barangay.name}}</option>
                        <option v-else value="null" selected disabled>Select Barangay</option>
                        <option :value="list.value" v-for="list in barangays" v-bind:key="list.value">{{list.name}}</option>
                    </select>
                    <label for="floatingSelect" style="margin-bottom: -20px;" :class="(form.errors) ? (form.errors.barangay_code) ? 'text-danger' : '' : ''">Barangay</label>
                </div>
            </div>
        </b-form>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="create('ok')" variant="primary" :disabled="form.processing" block>Save</b-button>
        </template>
    </b-modal>
</template>
<script>
export default {
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
                    municipality: {}
                },
                profile: {},
            },
            municipalities: [],
            municipality: null,
            barangays: [],
            barangay: null,
            form: {},
            showModal: false,
            type: ''
        }
    },
    watch: {
        "user"(){
            this.municipality = (this.user.address.municipality) ? this.user.address.municipality.name : null,
            this.barangay = (this.user.address.barangay) ? this.user.address.barangay.name : null
        },
    },
    methods : {
        show(data){
            this.user = data;
            this.showModal = true;
            if(this.user.address.municipality == null){
                this.fetchMunicipality(this.user.address.province.code);
            }else{
                this.fetchBarangay(this.user.address.municipality.code);
            }
        },
        create(){
            // let data = new FormData();
            // data.append('id', this.user.id);
            // data.append('type', 'update');
            // data.append('is_completed', 1);
            // data.append('address_id', this.user.address.id);
            // (this.user.address.municipality == null) ? data.append('municipality_code', (this.municipality != '') ? this.municipality : '') : '';
            // (this.user.address.barangay == null) ? data.append('barangay_code', (this.barangay != '') ? this.barangay : '') : '';
         
            // this.$inertia.post('/scholars/qualifiers',data,{
            //     preserveScroll: true,
            //     forceFormData: true,
            //     onSuccess: (response) => {
            //         this.$emit('status',true);
            //         this.hide();
            //     },
            //     onError: () =>{
            //         this.errors = this.$page.props.errors;
            //     }
            // });

            this.form = this.$inertia.form({
                id: this.user.id,
                is_completed: 1,
                address_id: this.user.address.id,
                municipality_code: (this.user.address.municipality) ? this.user.address.municipality.code : this.municipality,
                barangay_code: this.barangay,
                type: 'update'
            })

            this.form.post('/scholars/qualifiers',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.$emit('status',true);
                    this.hide();
                },
            });
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
        hide(){
            this.municipalities = [];
            this.barangays = [];
            this.municipality = null;
            this.barangay = null;
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
.form-floating > .form-select {
  height: 50px;
  min-height: 50px;
  line-height: 1;
  padding-top: 1.300rem;
  font-size: 12px;
}
</style>