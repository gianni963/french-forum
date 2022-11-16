<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Community;
use Inertia\Inertia;

class SubcommunityController extends Controller
{
    public function show($slug)
    {
        $subcommunity = Community::where('slug', $slug)->first();

        return Inertia::render('Subcommunities/Show', compact('subcommunity'));
    }
}
