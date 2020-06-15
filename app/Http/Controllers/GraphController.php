<?php

namespace App\Http\Controllers;

use App\Graph;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGraphRequest;
use App\Http\Requests\UpdateGraphRequest;

class GraphController extends Controller
{

    public function index (Request $request) {
        $perPage = $request->input('per_page');
        $query = Graph::query();

        if ($request->has('name')) {
            $query = $query->where('name', 'like' ,'%' . $request->input('name') . '%');
        }

        return $query->paginate($perPage);
    }

    public function store (StoreGraphRequest $request) {
        $graph = new Graph();
        $graph->json = $request->input('json');
        $graph->name = $request->input('name');
        $graph->save();

        return response()->json(['successfully created.']);
    }

    public function show (Graph $graph) {
        return $graph;
    }

    public function update (Graph $graph, UpdateGraphRequest $request) {

        $graph->json = $request->input('json');
        $graph->name = $request->input('name');
        $graph->save();

        return response()->json(['successfully updated.']);

    }

    public function destroy (Graph $graph) {
        $graph->delete();
        return response()->json(['successfully removed.']);
    }

}
