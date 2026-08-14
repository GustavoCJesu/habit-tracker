<x-layout>
    <main class="py-10">
        <h1>
            Veja seus habitos
        </h1>
        @auth
            <h2>
                Bem vindo {{ $nome }}!!
            </h2>
            <p>Voce esta logado!!!</p>
        @endauth
    </main>
</x-layout>
