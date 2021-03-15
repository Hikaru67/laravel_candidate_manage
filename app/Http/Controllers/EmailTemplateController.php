<?php

namespace App\Http\Controllers;

use App\Email_Template;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EmailTemplateController extends Controller
{
    /**
     * Get all Email_Templates in the db
     * @return Email_Template[]
     */
    public function index()
    {
        return Email_Template::all();
    }

    /**
     * Get Email_Template by id
     * @param string $id
     * @return Email_Template|null
     */
    public function show(string $id): ?Email_Template
    {
        return Email_Template::find($id);
    }

    /**
     * Add a Email_Template to db
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $Email_Template = Email_Template::create($request->all());

        return response()->json($Email_Template, 201);
    }

    /**
     * Update Email_Template by id
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $Email_Template = Email_Template::findOrFail($id);
        $Email_Template->update($request->all());

        return response()->json($Email_Template, 200);
    }

    /**
     * Delete Email_Template by id
     * @param string $id
     * @return JsonResponse
     */
    public function delete(string $id): JsonResponse
    {
        $Email_Template = Email_Template::findOrFail($id);
        $Email_Template->delete();
        return response()->json(null, 204);
    }

    /**
     * Delete Email_Template by id
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        $Email_Template = Email_Template::findOrFail($id);
        $Email_Template->delete();
        return response()->json(null, 204);
    }
}
