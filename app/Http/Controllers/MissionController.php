<?php

namespace App\Http\Controllers;

use App\Http\Requests\MissionStoreRequest;
use App\Http\Requests\MissionUpdateRequest;
use App\Models\Mission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MissionController extends Controller
{
    public function index(Request $request): View
    {
        $missions = Mission::all();

        return view('mission.index', compact('missions'));
    }

    public function create(Request $request): View
    {
        return view('mission.create');
    }

    public function store(MissionStoreRequest $request): RedirectResponse
    {
        $mission = Mission::create($request->validated());

        $request->session()->flash('mission.id', $mission->id);

        return redirect()->route('missions.index');
    }

    public function show(Request $request, Mission $mission): View
    {
        return view('mission.show', compact('mission'));
    }

    public function edit(Request $request, Mission $mission): View
    {
        return view('mission.edit', compact('mission'));
    }

    public function update(MissionUpdateRequest $request, Mission $mission): RedirectResponse
    {
        $mission->update($request->validated());

        $request->session()->flash('mission.id', $mission->id);

        return redirect()->route('missions.index');
    }

    public function destroy(Request $request, Mission $mission): RedirectResponse
    {
        $mission->delete();

        return redirect()->route('missions.index');
    }
}
