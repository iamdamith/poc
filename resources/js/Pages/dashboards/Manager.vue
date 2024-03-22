<template>
<main class="pt-8 pb-16 bg-white">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="px-4 sm:px-0">
          <h2 class="text-lg font-medium text-gray-900">Candidates</h2>

          <!-- Tabs -->
          <div class="sm:hidden">
            <label for="tabs" class="sr-only">Select a tab</label>
            <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
            <select id="tabs" name="tabs" class="mt-4 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
              <option v-for="tab in tabs" :key="tab.name" :selected="tab.current">{{ tab.name }}</option>
            </select>
          </div>
          <div class="hidden sm:block">
            <div class="border-b border-gray-200">
              <nav class="mt-2 -mb-px flex space-x-8" aria-label="Tabs">
                <a v-for="tab in tabs" :key="tab.name" :href="tab.href" :class="[tab.current ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200', 'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm']">
                  {{ tab.name }}
                  <span v-if="tab.count" :class="[tab.current ? 'bg-purple-100 text-purple-600' : 'bg-gray-100 text-gray-900', 'hidden ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block']">{{ tab.count }}</span>
                </a>
              </nav>
            </div>
          </div>
        </div>

        <!-- Stacked list -->
        <ul role="list" class="mt-5 border-t border-gray-200 divide-y divide-gray-200 sm:mt-0 sm:border-t-0">
          <li v-for="candidate in candidates" :key="candidate.email">
            <a href="#" class="group block">
              <div class="flex items-center py-5 px-4 sm:py-6 sm:px-0">
                <div class="min-w-0 flex-1 flex items-center">
                  <div class="flex-shrink-0">
                    <img class="h-12 w-12 rounded-full group-hover:opacity-75" :src="candidate.imageUrl" alt="" />
                  </div>
                  <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                    <div>
                      <p class="text-sm font-medium text-purple-600 truncate">{{ candidate.name }}</p>
                      <p class="mt-2 flex items-center text-sm text-gray-500">
                        <MailIcon class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" aria-hidden="true" />
                        <span class="truncate">{{ candidate.email }}</span>
                      </p>
                    </div>
                    <div class="hidden md:block">
                      <div>
                        <p class="text-sm text-gray-900">
                          Applied on
                          {{ ' ' }}
                          <time :datetime="candidate.appliedDatetime">{{ candidate.applied }}</time>
                        </p>
                        <p class="mt-2 flex items-center text-sm text-gray-500">
                          <CheckCircleIcon class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" aria-hidden="true" />
                          {{ candidate.status }}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <ChevronRightIcon class="h-5 w-5 text-gray-400 group-hover:text-gray-700" aria-hidden="true" />
                </div>
              </div>
            </a>
          </li>
        </ul>

        <!-- Pagination -->
        <nav class="border-t border-gray-200 px-4 flex items-center justify-between sm:px-0" aria-label="Pagination">
          <div class="-mt-px w-0 flex-1 flex">
            <a href="#" class="border-t-2 border-transparent pt-4 pr-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-200">
              <ArrowNarrowLeftIcon class="mr-3 h-5 w-5 text-gray-400" aria-hidden="true" />
              Previous
            </a>
          </div>
          <div class="hidden md:-mt-px md:flex">
            <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium"> 1 </a>
            <!-- Current: "border-purple-500 text-purple-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200" -->
            <a href="#" class="border-purple-500 text-purple-600 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium" aria-current="page"> 2 </a>
            <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium"> 3 </a>
            <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium"> 4 </a>
            <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium"> 5 </a>
            <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium"> 6 </a>
          </div>
          <div class="-mt-px w-0 flex-1 flex justify-end">
            <a href="#" class="border-t-2 border-transparent pt-4 pl-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-200">
              Next
              <ArrowNarrowRightIcon class="ml-3 h-5 w-5 text-gray-400" aria-hidden="true" />
            </a>
          </div>
        </nav>
      </div>
    </main>
    </template>
    
    <script setup>
  
  import ManagerLayout from "@/Layouts/ManagerLayout.vue";
  
  
    import {
      AcademicCapIcon,
      BanknotesIcon,
      CheckBadgeIcon,
      ClockIcon,
      ReceiptRefundIcon,
      UsersIcon,
    } from '@heroicons/vue/24/outline'
  
  const props = defineProps({
      user: Object,
  });
  


const navigation = [
  { name: 'Dashboard', href: '#', current: true },
  { name: 'Jobs', href: '#', current: false },
  { name: 'Applicants', href: '#', current: false },
  { name: 'Company', href: '#', current: false },
]
const userNavigation = [
  { name: 'Your Profile', href: '#' },
  { name: 'Settings', href: '#' },
  { name: 'Sign out', href: '#' },
]
const tabs = [
  { name: 'Applied', href: '#', count: '2', current: false },
  { name: 'Phone Screening', href: '#', count: '4', current: false },
  { name: 'Interview', href: '#', count: '6', current: true },
  { name: 'Offer', href: '#', current: false },
  { name: 'Disqualified', href: '#', current: false },
]
const candidates = [
  {
    name: 'Emily Selman',
    email: 'emily.selman@example.com',
    imageUrl:
      'https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    applied: 'January 7, 2020',
    appliedDatetime: '2020-07-01T15:34:56',
    status: 'Completed phone screening',
  },
  // More candidates...
]
const publishingOptions = [
  { name: 'Published', description: 'This job posting can be viewed by anyone who has the link.', current: true },
  { name: 'Draft', description: 'This job posting will no longer be publicly accessible.', current: false },
]


  
    const user = {
    name: 'Chelsea Hagon',
    email: 'chelsea.hagon@example.com',
    role: 'Human Resources Manager',
    imageUrl:
      'https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
  }
  
    const actions = [
      {
        title: 'Corporate Card Application Form',
        href: '/finance/corporate-card-application',
        icon: BanknotesIcon,
        iconForeground: 'text-teal-700',
        iconBackground: 'bg-teal-50',
        desc:"This is something relavent to the Corporate Card Application Form. This is going to be awsome"
      },
      {
        title: 'Benefits',
        href: '#',
        icon: CheckBadgeIcon,
        iconForeground: 'text-purple-700',
        iconBackground: 'bg-purple-50',
        desc:"Doloribus dolores nostrum quia qui natus officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae."
      },
      {
        title: 'Schedule a one-on-one',
        href: '#',
        icon: UsersIcon,
        iconForeground: 'text-sky-700',
        iconBackground: 'bg-sky-50',
        desc:"Doloribus dolores nostrum quia qui natus officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae."
      },
      {
        title: 'Payroll',
        href: '#',
        icon: ClockIcon,
        iconForeground: 'text-yellow-700',
        iconBackground: 'bg-yellow-50',
        desc:"Doloribus dolores nostrum quia qui natus officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae."
      },
      {
        title: 'Submit an expense',
        href: '#',
        icon: ReceiptRefundIcon,
        iconForeground: 'text-rose-700',
        iconBackground: 'bg-rose-50',
        desc:"Doloribus dolores nostrum quia qui natus officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae."
      },
      {
        title: 'Training',
        href: '#',
        icon: AcademicCapIcon,
        iconForeground: 'text-indigo-700',
        iconBackground: 'bg-indigo-50',
        desc:"Doloribus dolores nostrum quia qui natus officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae."
      },
    ]
  
  
  
   
  const recentHires = [
    {
      name: 'Leonard Krasner',
      handle: 'leonardkrasner',
      imageUrl:
        'https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
      href: '#',
    },
    {
      name: 'Floyd Miles',
      handle: 'floydmiles',
      imageUrl:
        'https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
      href: '#',
    },
    {
      name: 'Emily Selman',
      handle: 'emilyselman',
      imageUrl:
        'https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
      href: '#',
    },
    {
      name: 'Kristin Watson',
      handle: 'kristinwatson',
      imageUrl:
        'https://images.unsplash.com/photo-1500917293891-ef795e70e1f6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
      href: '#',
    },
  ]
  const announcements = [
    {
      id: 1,
      title: 'Office closed on July 2nd',
      href: '#',
      preview:
        'Cum qui rem deleniti. Suscipit in dolor veritatis sequi aut. Vero ut earum quis deleniti. Ut a sunt eum cum ut repudiandae possimus. Nihil ex tempora neque cum consectetur dolores.',
    },
    {
      id: 2,
      title: 'New password policy',
      href: '#',
      preview:
        'Alias inventore ut autem optio voluptas et repellendus. Facere totam quaerat quam quo laudantium cumque eaque excepturi vel. Accusamus maxime ipsam reprehenderit rerum id repellendus rerum. Culpa cum vel natus. Est sit autem mollitia.',
    },
    {
      id: 3,
      title: 'Office closed on July 2nd',
      href: '#',
      preview:
        'Tenetur libero voluptatem rerum occaecati qui est molestiae exercitationem. Voluptate quisquam iure assumenda consequatur ex et recusandae. Alias consectetur voluptatibus. Accusamus a ab dicta et. Consequatur quis dignissimos voluptatem nisi.',
    },
  ]
  
    </script>
  
  <script>
  export default {
      // Using shorthand syntax...
      layout: ManagerLayout,
  };
  </script>
  