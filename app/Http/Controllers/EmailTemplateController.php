<?php

namespace App\Http\Controllers;

use Mail;
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

    public function send_mail(Request $request){
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
            "body" => $request->get('content'),
        );
        $data = array("name" => $request->get('receiverName'), "body" => "Mail gửi về vấn đề ăn chơi");// Body ò mail.blade.php
        Mail::send('mails',$dataEmail, function ($message) use ($to_name, $to_email, $dataEmail){
            $message->to($to_email)->subject($dataEmail['title']);//send this mail with subject
            $message->from($to_email, $to_name);//send from this mail
        });
        //---send mail
//        return redirect('/')->with('message','');
    }
}
