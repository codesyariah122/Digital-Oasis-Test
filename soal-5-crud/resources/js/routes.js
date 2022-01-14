import EmployeeComponent from './components/EmployeeComponent.vue'
import CreateComponent from './components/CreateComponent.vue'
import EditComponent from './components/EditComponent.vue'
import DetailComponent from './components/DetailComponent.vue'

export const routes = [
    {
        name: 'employees',
        path: '/',
        component: EmployeeComponent
    },
    {
        name: 'create',
        path: '/create',
        component: CreateComponent
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditComponent
    },
    {
        name: 'detail',
        path: '/detail/:id',
        component: DetailComponent
    }
]