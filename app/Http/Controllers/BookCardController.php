<?php

// app/Http/Controllers/BookCardController.php
namespace App\Http\Controllers;

use App\Models\BookCard;
use Illuminate\Http\Request;

class BookCardController extends Controller
{
    public function index()
    {
        $cards = auth()->user()->cards()
            ->whereIn('status', ['pending', 'approved'])
            ->get();
            
        $archived = auth()->user()->cards()
            ->whereIn('status', ['rejected', 'archived'])
            ->get();
            
        return view('cards.index', compact('cards', 'archived'));
    }
    
    public function create()
    {
        return view('cards.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required',
            'title' => 'required',
            'type' => 'required|in:give,take',
        ]);
        
        auth()->user()->cards()->create([
            'author' => $request->author,
            'title' => $request->title,
            'type' => $request->type,
            'status' => 'pending',
        ]);
        
        return redirect()->route('cards.index')->with('success', 'Карточка отправлена на модерацию');
    }
    
    public function destroy(BookCard $card)
    {
        if ($card->user_id !== auth()->id()) {
            abort(403);
        }
        
        $card->update(['status' => 'archived']);
        
        return back()->with('success', 'Карточка перемещена в архив');
    }
}