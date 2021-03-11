<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Candidate;

class CandidateController extends Controller
{
    /**
     * Get all Candidates in the db
     * @return Candidate[]
     */
    public function index()
    {
        return Candidate::all();
    }

    /**
     * Get Candidate by id
     * @param string $id
     * @return Candidate|null
     */
    public function show(string $id): ?Candidate
    {
        return Candidate::find($id);
    }

    /**
     * Add a Candidate to db
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $Candidate = Candidate::create($request->all());

        return response()->json($Candidate, 201);
    }

    /**
     * Update Candidate by id
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $Candidate = Candidate::findOrFail($id);
        $Candidate->update($request->all());

        return response()->json($Candidate, 200);
    }

    /**
     * Delete Candidate by id
     * @param string $id
     * @return JsonResponse
     */
    public function delete(string $id): JsonResponse
    {
        $Candidate = Candidate::findOrFail($id);
        $Candidate->delete();
        return response()->json(null, 204);
    }
}
