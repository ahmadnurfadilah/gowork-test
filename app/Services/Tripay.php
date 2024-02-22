<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Tripay
{
    public $apiKey;
    public $secretKey;
    public $merchantCode;
    public $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.tripay.key');
        $this->secretKey = config('services.tripay.secret');
        $this->merchantCode = config('services.tripay.merchant');
        $this->baseUrl = config('services.tripay.production') ? 'https://tripay.co.id/api' : 'https://tripay.co.id/api-sandbox';
    }

    // Merchant endpoint
    public function paymentChannel($code = null)
    {
        $data = Cache::remember('tripay:channels', 15*60, function () use ($code) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
            ])->get($this->baseUrl . '/merchant/payment-channel', $code != null ? [
                'code' => $code,
            ] : []);

            return $response->successful() ? $response->json() : ['success' => false, 'message' => $response->json('message') ?? 'Failed to connect payment gateway'];
        });

        if ($data['success'] == false) {
            Cache::forget('tripay:channels');
        }
        return $data;
    }

    public function feeCalculator($amount, $code = null)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->get($this->baseUrl . '/merchant/fee-calculator', $code != null ? [
            'amount' => $amount,
            'code' => $code,
        ] : [
            'amount' => $amount,
        ]);

        return $response->successful() ? $response->json() : ['success' => false, 'message' => $response->json('message') ?? 'Failed to connect payment gateway'];
    }

    // Transactions endpoint
    public function createSignature($ref, $amount)
    {
        $secretKey   = $this->secretKey;
        $merchantCode = $this->merchantCode;
        $merchantRef  = $ref;
        $amount       = $amount;

        return hash_hmac('sha256', $merchantCode . $merchantRef . $amount, $secretKey);
    }

    public function createTransaction($user, $signature, $method, $ref, $amount, $items)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->post($this->baseUrl . '/transaction/create', [
            'signature' => $signature,
            'method' => $method,
            'merchant_ref' => $ref,
            'amount' => $amount,
            'order_items' => $items,
            'customer_name' => $user['name'] ?? '-',
            'customer_email' => $user['email'] ?? '-',
            'customer_phone' => $user['phone'] ?? '-',
            'return_url' => config('app.url') . '/payment',
        ]);

        return $response->successful() ? $response->json() : ['success' => false, 'message' => $response->json('message') ?? 'Failed to connect payment gateway'];
    }
}
