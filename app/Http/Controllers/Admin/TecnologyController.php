<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tecnology;
use Illuminate\Http\Request;

class TecnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Tecnology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
        ]);

        $form_data = $request->all();

        $new_tech = Tecnology::create($form_data);

        return to_route('admin.technologies.index', $new_tech);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tecnology $tecnology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tecnology $tecnology)
    {
        return view('admin.technologies.edit', compact('tecnology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tecnology $tecnology)
    {
        $request->validate([
            'name'=>'required|max:255',
        ]);

        $form_data = $request->all();

        $tecnology->update($form_data);

        return to_route('admin.technologies.index', $tecnology);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tecnology $tecnology)
    {
        $tecnology->delete();

        return to_route('admin.technologies.index');
    }
}
