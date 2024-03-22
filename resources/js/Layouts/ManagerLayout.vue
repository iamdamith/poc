<template>
    <header class="absolute inset-x-0 top-0 z-50 flex h-16 border-b border-gray-900/10">
      <div class="mx-auto flex w-full max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
        <div class="flex flex-1 items-center gap-x-6">
          <button type="button" class="-m-3 p-3 md:hidden" @click="mobileMenuOpen = true">
            <span class="sr-only">Open main menu</span>
            <Bars3Icon class="h-5 w-5 text-gray-900" aria-hidden="true" />
          </button>
          <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
        </div>
        <nav class="hidden md:flex md:gap-x-11 md:text-sm md:font-semibold md:leading-6 md:text-gray-700">
          <a v-for="(item, itemIdx) in navigation" :key="itemIdx" :href="item.href">{{ item.name }}</a>
        </nav>
        <div class="flex flex-1 items-center justify-end gap-x-8">
          <button type="button" class="-m-2.5 p-2.5 text-gray-400 hover:text-gray-500">
            <span class="sr-only">View notifications</span>
            <BellIcon class="h-6 w-6" aria-hidden="true" />
          </button>
          <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">Your profile</span>
            <img class="h-8 w-8 rounded-full bg-gray-800" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
          </a>
        </div>
      </div>
      <Dialog as="div" class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
        <div class="fixed inset-0 z-50" />
        <DialogPanel class="fixed inset-y-0 left-0 z-50 w-full overflow-y-auto bg-white px-4 pb-6 sm:max-w-sm sm:px-6 sm:ring-1 sm:ring-gray-900/10">
          <div class="-ml-0.5 flex h-16 items-center gap-x-6">
            <button type="button" class="-m-2.5 p-2.5 text-gray-700" @click="mobileMenuOpen = false">
              <span class="sr-only">Close menu</span>
              <XMarkIcon class="h-6 w-6" aria-hidden="true" />
            </button>
            <div class="-ml-0.5">
              <a href="#" class="-m-1.5 block p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" />
              </a>
            </div>
          </div>
          <div class="mt-2 space-y-2">
            <a v-for="item in navigation" :key="item.name" :href="item.href" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ item.name }}</a>
          </div>
        </DialogPanel>
      </Dialog>
    </header>
  
    <main>
      <div class="relative isolate overflow-hidden pt-16">
        <!-- Secondary navigation -->
        <header class="pb-4 pt-6 sm:pb-6">
          <div class="mx-auto flex max-w-7xl flex-wrap items-center gap-6 px-4 sm:flex-nowrap sm:px-6 lg:px-8">
            <h1 class="text-base font-semibold leading-7 text-gray-900">Form Submissions</h1>
            <div class="order-last flex w-full gap-x-8 text-sm font-semibold leading-6 sm:order-none sm:w-auto sm:border-l sm:border-gray-200 sm:pl-6 sm:leading-7">
              <a v-for="item in secondaryNavigation" :key="item.name" :href="item.href" :class="item.current ? 'text-indigo-600' : 'text-gray-700'">{{ item.name }}</a>
            </div>
            <!-- <a href="#" class="ml-auto flex items-center gap-x-1 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              <PlusSmallIcon class="-ml-1.5 h-5 w-5" aria-hidden="true" />
              New invoice
            </a> -->
          </div>
        </header>
  
        <!-- Stats -->
        <div class="border-b border-b-gray-900/10 lg:border-t lg:border-t-gray-900/5">
          <dl class="mx-auto grid max-w-7xl grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 lg:px-2 xl:px-0">
            <div v-for="(stat, statIdx) in stats" :key="stat.name" :class="[statIdx % 2 === 1 ? 'sm:border-l' : statIdx === 2 ? 'lg:border-l' : '', 'flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8']">
              <dt class="text-sm font-medium leading-6 text-gray-500">{{ stat.name }}</dt>
              <dd :class="[stat.changeType === 'negative' ? 'text-rose-600' : 'text-gray-700', 'text-xs font-medium']">{{ stat.change }}</dd>
              <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">{{ stat.value }}</dd>
            </div>
          </dl>
        </div>
  
        <div class="absolute left-0 top-full -z-10 mt-96 origin-top-left translate-y-40 -rotate-90 transform-gpu opacity-20 blur-3xl sm:left-1/2 sm:-ml-96 sm:-mt-10 sm:translate-y-0 sm:rotate-0 sm:transform-gpu sm:opacity-50" aria-hidden="true">
          <div class="aspect-[1154/678] w-[72.125rem] bg-gradient-to-br from-[#FF80B5] to-[#9089FC]" style="clip-path: polygon(100% 38.5%, 82.6% 100%, 60.2% 37.7%, 52.4% 32.1%, 47.5% 41.8%, 45.2% 65.6%, 27.5% 23.4%, 0.1% 35.3%, 17.9% 0%, 27.7% 23.4%, 76.2% 2.5%, 74.2% 56%, 100% 38.5%)" />
        </div>
      </div>
  
      <div class="space-y-16 py-16 xl:space-y-20">
        <!-- Recent activity table -->
        <div>
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="mx-auto max-w-2xl text-base font-semibold leading-6 text-gray-900 lg:mx-0 lg:max-w-none">Recent activity</h2>
          </div>
          <div class="mt-6 overflow-hidden border-t border-gray-100">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
              <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                <table class="w-full text-left">
                  <thead class="sr-only">
                    <tr>
                      <th>Amount</th>
                      <th class="hidden sm:table-cell">Client</th>
                      <th>More details</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-for="day in days" :key="day.dateTime">
                      <tr class="text-sm leading-6 text-gray-900">
                        <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
                          <time :datetime="day.dateTime">{{ day.date }}</time>
                          <div class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 bg-gray-50" />
                          <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50" />
                        </th>
                      </tr>
                      <tr v-for="submission in day.submissions" :key="submission.id">
                        <td class="relative py-5 pr-6">
                          <div class="flex gap-x-6">
                            <component :is="transaction.icon" class="hidden h-6 w-5 flex-none text-gray-400 sm:block" aria-hidden="true" />
                            <div class="flex-auto">
                              <div class="flex items-start gap-x-3">
                                <div class="text-sm font-medium leading-6 text-gray-900">{{ submission.applicant_name }}</div>
                                <!-- <div :class="[statuses[transaction.status], 'rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset']">{{ transaction.status }}</div> -->
                              </div>
                              <!-- <div v-if="transaction.tax" class="mt-1 text-xs leading-5 text-gray-500">{{ transaction.tax }} tax</div> -->
                            </div>

                          </div>
                          <div class="absolute bottom-0 right-full h-px w-screen bg-gray-100" />
                          <div class="absolute bottom-0 left-0 h-px w-screen bg-gray-100" />
                        </td>
                        <td class="hidden py-5 pr-6 sm:table-cell">
                          <!-- <div class="text-sm leading-6 text-gray-900">{{ transaction.client }}</div>
                          <div class="mt-1 text-xs leading-5 text-gray-500">{{ transaction.description }}</div> -->
                        </td>
                        <td class="py-5 text-right">
                          <!-- <div class="flex justify-end">
                            <a :href="transaction.href" class="text-sm font-medium leading-6 text-indigo-600 hover:text-indigo-500"
                              >More<span class="hidden sm:inline"> Details</span><span class="sr-only">, invoice #{{ transaction.invoiceNumber }}, {{ transaction.client }}</span></a
                            >
                          </div>
                          <div class="mt-1 text-xs leading-5 text-gray-500">
                            Invoice <span class="text-gray-900">#{{ transaction.invoiceNumber }}</span>
                          </div> -->
                        </td>
                      </tr>
                    </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>


               <!-- Stacked list -->
               <div>
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
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
                        <EnvelopeIcon class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" aria-hidden="true" />
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
        </ul> </div> </div>


      </div>
    </main>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import { Dialog, DialogPanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
  import {
    ArrowDownCircleIcon,
    ArrowPathIcon,
    ArrowUpCircleIcon,
    Bars3Icon,
    EllipsisHorizontalIcon,
    PlusSmallIcon,
    EnvelopeIcon,
    CheckCircleIcon
  } from '@heroicons/vue/20/solid'
  import { BellIcon, XMarkIcon } from '@heroicons/vue/24/outline'
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
  const navigation = [
    { name: 'Dashboard', href: '/dashboard' },
    { name: 'Invoices', href: '#' },
    { name: 'Clients', href: '#' },
    { name: 'Expenses', href: '#' },
  ]
  const secondaryNavigation = [
    { name: 'Last 7 days', href: '#', current: true },
    { name: 'Last 30 days', href: '#', current: false },
    { name: 'All-time', href: '#', current: false },
  ]
  const stats = [
    { name: 'Corporate Card Applications', value: '33', change: '', changeType: 'positive' },
    { name: 'Another form', value: '12', change: '+54.02%', changeType: 'negative' },
    { name: 'Form Relevent to Bins', value: '22', change: '-1.39%', changeType: 'positive' },
    { name: 'SSS', value: '8', change: '+10.18%', changeType: 'negative' },
  ]
  const statuses = {
    Paid: 'text-green-700 bg-green-50 ring-green-600/20',
    Withdraw: 'text-gray-600 bg-gray-50 ring-gray-500/10',
    Overdue: 'text-red-700 bg-red-50 ring-red-600/10',
  }
  const days = [
    {
      date: 'Today',
      dateTime: '2023-03-22',
      transactions: [
        {
          id: 1,
          invoiceNumber: '00012',
          href: '#',
          amount: '$7,600.00 USD',
          tax: '$500.00',
          status: 'Paid',
          client: 'Reform',
          description: 'Website redesign',
          icon: ArrowUpCircleIcon,
        },
        {
          id: 2,
          invoiceNumber: '00011',
          href: '#',
          amount: '$10,000.00 USD',
          status: 'Withdraw',
          client: 'Tom Cook',
          description: 'Salary',
          icon: ArrowDownCircleIcon,
        },
        {
          id: 3,
          invoiceNumber: '00009',
          href: '#',
          amount: '$2,000.00 USD',
          tax: '$130.00',
          status: 'Overdue',
          client: 'Tuple',
          description: 'Logo design',
          icon: ArrowPathIcon,
        },
      ],
    },
    {
      date: 'Yesterday',
      dateTime: '2023-03-21',
      transactions: [
        {
          id: 4,
          invoiceNumber: '00010',
          href: '#',
          amount: '$14,000.00 USD',
          tax: '$900.00',
          status: 'Paid',
          client: 'SavvyCal',
          description: 'Website redesign',
          icon: ArrowUpCircleIcon,
        },
      ],
    },
  ]
  const clients = [
    {
      id: 1,
      name: 'Tuple',
      imageUrl: 'https://tailwindui.com/img/logos/48x48/tuple.svg',
      lastInvoice: { date: 'December 13, 2022', dateTime: '2022-12-13', amount: '$2,000.00', status: 'Overdue' },
    },
    {
      id: 2,
      name: 'SavvyCal',
      imageUrl: 'https://tailwindui.com/img/logos/48x48/savvycal.svg',
      lastInvoice: { date: 'January 22, 2023', dateTime: '2023-01-22', amount: '$14,000.00', status: 'Paid' },
    },
    {
      id: 3,
      name: 'Reform',
      imageUrl: 'https://tailwindui.com/img/logos/48x48/reform.svg',
      lastInvoice: { date: 'January 23, 2023', dateTime: '2023-01-23', amount: '$7,600.00', status: 'Paid' },
    },
  ]
  
  const mobileMenuOpen = ref(false)
  </script>