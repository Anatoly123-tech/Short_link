<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    public function index()
    {
        $links = Auth::user()->links()->get();
        return view('links.index', compact('links'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'url'=> 'required|url',
        ]);
        Link::create([
            'user_id'=> Auth::user()->id,
            'url'=> $request->url,
            'code'=>Link::generateCode()
        ]);
        return redirect()->route('links.index')->with('success', 'Вы создали ссылку');
    }
    public function stats($id)
    {
        $links = Link::find($id);
        $clicklinks = $links->clicklinks()->orderBy('clicked', 'desc')->get();
        return view('links.stats', compact('links', 'clicklinks'));
    }
    public function destroy($id)
    {
        $link = Link::find($id);
        $link -> delete();
        return redirect()->route('links.index')->with('success', 'Вы удалили ссылку');
    }
}
