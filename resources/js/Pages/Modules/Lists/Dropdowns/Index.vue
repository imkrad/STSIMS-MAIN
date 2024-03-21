<template>
    <PageHeader title="Dropdowns" pageTitle="List" />
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-sidebar">
            <Sidebar :dropdowns="dropdowns"/>
        </div>
        <div class="file-manager-content w-100 p-4 pb-0" style="height: calc(100vh - 180px); overflow: auto;" ref="box">
            <Lists ref="lists"/>
        </div>
    </div>
</template>
<script>
import Lists from './Components/Lists.vue';
import Sidebar from './Components/Sidebar.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    props: ['dropdowns'],
    components: { PageHeader, Lists, Sidebar },
    methods: {
        select(data){
            this.$refs.lists.show(data);
        }
    }
}
</script>