import Employee from './components/views/Employee.vue'
import Create from './components/views/Create'
import Edit from './components/views/Edit'


export const routes = [

        {
            name: 'home',
            path: '/',
            component: Employee
        },
        {
            name: 'create',
            path: '/create',
            component: Create
        },
        {
            name: 'edit',
            path: '/edit/:id',
            component: Edit
        }
  ]



