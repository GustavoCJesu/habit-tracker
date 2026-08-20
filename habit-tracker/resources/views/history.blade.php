<x-layout>
    <main class="max-w-7xl mx-auto py-10 min-h-[calc(100vh-160px)] px-4">

        <x-navbar />

        <div>
            @foreach ($avaliableYears as $year)
                <a href="{{ route('habits.history', $year) }}"
                    class="habit-btn habit-shadow-lg p-2 inline-block my-4 {{ $selectedYear == $year ? 'bg-habit-orange' : 'bg-white' }}">{{ $year }}</a>
            @endforeach
        </div>
        <div>
            @forelse($habits as $habit)
                <x-contribution :$habit :year='$selectedYear' />
            @empty
                <div>
                    <p class="text-black">
                        Nenhum hábito para exibir histórico.
                    </p>
                    <a href="{{ route('habits.create') }}" class="underline ">
                        Crie um novo hábito
                    </a>
                </div>
            @endforelse
        </div>

        <div class="h-15">
            @session('success')
                <div class="flex">
                    <p class="bg-green-100 border-2 border-green-400 text-green-700 p-3 mb-4">
                        {{ session('success') }}
                    </p>
                </div>
            @endsession
            @session('delete')
                <div class="flex">
                    <p class="bg-yellow-100 border-2 border-yellow-500 text-yellow-700 p-3 mb-4">
                        {{ session('delete') }}
                    </p>
                </div>
            @endsession
        </div>


    </main>
</x-layout>
