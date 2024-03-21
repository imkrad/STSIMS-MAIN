<template>
    <b-row class="g-2 mb-2 mt-n2">
        <b-col lg>
            <div class="input-group mb-1">
                <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                <input type="text" v-model="filter.keyword" placeholder="Search Scholar" class="form-control" style="width: 35%;">
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
                    <th style="width: 15%;" class="text-center">Program</th>
                    <th style="width: 15%;" class="text-center">Awarded Year</th>
                    <th style="width: 15%;" class="text-center">School</th>
                    <th style="width: 15%;" class="text-center">Status</th>
                    <th style="width: 10%;"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(list,index) in lists" v-bind:key="index">
                    <td> 
                         <div class="avatar-xs chat-user-img online">
                            <img :src="currentUrl+'/images/avatars/'+list.profile.avatar" alt="" class="avatar-xs rounded-circle">
                            <span :style="(list.profile.sex == 'M') ? 'background-color: #5cb0e5;' : 'background-color: #e55c7f;'" class="user-status text-success"></span>
                        </div>
                    </td>
                    <td>
                        <h5 class="fs-12 mb-0 fw-semibold">{{list.profile.name}}</h5>
                        <p class="fs-11 text-muted mb-0">{{list.spas_id}}</p>
                    </td>
                    <td class="text-center fs-12">{{list.program}} - {{list.subprogram}}</td>
                    <td class="text-center fs-12">{{list.awarded_year}}</td>
                    <td class="text-center">
                        <p class="fs-12 mb-n1 text-dark">{{(list.education.school instanceof Object) ? list.education.school.name : list.education.school}}</p>
                        <p class="fs-12 text-muted mb-0">{{(list.education.course instanceof Object) ? list.education.course.shortcut : list.education.course}}</p>
                    </td>
                    <td class="text-center">
                        <span :class="'badge '+list.status.color+' '+list.status.others">{{list.status.name}}</span>
                    </td>
                    <td class="text-end">
                        <b-button @click="openEdit(list,index)" variant="soft-info" v-b-tooltip.hover title="View" size="sm" class="me-1">
                            <i class="ri-eye-fill align-bottom"></i>
                        </b-button>
                        <b-button @click="openEdit(list,index)" variant="soft-warning" v-b-tooltip.hover title="Edit" size="sm">
                            <i class="ri-pencil-fill align-bottom"></i>
                        </b-button>
                    </td>
                </tr>
            </tbody>
        </table>
        <Pagination class="ms-2 me-2" v-if="meta" @fetch="fetch" :lists="lists.length" :links="links" :pagination="meta" />
    </div>
    <Upload ref="upload" @status="fetch()"/>
    <Filter :dropdowns="dropdowns" @filter="subfilter" ref="filter"/>
</template>
<script>
import _ from 'lodash';
import Filter from '../Modals/Filter.vue';
import Upload from '../Modals/Upload.vue';
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    components: { Pagination, Upload, Filter },
    props: ['dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            index: null,
            filter: {
                keyword: null
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
    methods: {
        checkSearchStr: _.debounce(function(string) {
            this.fetch();
        }, 300),
        fetch(page_url){
            page_url = page_url || '/scholars/lists';
            axios.get(page_url,{
                params : {
                    keyword: this.filter.keyword,
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
    }
}
</script>