<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitRequest;
use App\Models\Habit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class HabitController extends Controller {
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View {

        return view('habits.create');

    }

    public function index(): View {

        $habits = auth('web')->user()->habits;

        return view('dashboard', compact('habits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HabitRequest $request) {

        $validated = $request->validated();

        /** @var User $user */
        $user = Auth::user();

        $user->habits()->create($validated);

        return redirect(route('site.dashboard'))->with('success', 'Habito Criado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Habit $habit) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habit $habit) {

        return view('habits.edit', compact('habit'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Habit $habit) {


        if($habit->user_id != Auth::user()->id){
            abort(403, "Esse habito não pertence a sua conta");
        }

        $habit->update($request->all());

        return redirect(route('site.dashboard'))->with('success', 'Seu habito foi editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit) {

        if($habit->user_id != Auth::user()->id){
            abort(403, "Esse habito não pertence a sua conta");
        }

        $habit->delete();

        return redirect(route('site.dashboard'))->with('success', 'Hábito deletado com sucesso!');
    }

    public function settings(){

        $habits = Auth::user()->habits;
        return (view('habits.setting', compact('habits')));
    }
}
