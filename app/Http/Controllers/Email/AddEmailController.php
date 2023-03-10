<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Models\EmailAddress;

class AddEmailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        info($request);
        $email = new EmailAddress($request['data']);
        $email->web_subs = false;
        info($email);
        $email->save();
        
        return  '{data: {"existing":false}}';
    }
}
