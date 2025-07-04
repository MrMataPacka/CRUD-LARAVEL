<?php

namespace App\Http\Controllers;

use App\Models\AtTown;
use App\Models\AtState;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CityController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(
                AtTown::with('atState')
            )
            ->addColumn('province', function ($town) {
                return $town->atState->name ?? 'N/A';
            })
            ->addColumn('country', function () {
                return 'México';
            })
            ->addColumn('acciones', function ($town) {
                $showUrl = route('cities.show', $town->towid);
                $editUrl = route('cities.edit', $town->towid);
                $deleteUrl = route('cities.destroy', $town->towid);

                return view('components.cities-actions', compact('showUrl', 'editUrl', 'deleteUrl'))->render();
            })
            ->rawColumns(['acciones'])
            ->toJson();
        }

        return view('cities.index', [
            'breadcrumb' => [
                'Inicio' => route('dashboard'),
                'Cities' => null,
            ]
        ]);
    }

    public function create()
    {
        $states = AtState::all();
        return view('cities.form', [
            'action' => route('cities.store'),
            'method' => 'POST',
            'breadcrumb' => ['Inicio'=>route('dashboard'), 'Cities'=>route('cities.index'), 'Crear city'=>null],
            'city' => new AtTown(),
            'states' => $states,
            'title' => 'Crear City'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'staid' => 'required|exists:at_state,staid',
        ]);

        $town = new AtTown();
        $town->name = $request->input('name');
        $town->staid = $request->input('staid');
        $town->save();

        return redirect()->route('cities.show', $town->towid);
    }

    public function show($id)
    {
        $town = AtTown::with('atState')->findOrFail($id);
        $city = [
            'id' => $town->towid,
            'name' => $town->name,
            'province' => $town->atState ? $town->atState->name : 'N/A',
            'country' => 'México',
        ];

        return view('cities.show', [
            'city' => $city,
            'breadcrumb' => ['Inicio'=>route('dashboard'), 'Cities'=>route('cities.index'), $city['name']=>null],
        ]);
    }

    public function edit($id)
    {
        $town = AtTown::findOrFail($id);
        $states = AtState::all();

        return view('cities.form', [
            'action' => route('cities.update', $id),
            'method' => 'PUT',
            'breadcrumb' => ['Inicio'=>route('dashboard'), 'Cities'=>route('cities.index'), $town->name=>route('cities.show',$id), 'Actualizar'=>null],
            'city' => $town,
            'states' => $states,
            'title' => 'Actualizar City'
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'staid' => 'required|exists:at_state,staid',
        ]);

        $town = AtTown::findOrFail($id);
        $town->name = $request->input('name');
        $town->staid = $request->input('staid');
        $town->save();

        return redirect()->route('cities.show', $id);
    }

    public function destroy($id)
    {
        $town = AtTown::findOrFail($id);
        $town->delete();

        return redirect()->route('cities.index');
    }
}
