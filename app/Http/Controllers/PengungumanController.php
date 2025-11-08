<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengungumanController extends Controller
{
    public function index()
    {
        return view('admin.pengunguman.index');
    }

    public function create()
    {
        return view('admin.pengunguman.create');
    }

    public function edit($id)
    {
        return view('admin.pengunguman.edit', compact('id'));
    }

    public function store(Request $request)
    {
        // Logic to store the announcement
    }

    public function update(Request $request, $id)
    {
        // Logic to update the announcement
    }

    public function destroy($id)
    {
        // Logic to delete the announcement
    }
}
