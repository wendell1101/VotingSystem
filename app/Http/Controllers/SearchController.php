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
            // $candidates = Candidate::where('name', 'like', '%' . $q . '%')->get();
            // $candidates = DB::select('SELECT candidates.image, candidates.name, candidates.course_and_section, candidates,email, candidates.contact_no,
            //     candidates.description, candidates.platform, candidates.officers_id, candidates.partylist_id,
            //     partylists.name, officers.name FROM candidates
            //     INNER JOIN officers  ON candidates.officer_id=officers.id
            //     INNER JOIN partylists ON candidates.partylyst_id=partylists.id ORDER BY candidates.officer_id');

            $candidates = DB::table('candidates')
                ->join('officers', 'candidates.officer_id', '=', 'officers.id')
                ->join('partylists', 'candidates.partylist_id', '=', 'partylists.id')
                ->select('candidates.*', 'officers.name as officer_name', 'partylists.name as partylist_name')
                ->where('candidates.name', 'like', '%' . $q . '%')->get();
            // $candidates = ($candidates->count() > 0) ? $candidates : Candidate::all();
            return response()->json(['data' => $candidates]);
        }
        // $res = response()->json(['data' => Candidate::all()]);;
        // return $res;
        return view('candidate-lists');
    }
}
