<template>
<div class="">
    <form @submit.prevent="submit()" class="customforma">
        <BCard no-body>
            <BCardHeader class="align-items-center d-flex py-0" style="height: 59px;">
                <BCardTitle class="mb-0 flex-grow-1">User Management</BCardTitle>
                <div class="flex-shrink-0">
                    <div class="input-group">
                        <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                        <input type="text" placeholder="Search User" v-model="filter.keyword" class="form-control" style="width: 35%;">
                        <span @click="refresh" class="input-group-text" v-b-tooltip.hover title="Refresh" style="cursor: pointer;"> 
                            <i class="bx bx-refresh search-icon"></i>
                        </span>
                        <b-button type="button" variant="primary" @click="openCreate">
                            <i class="ri-add-circle-fill align-bottom me-1"></i> Create
                        </b-button>
                    </div>
                </div>
            </BCardHeader>
            <BCardBody class="p-4" style="height: calc(100vh - 280px); overflow: auto;">
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <thead class="table-light">
                            <tr class="fs-11">
                                <th></th>
                                <th style="width: 30%;">Name</th>
                                <th style="width: 15%;" class="text-center">Role</th>
                                <th style="width: 15%;" class="text-center">Username</th>
                                <th style="width: 15%;" class="text-center">Mobile</th>
                                <th style="width: 15%;" class="text-center">Status</th>
                                <th style="width: 10%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(list,index) in lists" v-bind:key="index" :class="[(list.is_active == 0) ? 'table-warnings' : '']">
                                <td>
                                    <div class="avatar-xs chat-user-img online">
                                        <img :src="list.avatar" alt="" class="avatar-xs rounded-circle">
                                        <span v-if="list.is_active" class="user-status text-success"></span>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="fs-13 mb-0 text-dark">{{list.name}}</h5>
                                    <p class="fs-12 text-muted mb-0">{{list.email}}</p>
                                </td>
                                <td class="text-center">{{list.role}}</td>
                                <td class="text-center">{{list.username}}</td>
                                <td class="text-center">{{list.mobile}}</td>
                                <td class="text-center">
                                    <span v-if="list.is_active" class="badge bg-success">Active</span>
                                    <span v-else class="badge bg-danger">Inactive</span>
                                </td>
                                <td class="text-end">
                                    <b-button variant="soft-success" @click="openActivation('activation',list,index)" v-b-tooltip.hover title="Lock" size="sm" class="remove-list me-1">
                                        <i class="ri-lock-2-fill align-bottom"></i>
                                    </b-button>
                                    <b-button variant="soft-warning" @click="openActivation('verification',list,index)" v-b-tooltip.hover title="Verify" size="sm" class="remove-list me-1">
                                        <i class="ri-mail-send-fill align-bottom"></i>
                                    </b-button>
                                    <b-button variant="soft-danger" @click="openApi(list)" v-b-tooltip.hover title="Api Key" size="sm" class="remove-list me-1">
                                        <i class="ri-shield-keyhole-fill align-bottom"></i>
                                    </b-button>
                                    <b-button variant="soft-primary" @click="openEdit(list,index)" v-b-tooltip.hover title="Edit" size="sm" class="edit-list">
                                        <i class="ri-pencil-fill align-bottom"></i>
                                    </b-button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination class="ms-2 me-2" v-if="meta" @fetch="fetch" :lists="lists.length" :links="links" :pagination="meta" />
                </div>
            </BCardBody>
        </BCard>
    </form>
    <Api ref="api"/>
    <Create ref="create"/>
    <Activation ref="activation"/>
</div>
</template>
<script>
import _ from 'lodash';
import Api from '../Modals/Users/Api.vue';
import Create from '../Modals/Users/Create.vue';
import Layout from "@/Shared/Layouts/Main.vue";
import profile from "@/Pages/Modules/User/Utility/Index.vue";
import Activation from '../Modals/Users/Activation.vue';
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    layout: (h,page) => {
        return h(Layout, [
            h(profile,[page])
        ])
    },
    components: { Create, Pagination, Activation, Api },
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            filter: {
                keyword: null
            },
            index: ''
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
            page_url = page_url || '/utility/users';
            axios.get(page_url,{
                params : {
                    keyword: this.filter.keyword,
                    count: ((window.innerHeight-400)/58),
                    option: 'lists'
                }
            })
            .then(response => {
                this.lists = response.data.data;
                this.meta = response.data.meta;
                this.links = response.data.links; 
            })
            .catch(err => console.log(err));
        },
        openCreate(){
            this.$refs.create.show();
        },
        openActivation(type,data,index){
            this.index = index;
            this.$refs.activation.show(type,data);
        },
        openApi(data){
            this.$refs.api.show(data);
        },
        openEdit(data,index){
            this.index = index;
            this.$refs.create.edit(data);
        }
    }
}
</script>