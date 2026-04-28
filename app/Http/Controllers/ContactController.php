<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:500'],
        ]);

        $recipient = config('mail.contact_recipient', 'contacto@audireaudiologia.com');

        Mail::to($recipient)->send(new ContactFormMail(
            contactName: $validated['name'],
            contactEmail: $validated['email'],
            contactSubject: $validated['subject'],
            contactMessage: $validated['message'],
        ));

        return response()->json([
            'success' => true,
            'message' => 'Mensaje enviado correctamente.',
        ]);
    }
}
