<?php

namespace App\Http\Controllers;

use App\Models\Draft;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if($request->input('query'))
        {
            $q = $request->input('query');

            $drafts = Draft::query()->where('title', 'LIKE', "%{$q}%")->orWhere('abstract', 'LIKE', "%{$q}%")->get();
        }
        else
        {
            $drafts = [];
        }

        return view('results', compact('drafts'));
    }
}
