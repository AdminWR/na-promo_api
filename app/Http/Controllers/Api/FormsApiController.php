<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Forms;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use NotificationChannels\Telegram\Telegram;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Notifications\Notification;

class FormsApiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'tel' => 'required|string',
            'email' => 'required|email',
            'msg' => 'required|string',
            'title' => 'nullable|string'
        ]);

        $form = new Forms();
        $form->name = $request->input('name');
        $form->tel = $request->input('tel');
        $form->email = $request->input('email');
        $form->message = $request->input('msg');
        $form->title = $request->input('title');

        if ($form) {
            $form->save();
            $form->notify(new \App\Notifications\Telegram());
            return response('ок', 200);

        } else {
            return response('false', 500);
        }
    }

}
