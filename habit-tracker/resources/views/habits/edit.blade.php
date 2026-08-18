<x-layout>
    <main class="py-10">
        <section class="bg-white max-w-150 mx-auto p-10 border-2 mt-4 ">

            <h1 class="font-bold text-3xl">Edite seu hábito</h1>

            <form class="flex flex-col" action="{{ route('habit.update', $habit->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-2 mb-4">
                    <label for="name">Nome do Hábito</label>
                    <input type="text" name="name" placeholder="Ler um livro..."
                        class="bg-white p-2 border-2" value="{{ $habit->name }}">
                </div>
                <button type="submit" class="bg-white border-2 p-2 hover:bg-amber-200 transition">
                    Editar Habito
                </button>
            </form>
        </section>
    </main>
</x-layout>
