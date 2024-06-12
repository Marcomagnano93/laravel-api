<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use App\Models\Type;
use App\Models\Tecnology;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $dashboards = Dashboard::all();

            return view('admin.dashboards.index', compact('dashboards'));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {

            $types = Type::orderBy('name', 'asc')->get();
            $tecnologies = Tecnology::orderBy('name', 'asc')->get();

            return view('admin.dashboards.create', compact('types', 'tecnologies'));
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {

            $request->validate([
                'title'=>'required|max:255',
                'git'=>'required|url',
                'type_id' => 'nullable|exists:types,id',
                'tecnologies' => 'exists:tecnologies,id',
                'description'=>'required'
            ]);

            $form_data = $request->all();
            
            $new_project = Dashboard::create($form_data);


            if ($request->has('tecnologies')) {
                $new_project->tecnologies()->attach($request->tecnologies);
            }


            return to_route('admin.dashboards.show', $new_project);
    
        }

        /**
         * Display the specified resource.
         */
        public function show(Dashboard $dashboard)
        {

            $types = Type::orderBy('name', 'asc')->get();

            return view('admin.dashboards.show', compact('dashboard', 'types'));
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Dashboard $dashboard)
        {

            $types = Type::orderBy('name', 'asc')->get();
            $tecnologies = Tecnology::orderBy('name', 'asc')->get();

            return view('admin.dashboards.edit', compact('dashboard', 'types', 'tecnologies'));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Dashboard $dashboard)
        {
            $request->validate([
                'title'=>'required|max:255',
                'git'=>'required|url',
                'type_id' => 'nullable|exists:types,id',
                'tecnologies' => 'exists:tecnologies,id',
                'description'=>'required'
            ]);

            $form_data = $request->all();

            $dashboard->update($form_data);
            if ($request->has('tecnologies')) {
                $dashboard->tecnologies()->sync($request->tecnologies);
            } else {
                $dashboard->tecnologies()->detach();
            }
            return to_route('admin.dashboards.index', $dashboard);
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Dashboard $dashboard)
        {
            $dashboard->delete();

            return to_route('admin.dashboards.index');

        }
    
}
