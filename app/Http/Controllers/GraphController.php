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

        if ($request->has('search')) {
            $query = $query->where('json', 'like' ,'%' . $request->input('search') . '%');
        }

        return $query->paginate($perPage);
    }

    public function store (StoreGraphRequest $request) {
        $graph = Graph::create($request->filter());

        return response()->json(['successfully created.']);
    }

    public function show (Graph $graph) {
        return $graph;
    }

    public function update (Graph $graph, UpdateGraphRequest $request) {

        $graph->fill($request->filter())->save();

        return response()->json(['successfully updated.']);

    }

    public function destroy (Graph $graph) {
        $graph->delete();
        return response()->json(['successfully removed.']);
    }

}
