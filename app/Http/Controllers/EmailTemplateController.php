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
        $this->validate($request, [
            'name' => 'required',
            'from' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);
        $email = $request;
        $to_name = "Shopping All4You";
        $to_email = "shinigamii.hikaru@gmail.com";//send to this mail

        $data = array("name" => $request->get('name'), "body" => "Mail gửi về vấn đề ăn chơi");// Body ò mail.blade.php
        Mail::send('mails',$data, function ($message) use ($to_name, $to_email){
            $message->to($to_email)->subject('Test 01');//send this mail with subject
            $message->from($to_email, $to_name);//send from this mail
        });
        //---send mail
//        return redirect('/')->with('message','');
    }
}
