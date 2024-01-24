<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\FinanceDataServiceInterface;

class FinanceDataController extends Controller
{

    protected $financeDataService;

    public function __construct(FinanceDataServiceInterface $financeDataService)
    {
        $this->financeDataService = $financeDataService;
    }

    public function indexPage(){
        $companyDetails = User::All();
        return Inertia::render('Company/Profile',[
            'user' => $companyDetails
        ]);
    }

    public function quotePage(){
        return Inertia::render('Company/Quote',[]);
    }

    public function searchCompanyProfile(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        
        // Fetch data from the Financial Modeling Prep API based on the search term
        $searchTerm = $request->input('searchTerm');
        $data = $this->financeDataService->searchCompanyProfile($searchTerm);

        return response()->json($data);
    }

    public function searchCompanyQuote(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        
        // Fetch data from the Financial Modeling Prep API based on the search term
        $searchTerm = $request->input('searchTerm');
        $data = $this->financeDataService->searchCompanyQuote($searchTerm);

        return response()->json($data);
    }
}
