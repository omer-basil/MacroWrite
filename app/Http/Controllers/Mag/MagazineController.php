<?php

namespace App\Http\Controllers\Mag;

use App\Models\User;
use App\Models\Draft;
use App\Models\Magazine;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Policies\MagazinePolicy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Draft\DraftController;


class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //show the edit page
        $user = auth()->user();

        $magazine = auth()->user()->magazine;
        
        return view('mag.modification', compact('magazine', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'magname' => 'required',
            'magdesc' => 'required',
            'image' => 'required|image'
        ]);

        //uploading profile image
        $imageName = time() . '-' . $request->name . '-' . 
        $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        
        //creating valriable to check if the user already has a maagazine
        $magazine = auth()->user()->magazine;

        if(!$magazine)
        {
            $request->user()->magazine()->create([
                'name' => $request->magname,
                'description' => $request->magdesc,
                'slug' => Str::slug($request->magname, '-'),
                'uid' => uniqid(true),
                'image' => $imageName
            ]);
        }
        else
        {
            $request->user()->magazine()->update([
                'name' => $request->magname,
                'description' => $request->magdesc,
                'slug' => Str::slug($request->magname, '-'),
                'image' => $imageName
            ]);
        }

        return redirect()->action([DraftController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Magazine $magazine, Draft $draft)
    {
        //
        if(Auth::check())
        {
            if(Auth::user()->ownsMag($magazine))
            {
                $drafts = $magazine->drafts()->with(['magazine'])->latest()->get();
            }
            else
            {
                $drafts = $magazine->drafts()->with(['magazine'])->latest()->where('visibility', 'LIKE', 'public')->get();
            }
        }
        else
        {
            $drafts = $magazine->drafts()->with(['magazine'])->latest()->where('visibility', 'LIKE', 'public')->get();
        }
        return view('mag.index', [
            'magazine' => $magazine,
            'drafts' => $drafts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magazine $magazine)
    {
        $magazine->delete();

        return back();
    }
    
}
