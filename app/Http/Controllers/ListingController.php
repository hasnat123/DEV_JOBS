<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    public function index()
    {
        return view('listings.index',
        [
            'listings' => Listing::latest()->filter(request(['tag', 'search', 'location']))->paginate(6)
        ]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show',
        [
            'listing' => $listing
        ]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')], //Using 'Rule' class to make company name unique to existing name in row 'company' of table 'listings'
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'], //Email format
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo'))
        {
            /*Putting logo path into db 'logo' column and also storing logo inside 'logos' folder
            in public storage folder*/
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created');
    }

    public function edit(Listing $listing)
    {
        return view('listings.edit',
        [
            'listing' => $listing
        ]);
    }

    public function update(Request $request, Listing $listing)
    {
        // Ensure authenticated user is owner
        if($listing->user_id != auth()->id())
        {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'], //Email format
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo'))
        {
            /*Putting logo path into db 'logo' column and also storing logo inside 'logos' folder
            in public storage folder*/
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing updated');
    }

    public function destroy(Listing $listing)
    {
        // Ensure authenticated user is owner
        if($listing->user_id != auth()->id())
        {
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted');
    }

    public function manage()
    {
        return view('listings.manage',
        [
            'listings' => auth()->user()->listings()->get()
        ]);
    }
}
