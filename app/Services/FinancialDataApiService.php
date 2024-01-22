
namespace App\Services;

use Illuminate\Support\Facades\Http;

class FinancialDataApiService implements FinancialDataServiceInterface
{
    public function search(string $searchTerm): array
    {
        $response = Http::get("https://financialmodelingprep.com/api/v3/search?query={$searchTerm}");
        return $response->json();
    }
}
