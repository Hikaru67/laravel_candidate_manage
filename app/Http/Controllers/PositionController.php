<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Get all Positions in the db
     * @return Position[]
     */
    public function index()
    {
        return Position::all();
    }

    /**
     * Get Position by id
     * @param string $id
     * @return Position|null
     */
    public function show(string $id): ?Position
    {
        return Position::find($id);
    }

    /**
     * Add a Position to db
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $Position = Position::create($request->all());

        return response()->json($Position, 201);
    }

    /**
     * Update Position by id
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $Position = Position::findOrFail($id);
        $Position->update($request->all());

        return response()->json($Position, 200);
    }

    /**
     * Delete Position by id
     * @param string $id
     * @return JsonResponse
     */
    public function delete(string $id): JsonResponse
    {
        $Position = Position::findOrFail($id);
        $Position->delete();
        return response()->json(null, 204);
    }
}
