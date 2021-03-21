<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate_Profile;
use \Illuminate\Http\JsonResponse;

class CandidateProfileController extends Controller
{
    /**
     * Get all Candidate_profiles in the db with option condition
     * @return Candidate_Profile[]
     */
    public function index(Request $request)
    {
        return $user = Candidate_Profile::filter($request)->orderBy('created_at', 'desc')->Paginate(10);
    }

    /**
     * Get Candidate_Profile by id
     * @param string $id
     * @return Candidate_Profile|null
     */
    public function show(string $id): ?Candidate_Profile
    {
        return Candidate_Profile::find($id);
    }

    /**
     * Add a Candidate_Profile to db
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $Candidate_Profile = Candidate_Profile::create($request->all());

        return response()->json($Candidate_Profile, 201);
    }

    /**
     * Update Candidate_Profile by id
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $Candidate_Profile = Candidate_Profile::findOrFail($id);
        $Candidate_Profile->update($request->all());

        return response()->json($Candidate_Profile, 200);
    }

    /**
     * Delete Candidate_Profile by id
     * @param string $id
     * @return JsonResponse
     */
    public function delete(string $id): JsonResponse
    {
        $Candidate_Profile = Candidate_Profile::findOrFail($id);
        $Candidate_Profile->delete();
        return response()->json(null, 204);
    }
}
