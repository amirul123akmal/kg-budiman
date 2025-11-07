<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FasilitiController extends Controller
{
    public function index()
    {
        return view('admin.fasiliti.index');
    }

    public function create()
    {
        return view('admin.fasiliti.create');
    }

    public function store(Request $request)
    {
        // Logic to store fasiliti
    }

    public function edit($id)
    {
        return view('admin.fasiliti.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update fasiliti
    }

    public function delete($id)
    {
        // Logic to delete fasiliti
    }
}
