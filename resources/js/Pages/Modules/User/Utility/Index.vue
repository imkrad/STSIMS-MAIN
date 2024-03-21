<template>
    <Head title="Utilities" />
    <PageHeader title="Utilities" pageTitle="Setting" />
    <div class="row">
        <div class="col-md-3">
            <BCard no-body class="">
                <BCardBody class="p-3" style="height: calc(100vh - 220px); overflow: auto;">
                    <div class="alert alert-warning text-center" role="alert">Please monitor all logs regularly</div>
                    <hr class="text-muted"/>
                    <b-list-group class="list-group-fill-success mt-4">
                        <Link :href="'/utilities/overview'">
                            <BListGroupItem :class="{ 'active': $page.url === '/utilities/overview' }" href="#" class="list-group-item-action">
                                <i class="ri-apps-2-fill align-middle me-2"></i>Overview
                            </BListGroupItem>
                        </Link>
                        <Link :href="'/utilities/users'">
                            <BListGroupItem :class="{ 'active': $page.url === '/utilities/users' }" href="#" class="list-group-item-action">
                                <i class="ri-team-fill align-middle me-2"></i>User Management
                            </BListGroupItem>
                        </Link>
                        <Link :href="'/utilities/roles'">
                            <BListGroupItem :class="{ 'active': $page.url === '/utilities/roles' }" href="#" class="list-group-item-action">
                                <i class="ri-shield-check-line align-middle me-2"></i>Role Management
                            </BListGroupItem>
                        </Link>
                        <Link :href="'/utilities/menus'">
                            <BListGroupItem :class="{ 'active': $page.url === '/utilities/menus' }" href="#" class="list-group-item-action">
                                <i class="ri-list-check align-middle me-2"></i>Menu Management
                            </BListGroupItem>
                        </Link>
                        <Link :href="'/utilities/authentications'">
                            <BListGroupItem :class="{ 'active': $page.url === '/utilities/authentications' }" href="#" class="list-group-item-action">
                                <i class="ri-time-fill align-middle me-2"></i>Authentication Logs
                            </BListGroupItem>
                        </Link>
                        <Link :href="'/utilities/activities'">
                            <BListGroupItem :class="{ 'active': $page.url === '/utilities/activities' }" href="#" class="list-group-item-action">
                                <i class="ri-history-line align-middle me-2"></i>Activity Logs
                            </BListGroupItem>
                        </Link>
                        <Link :href="'/utilities/configurations'">
                            <BListGroupItem :class="{ 'active': $page.url === '/utilities/configurations' }" href="#" class="list-group-item-action">
                                <i class="ri-settings-5-fill align-middle me-2"></i>System Configuration
                            </BListGroupItem>
                        </Link>
                        <Link :href="'/utilities/backup'">
                            <BListGroupItem :class="{ 'active': $page.url === '/utilities/backup' }" href="#" class="list-group-item-action">
                                <i class="ri-server-line align-middle me-2"></i>Backup and Restore
                            </BListGroupItem>
                        </Link>
                    </b-list-group>
                </BCardBody>
            </BCard>
        </div>

        <div class="col-md-9" style="margin-top: 6px;">
            <slot />
        </div>
    </div>
</template>
<script>
import Overview from './Pages/Overview.vue';
import User from './Pages/User.vue';
import Role from './Pages/Role.vue';
import Menu from './Pages/Menu.vue';
import System from './Pages/System.vue';
import Activity from './Pages/Activity.vue';
import Authentication from './Pages/Authentication.vue';
import Backup from './Pages/Backup.vue';
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    components: { PageHeader, Overview, User, Role, Menu, System, Activity, Authentication, Backup },
}
</script>