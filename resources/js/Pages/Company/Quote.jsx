import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import Table from '@/Components/Table';
import React, { useState } from 'react';

export default function Quote(auth) {
    const [searchTerm, setSearchTerm] = useState('');
    const [searchResults, setSearchResults] = useState([]);
  
    const handleSearch = async () => {
      try {
        // Make an API request to the Laravel backend
        const response = await axios.post('/api/financial-data/search-quote', { searchTerm });
        setSearchResults(response.data);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };
  
    return (
      <AuthenticatedLayout
        auth={auth.auth}
        errors={auth.errors}
        header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Company Quote</h2>}
      >
        <Head title="Quote" />
  
        <div className="py-12">
          <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div className="p-6 bg-white border-b border-gray-200">
                <div className="mb-4">
                  <label className="block text-gray-700 text-sm font-bold mb-2">Search Term:</label>
                  <input
                    type="text"
                    className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Enter Search Term ..."
                    value={searchTerm}
                    onChange={(e) => setSearchTerm(e.target.value)}
                  />
                </div>
                <button
                  className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                  onClick={handleSearch}
                >
                  Search
                </button>
              </div>
              <Table items={searchResults} columns={['avgVolume', 'change', 'changesPercentage', 'dayHigh', 'dayLow', 'earningsAnnouncement','eps','exchange','marketCap','name', 'open', 'pe', 'previousClose', 'price', 'priceAvg50', 'priceAvg200', 'sharesOutstanding', 'symbol', 'timestamp', 'volume', 'yearHigh', 'yearLow']} action="" />
            </div>
          </div>
        </div>
      </AuthenticatedLayout>
    );
  }