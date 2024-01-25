<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\FinanceDataServiceInterface;
use Illuminate\Support\Facades\Validator;
class FinanceDataController extends Controller
{

    protected $financeDataService;

    public function __construct(FinanceDataServiceInterface $financeDataService)
    {
        $this->financeDataService = $financeDataService;
    }

    public function indexPage(){
        return Inertia::render('Company/Profile',[
            'data' => []
        ]);
    }

    public function quotePage(){
        return Inertia::render('Company/Quote',[
            'data' => []
        ]);
    }

    public function searchCompanyProfile(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'searchTerm' => 'required|string', // Adjust the validation rules as needed
        ],
        [
            'searchTerm.required' => 'Please enter a search term this is required.', // Custom error message
        ]);
        // Fetch data from the Financial Modeling Prep API based on the search term
        $searchTerm = $request->input('searchTerm');
        $data = $this->financeDataService->searchCompanyProfile($searchTerm);
        return Inertia::render('Company/Profile',[
            'data' => $data,
            'errors' => $validator->errors(),
        ]);
    }

    public function searchCompanyQuote(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'searchTerm' => 'required|string', // Adjust the validation rules as needed
        ],
        [
            'searchTerm.required' => 'Please enter a search term this is required.', // Custom error message
        ]);
        // Fetch data from the Financial Modeling Prep API based on the search term
        $searchTerm = $request->input('searchTerm');
        $data = $this->financeDataService->searchCompanyQuote($searchTerm);

        return Inertia::render('Company/Quote',[
            'data' => $data,
            'errors' => $validator->errors(),
        ]);
    }
}
