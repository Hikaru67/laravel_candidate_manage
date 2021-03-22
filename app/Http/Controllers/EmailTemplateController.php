<?php

namespace App\Http\Controllers;

use Mail;
use App\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Exception;

class EmailTemplateController extends Controller
{
    /**
     * Get all EmailTemplates in the db
     * @return EmailTemplate[]
     */
    public function index(Request $request)
    {
        return EmailTemplate::filter($request)->orderBy('id', 'desc')->get();
    }

    /**
     * Get EmailTemplate by id
     * @param string $id
     * @return EmailTemplate|null
     */
    public function show(string $id): ?EmailTemplate
    {
        return EmailTemplate::find($id);
    }

    /**
     * Add a EmailTemplate to db
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $EmailTemplate = EmailTemplate::create($request->all());

        return response()->json($EmailTemplate, 201);
    }

    /**
     * Update EmailTemplate by id
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $EmailTemplate = EmailTemplate::findOrFail($id);
        $EmailTemplate->update($request->all());

        return response()->json($EmailTemplate, 200);
    }

    /**
     * Delete EmailTemplate by id
     * @param string $id
     * @return JsonResponse
     */
    public function delete(string $id): JsonResponse
    {
        $EmailTemplate = EmailTemplate::findOrFail($id);
        $EmailTemplate->delete();
        return response()->json(null, 204);
    }

    /**
     * Delete EmailTemplate by id
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        $EmailTemplate = EmailTemplate::findOrFail($id);
        $EmailTemplate->delete();
        return response()->json(null, 204);
    }

    public function sendEmail(Request $request): JsonResponse
    {
        try {
            //sendmail
            $request->validate([
                'senderName' => 'required',
                'receiver' => 'required',
                'receiverName' => 'required',
                'title' => 'required',
                'content' => 'required'
            ]);
            $to_name =  $request->get('receiverName');
            $to_email = $request->get('receiver');//send to this mail
            $dataEmail = array(
                "receiverName" => $request->get('receiverName'),
                "title" => $request->get('title'),
                "time" => $request->get('time'),
                "salary" => $request->get('salary'),
                "body" => $request->get('content'),
            );
            $dataEmail['body'] = explode("\n", $dataEmail['body']);
//             dd($dataEmail['body']);
            Mail::send('mails',$dataEmail, function ($message) use ($to_name, $to_email, $dataEmail){
                $message->to($to_email)->subject($dataEmail['title']);//send this mail with subject
                $message->from($to_email, $to_name);//send from this mail
            });

            return response()->json([
                "meta" => ["code" => 200, "msg" => 'Send email success']],
                200);
        }catch (Exception $ex){
            return response()->json([
                "meta" => ["code" => 500, "msg" => "SERVER ERROR"],
                "data" => $ex->getPrevious()],
                500);
        }
    }
}
