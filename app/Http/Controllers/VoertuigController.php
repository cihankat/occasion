<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voertuig;
use Illuminate\Support\Facades\Log;

class VoertuigController extends Controller
{
    public function destroy($id)
    {
        try {
            $voertuig = Voertuig::findOrFail($id);
            $voertuig->delete();

            return redirect()->route('dashboard')->with('success', 'Voertuig deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting voertuig: ' . $e->getMessage());
            return redirect()->route('dashboard')->with('error', 'There was an error deleting the voertuig.');
        }
    }

    public function index()
    {
        $voertuigen = Voertuig::all();
        $totalCars = $voertuigen->count();
        $totalCost = $voertuigen->sum('prijs_ingekocht');
        $totalValue = $voertuigen->sum('prijs_te_koop');

        return view('dashboard', compact('voertuigen', 'totalCars', 'totalCost', 'totalValue'));
    }


    public function create()
    {
        return view('voertuigen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kenteken' => 'required|unique:voertuigen',
            'merk' => 'required',
            'type' => 'required',
            'bouwdatum' => 'required|date',
            'prijs_ingekocht' => 'required|numeric',
            'prijs_te_koop' => 'required|numeric',
            'categorie' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $voertuig = new Voertuig();
            $voertuig->kenteken = $request->kenteken;
            $voertuig->merk = $request->merk;
            $voertuig->type = $request->type;
            $voertuig->bouwdatum = $request->bouwdatum;
            $voertuig->prijs_ingekocht = $request->prijs_ingekocht;
            $voertuig->prijs_te_koop = $request->prijs_te_koop;
            $voertuig->categorie = $request->categorie;

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $path = $file->store('fotos', 'public');
                $voertuig->foto_path = $path;
            }

            $voertuig->save();

            return redirect()->route('dashboard')->with('success', 'Voertuig added successfully!');
        } catch (\Exception $e) {
            Log::error('Error saving voertuig: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was an error adding the voertuig.');
        }
    }

    public function edit($id)
    {
        $voertuig = Voertuig::findOrFail($id);
        return view('voertuigen.edit', compact('voertuig'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kenteken' => 'required|unique:voertuigen,kenteken,' . $id,
            'merk' => 'required',
            'type' => 'required',
            'bouwdatum' => 'required|date',
            'prijs_ingekocht' => 'required|numeric',
            'prijs_te_koop' => 'required|numeric',
            'categorie' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $voertuig = Voertuig::findOrFail($id);
            $voertuig->kenteken = $request->kenteken;
            $voertuig->merk = $request->merk;
            $voertuig->type = $request->type;
            $voertuig->bouwdatum = $request->bouwdatum;
            $voertuig->prijs_ingekocht = $request->prijs_ingekocht;
            $voertuig->prijs_te_koop = $request->prijs_te_koop;
            $voertuig->categorie = $request->categorie;

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $path = $file->store('fotos', 'public');
                $voertuig->foto_path = $path;
            }

            $voertuig->save();

            return redirect()->route('dashboard')->with('success', 'Voertuig updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating voertuig: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was an error updating the voertuig.');
        }
    }
}
