<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    /**
     * Send a user prompt to the Google Gemini API and return the response.
     */
    public function chat(Request $request): JsonResponse
    {
        // Extend PHP execution time to avoid 30s web server limit
        set_time_limit(120);

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
            $response = Http::connectTimeout(10)
                ->timeout(60)
                ->post(
                    "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.6-flash:generateContent?key={$apiKey}",
                    [
                        'system_instruction' => [
                            'parts' => [
                                [
                                    'text' => "Kamu adalah asisten hukum virtual dari D'Mahesa Law Firm, kantor hukum terkemuka di Indonesia. Jawab pertanyaan dengan profesional, ramah, dan dalam bahasa Indonesia. Berikan jawaban yang ringkas dan padat. Jika pertanyaan di luar bidang hukum, arahkan pengguna untuk berkonsultasi langsung dengan advokat kami.",
                                ],
                            ],
                        ],
                        'contents' => [
                            [
                                'parts' => [
                                    [
                                        'text' => $request->prompt,
                                    ],
                                ],
                            ],
                        ],
                        'generationConfig' => [
                            'temperature' => 0.7,
                            'maxOutputTokens' => 1024,
                        ],
                    ]
                );

            if ($response->successful()) {
                $reply = $response->json('candidates.0.content.parts.0.text')
                    ?? 'Maaf, saya tidak dapat memproses permintaan Anda saat ini.';

                return response()->json(['reply' => $reply]);
            }

            Log::warning('Gemini API error', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return response()->json([
                'reply' => 'Terjadi kesalahan saat menghubungi layanan AI. Silakan coba lagi.',
            ]);
        } catch (\Exception $e) {
            Log::error('Chatbot exception', ['message' => $e->getMessage()]);

            return response()->json([
                'reply' => 'Layanan AI sedang tidak tersedia. Silakan coba beberapa saat lagi.',
            ]);
        }
    }
}
