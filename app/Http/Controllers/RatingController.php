<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index(): JsonResponse
    {
        $ratings = Rating::approved()
            ->latest()
            ->get(['id', 'overall', 'price', 'service', 'staff', 'quality', 'comment', 'reviewer_name', 'created_at']);

        $stats = Rating::globalStats();

        return response()->json([
            'average' => $stats['average'],
            'count'   => $stats['count'],
            'ratings' => $ratings,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'overall'       => ['required', 'integer', 'min:1', 'max:5'],
            'price'         => ['nullable', 'integer', 'min:1', 'max:5'],
            'service'       => ['nullable', 'integer', 'min:1', 'max:5'],
            'staff'         => ['nullable', 'integer', 'min:1', 'max:5'],
            'quality'       => ['nullable', 'integer', 'min:1', 'max:5'],
            'comment'       => ['nullable', 'string', 'max:1000'],
            'reviewer_name' => ['nullable', 'string', 'max:100'],
        ]);

        Rating::create(array_merge($validated, ['is_approved' => true]));

        return response()->json([
            'success' => true,
            'message' => 'شكراً لتقييمك! تم نشر تقييمك بنجاح.',
        ]);
    }
}
