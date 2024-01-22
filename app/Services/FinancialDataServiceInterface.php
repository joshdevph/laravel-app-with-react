namespace App\Services;

interface FinancialDataServiceInterface
{
    public function search(string $searchTerm): array;
}