export default function Table({items, columns, primary, actions}){
    return (
        <div className="relative overflow-x-auto">
            <table className="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        {
                            columns.map((column) => (
                                <th key={column} scope="col" className="px-6 py-3">
                                    {column}
                                </th>
                            ))
                        }
                        <th scope="col" className="px-6 py-3">
                        </th>
                    </tr>
                </thead>
                <tbody>
                        {
                            items.map((item) => (
                                <tr key={item.symbol} className="border-b border-gray-200 dark:border-gray-600">
                                    {
                                        columns.map((column) => (
                                            <td key={column} className="px-6 py-4">
                                                {item[column]}
                                            </td>
                                        ))
                                    }
                                    <td className="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        {actions}
                                    </td>
                                </tr>
                            ))
                        }
                </tbody>
            </table>
        </div>

    )
}