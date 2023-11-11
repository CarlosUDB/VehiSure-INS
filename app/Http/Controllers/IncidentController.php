<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\Workshop;
use App\Models\CarPart;
use App\Models\Requisition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workshops = Workshop::all();

        //checking if the user is from an insurer
        if (!is_null(Auth::user()->insurer_id)) {
            $incidents = Incident::join('workshops as w', 'w.id', '=', 'incidents.workshop_id')
                ->join('insurers as i', 'i.id', '=', 'w.insurer_id')
                ->where('i.id', Auth::user()->insurer_id)
                ->select(
                    'incidents.*'
                )->get();
        }

        //checking if the user is from a workshop
        if (is_null(Auth::user()->insurer_id)) {
            $incidents = Incident::where('workshop_id', Auth::user()->workshop_id)->where('status', 1)
                ->select(
                    'incidents.*'
                )->get();
        }

        return view('incidents.index', [
            'incidents' => $incidents,
            'workshops' => $workshops,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $workshops = Workshop::where('insurer_id', Auth::user()->insurer_id)->get();
        return view('incidents.create', [
            'workshops' => $workshops
        ]);
    }

    public function diagnoseView(Incident $incident)
    {
        return view('incidents.diagnose', [
            'incident' => $incident
        ]);
    }

    public function searchCarPartView(Incident $incident)
    {
        return view('incidents.searchCarPart', [
            'incident' => $incident
        ]);
    }

    public function completeDiagnose(Request $request, $id)
    {
        $request->validate([
            'diagnosis' => 'required',
        ]);

        $incident = Incident::find($id);

        $incident->update([
            'diagnosis' => $request->diagnosis,
            'status' => 'getting_part'
        ]);

        $request->validate([
            'incident_id' => 'required',
            'car_part_id' => 'required',
            'quantity' => 'required',
        ]);

        $requisition = Requisition::create([
            'incident_id' => $request->incident_id,
            'car_part_id' => $request->car_part_id,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('incidents.index')->with('completeDiagnose', 'ok');
    }

    public function requisitions()
    {
        $requisitions = DB::table('requisitions as r')
        ->select('i.id','i.date', 'i.police_report_number', 'i.address', 'i.car_plate_number', 'i.status', 'w.name')
        ->join('incidents as i', 'i.id', '=', 'r.incident_id')
        ->join('workshops as w', 'w.id', '=', 'i.workshop_id')
        ->where('w.id', Auth::user()->workshop_id)
        ->where('i.status', 2)
        ->get();

        return view('incidents.completeRequisitionIndex', [
            'requisitions' => $requisitions
        ]);
    }

    public function completeRequisition($id)
    {
        $incident = Incident::find($id);
        if ($incident) {
            $incident->update([
                'status' => 'purchased_part'
            ]);
            session()->flash('completeDiagnose', 'Requisición actualizada');
            return response()->json(['completeDiagnose' => 'ok']);
        } else {
            return response()->json(['completeDiagnose' => 'Error'], 404);
        }
    }

    public function incidentsPurchasedParts()
    {
        $workshops = Workshop::all();

        //checking if the user is from an insurer
        if (!is_null(Auth::user()->insurer_id)) {
            $incidents = Incident::join('workshops as w', 'w.id', '=', 'incidents.workshop_id')
                ->join('insurers as i', 'i.id', '=', 'w.insurer_id')
                ->where('i.id', Auth::user()->insurer_id)
                ->where('incidents.status', 3)
                ->select(
                    'incidents.*'
                )->get();
        }

        return view('incidents.authorizeIndex', [
            'incidents' => $incidents,
            'workshops' => $workshops,
        ]);
    }

    public function updateAuthorizedIncident($id)
    {
        $incident = Incident::find($id);

        if ($incident) {
            $incident->status = 'fixing';
            $incident->save();

            session()->flash('completeDiagnose', 'Incidente autorizado y listo para reparación');
            return redirect()->back();
        } else {
            return response()->json(['error' => 'Error'], 404);
        }
    }

    public function incidentRepair()
    {
        $workshops = Workshop::all();

        //checking if the user is from an insurer
        if (is_null(Auth::user()->insurer_id)) {
            $incidents = Incident::where('workshop_id', Auth::user()->workshop_id)->where('status', 4)
                ->select(
                    'incidents.*'
                )->get();
        }

        return view('incidents.repairIndex', [
            'incidents' => $incidents,
            'workshops' => $workshops,
        ]);
    }

    public function updateRepairIncident($id)
    {
        $incident = Incident::find($id);

        if ($incident) {
            $incident->status = 'fixed';
            $incident->save();

            session()->flash('completeDiagnose', 'Incidente reparado y finalizado.');
            return redirect()->back();
        } else {
            return response()->json(['error' => 'Error'], 404);
        }
    }


    public function searchCarPartIndex()
    {
        $incidents = Incident::where('workshop_id', Auth::user()->workshop_id)->where('status', 2)
            ->select(
                'incidents.*'
            )->get();
        return view('incidents.carPartIndex', [
            'incidents' => $incidents
        ]);
    }

    public function autocomplete(Request $request): JsonResponse
    {
        $data = CarPart::select("name", "id")
        ->where('name', 'LIKE', '%'. $request->get('query'). '%')
        ->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validando la request
        $request->validate([
            'date' => 'required',
            'description' => 'required',
            'police_report_number' => 'required',
            'address' => 'required',
            'car_plate_number' => 'required',
            'workshop_id' => 'required',
        ]);

        $incident = Incident::create([
            'date' => $request->date,
            'description' => $request->description,
            'police_report_number' => $request->police_report_number,
            'address' => $request->address,
            'car_plate_number' => $request->car_plate_number,
            'workshop_id' => $request->workshop_id,
            'status' => 'diagnosing'
        ]);

        return redirect()->route('incidents.index')->with('created', 'ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(Incident $incident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incident $incident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incident $incident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incident $incident)
    {
        //
    }
}
