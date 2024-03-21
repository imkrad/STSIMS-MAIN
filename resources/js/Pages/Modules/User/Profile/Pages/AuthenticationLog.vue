<template>
<div class="">
    <form @submit.prevent="" class="customform">
        <BCard no-body>
            <BCardHeader>
                <BCardTitle>Authentication Logs</BCardTitle>
                <p class="text-muted mb-0">These logs are essential for monitoring security, identifying potential threats, and ensuring compliance with security policies.</p>
            </BCardHeader>
            <BCardBody class="p-4" style="height: calc(100vh - 300px); overflow: auto;">
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <thead class="table-light">
                            <tr class="fs-11">
                                <th></th>
                                <th style="width: 25%;">Browser</th>
                                <th style="width: 17%;" class="text-center">IP Address</th>
                                <th style="width: 20%;" class="text-center">Login Date</th>
                                <th style="width: 20%;" class="text-center">Logout Date</th>
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
                                    <h5 class="fs-13 mb-0 text-dark">{{list.platform}} <span class="fs-12 text-muted">({{list.browser}})</span></h5>
                                    <p v-if="list.location" class="fs-12 text-muted mb-0">{{ list.location.city }},  {{ list.location.state_name }}, {{ list.location.country }}</p>
                                    <p v-else class="fs-12 text-muted mb-0">Not Available</p>
                                </td>
                                <td class="text-center">{{list.ip}} </td>
                                <td class="text-center text-muted fs-11">{{(list.login_at) ? list.login_at : 'n/a'}}</td>
                                <td class="text-center text-muted fs-11">{{(list.logout_at) ? list.logout_at : 'n/a'}}</td>
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
export default {
    components: { Pagination },
    data(){
        return {
            lists: [],
            meta: {},
            links: {},
        }
    },
    created(){
        this.fetch();
    },
    methods : {
        fetch(page_url){
            page_url = page_url || '/profile';
            return axios.get(page_url,{
                params : {
                    option: 'authentication-logs',
                    count: ((window.innerHeight-490)/50),
                }
            })
            .then(response => {
                this.lists = response.data.data;
                this.meta = response.data.meta;
                this.links = response.data.links;      
            });
        }
    }
}
</script>