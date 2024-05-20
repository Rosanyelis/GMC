<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMembership;
use App\Http\Requests\UpdateMembership;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Membership::all();
        return view('memberships.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('memberships.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMembership $request)
    {
        Membership::create($request->all());
        return redirect()->route('membership.index')->with('success', 'Membresía creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Membership $membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Membership::find($id);
        return view('memberships.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMembership $request, string $id)
    {
        $data = Membership::find($id);
        $data->update($request->all());
        return redirect()->route('membership.index')->with('success', 'Membresía actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Membership::find($id);
        $data->delete();
        return redirect()->route('membership.index')->with('success', 'Membresía eliminada exitosamente');
    }
}
