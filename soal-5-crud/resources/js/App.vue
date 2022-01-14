<template>
    <div class="container">
        <div class="text-center m-5">
            <span class="lead">Digital Oasis Teknikal Test | Soal-5 (Operational Data / CRUD)</span>
        </div>

        <!-- <pre>
            {{$route.path === '/' ? 'active' : ''}}
        </pre> -->

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li :class="`${($route.path === '/' && $route.path !== '/create') ? 'breadcrumb-item  active' : 'breadcrumb-item'}`"><router-link to="/">Employees</router-link></li>
                <li :class="`${($route.path === '/create' && $route.path !== '/') ? 'breadcrumb-item active' : 'breadcrumb-item'}`" aria-current="page"><router-link to="/create">Add Employee</router-link>
                </li>
            </ol>
        </nav>

        <router-view></router-view>

        <div v-if="$route.path === '/'" class="position-sticky">
            <div class="position-absolute top-100 start-50 translate-middle my__profile">
                <PujiErmanto/>
            </div>
        </div>

    </div>
</template>
<script>
    import PujiErmanto from './components/Profile/PujiErmanto'

    export default {
        components: {
            PujiErmanto
        }
    }
</script>