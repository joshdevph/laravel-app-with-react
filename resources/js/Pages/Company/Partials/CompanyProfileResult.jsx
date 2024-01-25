import Table from '../../../Components/Table';
export default function CompanyProfileResult({ className, results }) {
    const tableColumns = ['name', 'symbol', 'currency', 'stockExchange', 'exchangeShortName']
    return (
        <section className={className}>
            <header>
                <h2 className="text-lg font-medium text-gray-900">Company Information Table</h2>
            </header>
            <div className='mt-6 space-y-6'>
                {results.length > 0 ? (
                    <Table items={results} columns={tableColumns} action="" />
                ) : (
                    <p className="text-gray-500">No records found</p>
                )}
            </div>

        </section>
    );
}
