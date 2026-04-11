<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Faq::query();

            if ($request->has('page')) {
                $query->where('page', $request->page);
            }

            $faqs = $query->orderBy('sort_order')->get();

            return response()->json([
                'success' => true,
                'data' => $faqs
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
