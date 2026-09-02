<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    /**
     * Send a user prompt to the Google Gemini API and return the response.
     */
    public function chat(Request $request): JsonResponse
    {
        $request->validate([
            'prompt' => ['required', 'string', 'max:2000'],
        ]);

        $apiKey = config('services.gemini.api_key');

        if (! $apiKey) {
            return response()->json([
                'reply' => 'Layanan AI chatbot belum dikonfigurasi. Silakan hubungi administrator.',
            ]);
        }

        try {
            $response = Http::timeout(30)->post(
                "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.6-flash:generateContent?key={$apiKey}",
                [
                    'contents' => [
                        [
                            'parts' => [
                                [
                                    'text' => "Kamu adalah asisten hukum virtual dari D'Mahesa Law Firm, kantor hukum terkemuka di Indonesia. Jawab pertanyaan dengan profesional, ramah, dan dalam bahasa Indonesia. Jika pertanyaan di luar bidang hukum, arahkan pengguna untuk berkonsultasi langsung dengan advokat kami.\n\nPertanyaan: ".$request->prompt,
                                ],
                            ],
                        ],
                    ],
                    'generationConfig' => [
                        'temperature' => 0.7,
                        'maxOutputTokens' => 512,
                    ],
                ]
            );

            if ($response->successful()) {
                $reply = $response->json('candidates.0.content.parts.0.text')
                    ?? 'Maaf, saya tidak dapat memproses permintaan Anda saat ini.';

                return response()->json(['reply' => $reply]);
            }

            return response()->json([
                'reply' => 'Terjadi kesalahan saat menghubungi layanan AI. Silakan coba lagi.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'reply' => 'Layanan AI sedang tidak tersedia. Silakan coba beberapa saat lagi.',
            ]);
        }
    }
}
