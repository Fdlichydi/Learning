<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    // public function respond(Request $request)
    // {
    //     $message = strtolower($request->message);
    //     $response = 'Maaf, saya tidak mengerti pertanyaan Anda.';

    //     if (str_contains($message, 'kelas')) {
    //         $response = 'Untuk melihat kelas, silakan klik menu kelas di sebelah kiri.';
    //     } elseif (str_contains($message, 'tugas')) {
    //         $response = 'Tugas Anda bisa dilihat di menu Tugas.';
    //     } elseif (str_contains($message, 'materi')) {
    //         $response = 'Materi tersedia di bagian Materi Kelas.';
    //     } elseif (str_contains($message, 'halo') || str_contains($message, 'hai')) {
    //         $response = 'Halo! Ada yang bisa saya bantu?';
    //     }

    //     return response()->json(['response' => $response]);
    // }

    public function respond(Request $request)
    {
        $userMessage = $request->input('message');

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('COHERE_API_KEY'),
        'Content-Type' => 'application/json',
    ])->post('https://api.cohere.ai/v1/generate', [
        'model' => 'command', // bisa juga coba "command-light"
        'prompt' => "Jawab pertanyaan berikut dalam Bahasa Indonesia:\n" . $userMessage,
        'max_tokens' => 100,
        'temperature' => 0.7,
    ]);

    $data = $response->json();

    return response()->json([
        'response' => $data['generations'][0]['text'] ?? 'Maaf, saya tidak bisa menjawab saat ini.',
    ]);
    }
}
