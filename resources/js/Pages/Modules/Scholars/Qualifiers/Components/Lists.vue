<template>
    <b-row class="g-2 mb-2 mt-n2">
        <b-col lg>
            <div class="input-group mb-1">
                <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                <input type="text" v-model="filter.keyword" placeholder="Search Scholar" class="form-control" style="width: 60%;">
                <select v-model="filter.status" @change="fetch()" class="form-select">
                    <option :value="null" selected>Select Status</option>
                    <option :value="list" v-for="list in statuses" v-bind:key="list.value">{{list.name}}</option>
                </select>
                <span @click="openUpload()" class="input-group-text" v-b-tooltip.hover title="Upload Scholars" style="cursor: pointer;"> 
                    <i class="ri-upload-cloud-fill search-icon"></i>
                </span>
                <span @click="refresh" class="input-group-text" v-b-tooltip.hover title="Refresh" style="cursor: pointer;"> 
                    <i class="bx bx-refresh search-icon"></i>
                </span>
                <b-button @click="openFilter()" type="button" variant="primary">
                    <i class="ri-filter-fill search-icon"></i>
                </b-button>
            </div>
        </b-col>
    </b-row>
    <div class="table-responsive">
        <table class="table table-nowrap align-middle mb-0">
            <thead class="table-light">
                <tr class="fs-11">
                    <th></th>
                    <th style="width: 30%;">Name</th>
                    <th style="width: 15%;" class="text-center">Address</th>
                    <th style="width: 15%;" class="text-center">Program</th>
                    <th style="width: 15%;" class="text-center">Awarded Year</th>
                    <th style="width: 15%;" class="text-center">Type</th>
                    <th style="width: 15%;" class="text-center">Status</th>
                    <th style="width: 10%;"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="list in lists" v-bind:key="list.id" :class="[(list.is_active == 0) ? 'table-warnings' : '']">
                    <td>
                        <div class="avatar-xs">
                            <span class="avatar-title rounded-circle">{{list.profile.lastname.charAt(0)}}</span>
                        </div>
                    </td>
                    <td>
                        <h5 class="fs-13 mb-0 text-dark">{{list.profile.lastname}}, {{list.profile.firstname}} {{list.profile.middlename[0]}}.</h5>
                        <p class="fs-11 text-muted mb-0">{{list.spas_id }}</p>
                    </td>
                    <!-- <td class="text-center fs-12">
                        {{list.address.hs_school}}
                    </td> -->
                        <td class="text-center">
                        <h5 class="fs-11 mb-0 text-dark">{{list.address.name}}</h5>
                        <p class="fs-11 text-muted mb-0">
                            {{(list.address.province) ? list.address.province.name+',' : ''}}
                            {{(list.address.region) ? list.address.region.region : ''}}
                        </p>
                    </td>
                    <td class="text-center">
                        <h5 class="fs-12 mb-0 text-dark">{{list.program.name}}</h5>
                        <p class="fs-11 text-muted mb-0">{{list.subprogram.name }}</p>
                    </td>
                    <td class="text-center">{{list.qualified_year}}</td>
                        <td class="text-center">
                        <span :class="'badge '+list.type.color+' '+list.type.others">{{list.type.name}}</span>
                    </td>
                    <td class="text-center">
                        <span :class="'badge '+list.status.color+' '+list.status.others">{{list.status.name}}</span>
                    </td>
                    <td class="text-end">
                    <b-button v-if="list.address.is_completed == 0" variant="soft-danger" @click="openAddress(list)" v-b-tooltip.hover title="View" size="sm" class="me-0">
                            <i class="ri-eye-fill align-bottom"></i> 
                        </b-button>
                        <b-button v-else variant="soft-primary" @click="openProfile(list)" v-b-tooltip.hover title="View" size="sm" class="me-0">
                            <i class="ri-eye-fill align-bottom"></i> 
                        </b-button>
                    </td>
                </tr>
            </tbody>
        </table>
        <Pagination class="ms-2 me-2" v-if="meta" @fetch="fetch" :lists="lists.length" :links="links" :pagination="meta" />
    </div>
    <Upload ref="upload" @status="fetch()"/>
    <Address @status="fetch()" ref="address"/>
    <Profile @status="fetch()" :statuses="statuses" ref="profile"/>
    <Filter :dropdowns="dropdowns" @filter="subfilter" ref="filter"/>
</template>
<script>
import _ from 'lodash';
import Address from '../Modals/Buttons/Address.vue';
import Profile from '../Modals/Buttons/Profile.vue';
import Filter from '../Modals/Filter.vue';
import Upload from '../Modals/Upload.vue';
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    components: { Pagination, Upload, Filter, Address, Profile },
    props: ['dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            index: null,
            filter: {
                keyword: null,
                status: null
            }
        }
    },
    created(){
        this.fetch();
    },
    watch: {
        "filter.keyword"(newVal){
            this.checkSearchStr(newVal)
        },
        '$page.props.flash' : {
            deep: true,
            handler(val = null) {
                if(val.status){
                    this.lists[this.index] = val.data.data;
                }
            }
        }
    },
    computed: {
        statuses : function() {
            return this.dropdowns.statuses.filter(x => x.type === 'Progress' || x.type === 'Ongoing');
        }
    },
    methods: {
        checkSearchStr: _.debounce(function(string) {
            this.fetch();
        }, 300),
        fetch(page_url){
            page_url = page_url || '/scholars/qualifiers';
            axios.get(page_url,{
                params : {
                    keyword: this.filter.keyword,
                    status: this.filter.status,
                    subfilters: this.subfilters,
                    count: ((window.innerHeight-350)/59),
                    option: 'lists'
                }
            })
            .then(response => {
                if(response){
                    this.lists = response.data.data;
                    this.meta = response.data.meta;
                    this.links = response.data.links;          
                }
            })
            .catch(err => console.log(err));
        },
        openUpload(){
            this.$refs.upload.show();
        },
        openFilter(){
            this.$refs.filter.show();
        },
        subfilter(list){
            this.subfilters = (Object.keys(list).length == 0) ? '-' : JSON.stringify(list);
            this.fetch();
        },
        openAddress(data){
            this.$refs.address.show(data);
        },
        openProfile(data){
            this.$refs.profile.show(data);
        }
    }
}
</script>