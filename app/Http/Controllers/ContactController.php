<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        try {
            // Simpan pesan ke database
            ContactMessage::create($data);
            
            Log::info('Attempting to send email', ['data' => $data]);

            Mail::send('emails.contact', ['data' => $data], function($message) use ($data) {
                $message->from($data['email'], $data['name']);
                $message->to('tumbelakaandre100@gmail.com');
                $message->subject('Pesan Baru dari Website: ' . $data['subject']);
            });

            Log::info('Email sent successfully');
            return redirect()->back()->with('success', 'Pesan Anda telah terkirim. Terima kasih telah menghubungi kami!');
        } catch (\Exception $e) {
            Log::error('Failed to send email', [
                'error' => $e->getMessage(),
                'data' => $data
            ]);
            
            // Tetap simpan pesan ke database meskipun email gagal terkirim
            try {
                ContactMessage::create($data);
            } catch (\Exception $dbError) {
                Log::error('Failed to save contact message to database', [
                    'error' => $dbError->getMessage(),
                    'data' => $data
                ]);
            }
            
            return redirect()->back()
                ->with('error', 'Maaf, terjadi kesalahan. Silakan coba lagi nanti.')
                ->withInput();
        }
    }
} 