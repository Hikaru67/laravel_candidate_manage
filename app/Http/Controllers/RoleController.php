<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Get all Roles in the db
     * @return Role[]
     */
    public function index()
    {
        return Role::all();
    }

    /**
     * Get Role by id
     * @param string $id
     * @return Role|null
     */
    public function show(string $id): ?Role
    {
        return Role::find($id);
    }

    /**
     * Add a Role to db
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $Role = Role::create($request->all());

        return response()->json($Role, 201);
    }

    /**
     * Update Role by id
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $Role = Role::findOrFail($id);
        $Role->update($request->all());

        return response()->json($Role, 200);
    }

    /**
     * Delete Role by id
     * @param string $id
     * @return JsonResponse
     */
    public function delete(string $id): JsonResponse
    {
        $Role = Role::findOrFail($id);
        $Role->delete();
        return response()->json(null, 204);
    }
}
