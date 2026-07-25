<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Validation\Rule;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institutions = Institution::with( 'domains')->get();
        return Inertia::render('institutions/index', [
            'institutions' => $institutions,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('institutions/create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'domain' => [
                'required',
                'string',
                'regex:/^[a-z0-9-]+$/',
                Rule::unique('domains', 'domain'),
            ],
        ]);

        $institution = Institution::create([
            'id' => uniqid(),
            'name' => $validated['name'],
        ]);

        $institution->domains()->create([
            'domain' => $validated['domain'],
        ]);

        return redirect()
            ->route('institutions.index')
            ->with('success', 'Institution created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Institution $institution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Institution $institution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Institution $institution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institution $institution)
    {
        //
    }
    public function checkDomain(Request $request)
    {
        $request->validate([
            'domain' => [
                'required',
                'regex:/^[a-z0-9-]+$/',
            ],
        ]);


        $exists = Domain::where('domain')->exists();

        return response()->json([
            'available' => !$exists,
        ]);
    }
}
