<template>
<div class="">
    <form @submit.prevent="submit()" class="customform">
        <BCard no-body>
            <BCardHeader class="align-items-center d-flex py-0">
                <BCardTitle class="mb-0 flex-grow-1">Authentication Logs</BCardTitle>
                <div class="flex-shrink-0">
                    <BDropdown variant="link" class="card-header-dropdown" toggle-class="text-reset dropdown-btn arrow-none"
                    menu-class="dropdown-menu-end"  :offset="{ alignmentAxis: -140, crossAxis: 0, mainAxis: 0 }">
                    <template #button-content> 
                        <span class="text-muted fs-16"><i class="mdi mdi-dots-vertical align-middle"></i></span> </template>
                        <BDropdownItem @click="openGenerate()">Generate Backup</BDropdownItem>
                        <BDropdownItem>Restore Backup</BDropdownItem>
                        <BDropdownItem>Clean Backup</BDropdownItem>
                    </BDropdown>
                </div>
            </BCardHeader>
            <BCardBody class="p-4" style="height: calc(100vh - 280px); overflow: auto;">
                <b-row>
                    <b-col lg="4" md="6" v-for="(item, index) of statistics" :key="index">
                        <b-card no-body class="bg-white shadow-none border">
                            <b-card-body>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-light rounded-circle fs-3" :class="item.color">
                                            <i :class="`bx ${item.icon} align-middle`"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">
                                            {{ item.name }}
                                        </p>
                                        <h4 class="mb-0">
                                            <span class="counter-value">
                                            {{ item.total }}
                                            </span>
                                        </h4>
                                    </div>
                                </div>
                            </b-card-body>
                        </b-card>
                    </b-col>
                </b-row>
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <thead class="table-light">
                            <tr class="fs-11">
                                <th></th>
                                <th style="width: 25%;">Browser</th>
                                <th style="width: 20%;" class="text-center">Login Date</th>
                                <th style="width: 20%;" class="text-center">Logout Date</th>
                                <th style="width: 17%;" class="text-center">User</th>
                                <th style="width: 15%;" class="text-center">Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(list,index) in lists" v-bind:key="index">
                                <td>
                                    <div class="flex-shrink-0 avatar-xs">
                                        <div class="avatar-title bg-light text-primary rounded-3 fs-15">
                                            <i :class="'ri-'+list.type+'-fill '+list.attempt"></i>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="fs-13 mb-0 text-dark">{{list.ip}} &nbsp;<span class="fs-12 text-muted">|</span>&nbsp; {{list.platform}} <span class="fs-12 text-muted">({{list.browser}})</span></h5>
                                    <p v-if="list.location" class="fs-12 text-muted mb-0">{{ list.location.city }},  {{ list.location.state_name }}, {{ list.location.country }}</p>
                                    <p v-else class="fs-12 text-muted mb-0">Not Available</p>
                                </td>
                                <td class="text-center fs-12">{{(list.login_at) ? list.login_at : 'n/a'}}</td>
                                <td class="text-center fs-12">{{(list.logout_at) ? list.logout_at : 'n/a'}}</td>
                                <td class="text-center">
                                    <h5 class="fs-13 mb-0 text-dark">{{list.name}}</h5>
                                    <span class="fs-12 text-muted">{{list.role}}</span>
                                </td>
                                <td class="text-center">
                                    <span v-if="list.logout_at == 'n/a'" :class="(list.is_attempt) ? 'badge bg-success' : 'badge bg-danger'">
                                        <span v-if="list.is_attempt">Login Successful</span>
                                        <span v-else>Login Failed</span>
                                    </span>
                                    <span v-else class="badge bg-warning">Logout</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination class="ms-2 me-2" v-if="meta" @fetch="fetch" :lists="lists.length" :links="links" :pagination="meta" />
                </div>
            </BCardBody>
        </BCard>
    </form>
</div>
</template>
<script>
import Pagination from "@/Shared/Components/Pagination.vue";
import Layout from "@/Shared/Layouts/Main.vue";
import profile from "@/Pages/Modules/User/Utility/Index.vue";
export default {
    layout: (h,page) => {
        return h(Layout, [
            h(profile,[page])
        ])
    },
    components: { Pagination },
    props: ['statistics'],
    data(){
        return {
            lists: [],
            meta: {},
            links: {},
            filter: {
                keyword: null
            }
        }
    },
    created(){
        this.fetch();
    },
    methods: {
        fetch(page_url){
            page_url = page_url || '/utility/logs/authentications';
            axios.get(page_url,{
                params : {
                    keyword: this.filter.keyword,
                    counts: ((window.innerHeight-480)/60),
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
    }
}
</script>