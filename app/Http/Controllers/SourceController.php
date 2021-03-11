<?php

namespace App\Http\Controllers;

use App\Source;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    /**
     * Get all Sources in the db
     * @return Source[]
     */
    public function index()
    {
        return Source::all();
    }

    /**
     * Get Source by id
     * @param string $id
     * @return Source|null
     */
    public function show(string $id): ?Source
    {
        return Source::find($id);
    }

    /**
     * Add a Source to db
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $Source = Source::create($request->all());

        return response()->json($Source, 201);
    }

    /**
     * Update Source by id
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $Source = Source::findOrFail($id);
        $Source->update($request->all());

        return response()->json($Source, 200);
    }

    /**
     * Delete Source by id
     * @param string $id
     * @return JsonResponse
     */
    public function delete(string $id): JsonResponse
    {
        $Source = Source::findOrFail($id);
        $Source->delete();
        return response()->json(null, 204);
    }
}
