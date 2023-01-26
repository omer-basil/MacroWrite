<?php

namespace App\Http\Controllers\Mag;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::with('user')->latest()->get()->where('user_id', 'LIKE', Auth()->id());;

        return view('mag.subscriptions', [
            'subscriptions' => $subscriptions,
        ]);
    }
}
