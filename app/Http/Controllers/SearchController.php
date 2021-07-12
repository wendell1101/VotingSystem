<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $res = '';
        if ($request->has('q')) {
            $q = $request->q;
            $candidates = DB::table('candidates')
                ->join('officers', 'candidates.officer_id', '=', 'officers.id')
                ->join('partylists', 'candidates.partylist_id', '=', 'partylists.id')
                ->select('candidates.*', 'officers.name as officer_name', 'partylists.name as partylist_name')
                ->where('candidates.name', 'like', '%' . $q . '%')
                ->get();

            return response()->json(['data' => $candidates]);
        }
        return view('candidate-lists');
    }
}
