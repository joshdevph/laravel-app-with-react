export default function Table({items, columns, primary, actions}){
    return (
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            {primary}
                        </th>
                        {
                            columns.map((column) => (
                                <th key={column} scope="col" class="px-6 py-3">
                                    {column}
                                </th>
                            ))
                        }
                        <th scope="col" class="px-6 py-3">
                        </th>
                    </tr>
                </thead>
                <tbody>
                        {
                            items.map((item) => (
                                <tr key={item.id} class="border-b border-gray-200 dark:border-gray-600">
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        #{item.id}
                                    </td>
                                    {
                                        columns.map((column) => (
                                            <td key={column} class="px-6 py-4">
                                                {item[column]}
                                            </td>
                                        ))
                                    }
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
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