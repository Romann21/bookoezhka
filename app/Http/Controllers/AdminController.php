<?php

// app/Http/Controllers/AdminController.php
namespace App\Http\Controllers;

use App\Models\BookCard;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function dashboard()
    {
        $cards = BookCard::where('status', 'pending')->get();
        $published = BookCard::where('status', 'approved')->get();
        
        return view('admin.dashboard', compact('cards', 'published'));
    }
    
    public function approve(BookCard $card)
    {
        $card->update(['status' => 'approved']);
        return back()->with('success', 'Карточка одобрена');
    }
    
    public function reject(Request $request, BookCard $card)
    {
        $request->validate(['reason' => 'required']);
        
        $card->update([
            'status' => 'rejected',
            'rejection_reason' => $request->reason,
        ]);
        
        return back()->with('success', 'Карточка отклонена');
    }
}
