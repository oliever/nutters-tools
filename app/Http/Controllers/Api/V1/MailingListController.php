<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmailAddress;
use App\Jobs\SendVerificationEmailJob;
use App\Models\Store;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MailingListController extends Controller
{
    public function index(){
        //$stores = Store::get();
        $stores = Store::select(['id','store_name'])->get();
        return response()->json($stores);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'store_id' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'postal_code' => 'required|string',
            'email_address' => 'required|email|unique:email_addresses',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        info($request);
        $email = new EmailAddress($request->toArray());
        $email->web_subs = true;
        $email->verification_key = Str::random(32);
        //$email->email_address = "odysseus0210@proton.me";
        info($email);
        $email->save();
        SendVerificationEmailJob::dispatch($email)->delay(now()->addSeconds(10));
    }
}
