<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitRequest;
use App\Models\Habit;
use App\Models\HabitLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class HabitController extends Controller {
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View {

        return view('habits.create');

    }

    private function user(): User{
        return Auth::user();
    }

    public function index(): View {

        $habits = $this->user()->habits()->with('habitLog')->get();

        return view('dashboard', compact('habits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HabitRequest $request) {

        $validated = $request->validated();

        $this->user()->habits()->create($validated);

        return redirect(route('habits.index'))->with('success', 'Habito Criado com sucesso!');

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


        if($habit->user_id != $this->user()->id){
            abort(403, "Esse habito não pertence a sua conta");
        }

        $habit->update($request->all());

        return redirect(route('habits.index'))->with('success', 'Seu habito foi editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit) {

        if($habit->user_id != $this->user()->id){
            abort(403, "Esse habito não pertence a sua conta");
        }

        $habit->delete();

        return redirect(route('habits.index'))->with('success', 'Hábito deletado com sucesso!');
    }

    public function settings(){

        $habits = $this->user()->habits;
        return (view('habits.setting', compact('habits')));
    }

    public function toggle(Habit $habit) {

        if($habit->user_id != $this->user()->id){
            abort(403, "Esse habito não pertence a sua conta");
        }

        $today = Carbon::today()->toDateString();

        $log = HabitLog::query()
        ->where('habit_id', $habit->id)
        ->where('completed_at', $today)
        ->first();

        if($log){
            $log->delete();
            $status = 'delete';
            $message = 'Hábito desmarcado.';
        }else{
            HabitLog::create([
                'habit_id'=> $habit->id,
                'user_id' => $this->user()->id,
                'completed_at' => $today,
            ]);
            $status = 'success';
            $message = 'Hábito concluido!!';
        }

        return redirect(route('habits.index'))
        ->with($status, $message);
    }
}
