import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import React from 'react';
import CompanyProfileSearchForm from './Partials/CompanyProfileSearchForm'
import CompanyProfileResult from './Partials/CompanyProfileResult'
export default function Profile({auth, data}) {
    return (
      <AuthenticatedLayout
          auth={auth}
          header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Company Profile</h2>}
      >
          <Head title="Profile" />

          <div className="py-12">
              <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                  <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                      <CompanyProfileSearchForm className="max-w-7xl" />
                  </div>

                  <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                      <CompanyProfileResult className="max-w-7xl" results={data} />
                  </div>
              </div>
          </div>
      </AuthenticatedLayout>
    );
  }