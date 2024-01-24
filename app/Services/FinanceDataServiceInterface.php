<?php
namespace App\Services;

interface FinanceDataServiceInterface
{
    public function searchCompanyProfile($searchTerm);
    public function searchCompanyQuote($searchTerm);
}

?>