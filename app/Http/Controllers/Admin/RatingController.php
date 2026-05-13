<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index(): JsonResponse
    {
        $ratings = Rating::latest()->get();

        return response()->json([
            'ratings' => $ratings,
            'stats'   => Rating::globalStats(),
        ]);
    }

    public function viewIndex()
    {
        $ratings      = Rating::latest()->paginate(20);
        $stats        = Rating::globalStats();
        $pendingCount = Rating::pending()->count();

        return view('admin.ratings.index', compact('ratings', 'stats', 'pendingCount'));
    }

    public function approve(Rating $rating): JsonResponse
    {
        $rating->update(['is_approved' => true]);

        return response()->json(['success' => true, 'message' => 'تم نشر التقييم.']);
    }

    public function destroy(Rating $rating): JsonResponse
    {
        $rating->delete();

        return response()->json(['success' => true, 'message' => 'تم حذف التقييم.']);
    }
}
