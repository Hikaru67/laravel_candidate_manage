<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CandidateProfile;
use \Illuminate\Http\JsonResponse;

class CandidateProfileController extends Controller
{
    /**
     * Get all CandidateProfiles in the db with option condition
     * @return CandidateProfile[]
     */
    public function index(Request $request)
    {
        return $user = CandidateProfile::filter($request)->orderBy('created_at', 'desc')->Paginate(10);
    }

    /**
     * Get CandidateProfile by id
     * @param string $id
     * @return CandidateProfile|null
     */
    public function show(string $id): ?CandidateProfile
    {
        return CandidateProfile::find($id);
    }

    /**
     * Add a CandidateProfile to db
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $CandidateProfile = CandidateProfile::create($request->all());

        return response()->json($CandidateProfile, 201);
    }

    /**
     * Update CandidateProfile by id
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $CandidateProfile = CandidateProfile::findOrFail($id);
        $CandidateProfile->update($request->all());

        return response()->json($CandidateProfile, 200);
    }

    /**
     * Delete CandidateProfile by id
     * @param string $id
     * @return JsonResponse
     */
    public function delete(string $id): JsonResponse
    {
        $CandidateProfile = CandidateProfile::findOrFail($id);
        $CandidateProfile->delete();
        return response()->json(null, 204);
    }
}
