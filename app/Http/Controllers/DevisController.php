<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class DevisController extends Controller
{
    public function send(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name'     => 'required|string',
        'email'    => 'required|email',
        'services' => 'required|array',
        'services.*' => 'string',
        'message'  => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()->first()], 422);
    }

    $data = $validator->validated();
    $data['user_message'] = $data['message'];
    unset($data['message']);

    Mail::send('pages.emails.devis', $data, function ($msg) use ($data) {
        $msg->to('aymanguesmi2004@gmail.com')
            ->subject('Nouvelle demande de devis');
    });

    return response('OK', 200);
}
}
