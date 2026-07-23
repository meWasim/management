import React, { useState } from 'react';
import { Head, Link, usePage } from '@inertiajs/react';
// import CreateInstitution from './Create';

interface Institution {
  id: number;
  name: string;
  domain: string;
}

export default function InstitutionsIndex() {
  const { props } = usePage<{ institutions: Institution[]; flash?: { success?: string } }>();
  const [showForm, setShowForm] = useState(false);

  return (
    <>
      <Head title="Institutions" />
      <div className="p-6">
        <h1 className="text-2xl font-bold mb-4">Institutions</h1>

        {props.flash?.success && (
          <div className="bg-green-100 text-green-700 p-2 rounded mb-4">
            {props.flash.success}
          </div>
        )}

        {/* List */}
        <table className="w-full border-collapse border">
          <thead>
            <tr className="bg-gray-100">
              <th className="border px-4 py-2">Name</th>
              <th className="border px-4 py-2">Domain</th>
            </tr>
          </thead>
          <tbody>
            {props.institutions.map((inst) => (
              <tr key={inst.id}>
                <td className="border px-4 py-2">{inst.name}</td>
                <td className="border px-4 py-2">{inst.domain}</td>
              </tr>
            ))}
          </tbody>
        </table>

        {/* Add Button */}
        <button
          onClick={() => setShowForm(!showForm)}
          className="mt-4 bg-blue-600 text-white px-4 py-2 rounded"
        >
          {showForm ? 'Close Form' : 'Add Institution'}
        </button>

        {/* Conditional Form */}
        {showForm && (
          <div className="mt-4 border rounded p-4 bg-gray-50">
            {/* <CreateInstitution /> */}
          </div>
        )}
      </div>
    </>
  );
}
