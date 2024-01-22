<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FinanceDataController extends Controller
{
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
        $response = Http::get("https://financialmodelingprep.com/api/v3/search?query={$searchTerm}&apikey=LfJMfHdb5SVmOeBQfJSIQ0jvRjl0MpF6");
        $data = $response->json();

        return response()->json($data);
    }

    public function searchCompanyQuote(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        
        // Fetch data from the Financial Modeling Prep API based on the search term
        $response = Http::get("https://financialmodelingprep.com/api/v3/quote/{$searchTerm}?apikey=LfJMfHdb5SVmOeBQfJSIQ0jvRjl0MpF6");
        $data = $response->json();

        return response()->json($data);
    }
}
