<template>

    <div class="col-12 col-md-10 offset-md-2" >
        <div class="h6 mb-3" v-if="$root.user && $root.user.isAdmin()" style="color:#C6C6C6">сотрудники</div>
        <div class="row ml-0 mr-0" v-if="$root.user && $root.user.isAdmin()">
            <div class="col-5 col-md-2 pr-1 pl-1 mb-2 text-center">
                <div class="card p-2 pt-4 pb-4">
                    <router-link to="/control/users" class="card-full-link"></router-link>
                    <div class="h3 mb-0"><span class="fa fa-user h6 mb-0"></span></div>
                    <div style="font-weight:500;margin-bottom: -6px;">пользователи</div>
                    <div class="small" style="color:#C6C6C6">администраторыы</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {



    }

</script>