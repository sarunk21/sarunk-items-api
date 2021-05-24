<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return response()->json($items);
    }

    public function store(Request $request)
    {
        $imgName = Str::random(20).'.'.$request->file('gambar')->clientExtension();

        Item::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'gambar' => $imgName,
            'deskripsi' => $request->deskripsi
        ]);

        $request->file('gambar')->storeAs('public/img', $imgName);
    }
}
