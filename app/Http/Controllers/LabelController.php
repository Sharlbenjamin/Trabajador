<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabelStoreRequest;
use App\Http\Requests\LabelUpdateRequest;
use App\Models\Label;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LabelController extends Controller
{
    public function index(Request $request): View
    {
        $labels = Label::all();

        return view('label.index', compact('labels'));
    }

    public function create(Request $request): View
    {
        return view('label.create');
    }

    public function store(LabelStoreRequest $request): RedirectResponse
    {
        $label = Label::create($request->validated());

        $request->session()->flash('label.id', $label->id);

        return redirect()->route('labels.index');
    }

    public function show(Request $request, Label $label): View
    {
        return view('label.show', compact('label'));
    }

    public function edit(Request $request, Label $label): View
    {
        return view('label.edit', compact('label'));
    }

    public function update(LabelUpdateRequest $request, Label $label): RedirectResponse
    {
        $label->update($request->validated());

        $request->session()->flash('label.id', $label->id);

        return redirect()->route('labels.index');
    }

    public function destroy(Request $request, Label $label): RedirectResponse
    {
        $label->delete();

        return redirect()->route('labels.index');
    }
}
