<?php

namespace App\Http\Controllers\Draft;

use App\Models\User;
use App\Models\Draft;
use App\Models\Quote;
use App\Models\Magazine;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class DraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magazine = auth()->user()->magazine;

        $quotes = Quote::latest()->where('user_id', 'LIKE', Auth()->id())->get();

        return view('draft.index', compact('magazine', 'quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Magazine $magazine, User $user, Draft $draft)
    {
        $validated = $request->validate([
            'body' => 'required',
        ]);

        // article estimating reading time.
        Str::macro('readDuration', function(...$text) {
            $totalWords = str_word_count(implode(" ", $text));
            $minutesToRead = round($totalWords / 200);
        
            return (int)max(1, $minutesToRead);
        });
    
        $readEst = Str::readDuration($request->body);
        
        $request->user()->magazine->drafts()->updateOrCreate(
            ['uid' => $request->uid],
            [
                'body' => $request->body,
                'title' => $request->draftTitle,
                'abstract' => $request->draftAbstract,
                'visibility' => $request->visibility,
                'readTime' => $readEst,
            ]
        );

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Draft $draft, Request $request)
    {
        $draft->visitsCounter()->increment();

        $visits = visits($draft)->count();
        
        $recos = visits('App\Models\Draft')->top(20)->where('visibility', 'LIKE', 'public')->whereNotNull('title', 'abstract');

        return view('draft.display', [
            'draft' => $draft,
            'visits' => $visits,
            'recos' => $recos,
        ]);   

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Draft $draft, Magazine $magazine)
    {
        return view('draft.edit', [
            'magazine' => $magazine,
            'draft' => $draft
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Magazine $magazine, User $user)
    {
        $request->user()->magazine->drafts()->update([
            
            'body' => $request->body,
            'title' => $request->draftTitle,
            'abstract' => $request->draftAbstract,
            'visibility' => $request->visibility,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Draft $draft, Magazine $magazine)
    {
        $draft->delete();

        return redirect('/');
    }

}
