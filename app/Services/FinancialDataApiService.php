<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class FinancialDataApiService implements FinanceDataServiceInterface
{
    public function searchCompanyProfile($searchTerm)
    {
        $response = Http::get("https://financialmodelingprep.com/api/v3/search?query={$searchTerm}&apikey=LfJMfHdb5SVmOeBQfJSIQ0jvRjl0MpF6");
        return $response->json();
    }

    public function searchCompanyQuote($searchTerm)
    {
        $response = Http::get("https://financialmodelingprep.com/api/v3/quote/{$searchTerm}?apikey=LfJMfHdb5SVmOeBQfJSIQ0jvRjl0MpF6");
        return $response->json();
    }
}

?>