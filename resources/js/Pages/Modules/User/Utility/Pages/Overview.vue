<template>
<div class="">
    <form @submit.prevent="submit()" class="customform">
        <BCard no-body>
            <BCardHeader class="align-items-center d-flex py-0">
                <BCardTitle class="mb-0 flex-grow-1">Overview</BCardTitle>
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
                  
            </BCardBody>
        </BCard>
    </form>
</div>
</template>
<script>
import Layout from "@/Shared/Layouts/Main.vue";
import profile from "@/Pages/Modules/User/Utility/Index.vue";
export default {
    layout: (h,page) => {
        return h(Layout, [
            h(profile,[page])
        ])
    },
    props: ['configuration'],
    data(){
        return {
           
        }
    },
}
</script>