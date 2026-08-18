<header class="flex border-top border-b-2 justify-between p-4 bg-white">

    <div class="flex items-center gap-2">
        <a href="{{ route('habits.index') }}" class="habit-btn habit-shadow-lg px-2 py-1 bg-habit-orange">
            HT
        </a>
        <p>Habit Tracker</p>
    </div>

    <div class="flex gap-2 items-center">
        @auth
            <form class="inline" action={{ route('auth.logout') }} method="POST">
                @csrf
                <button class="bg-white habit-shadow-lg habit-btn border-2 p-2">Sair</button>
            </form>
        @endauth

        @guest
            <div class="flex gap-2">
                <a href={{ route('site.login') }} class="habit-shadow-lg p-2 bg-habit-orange habit-btn">Login</a>
                <a href="{{ route('site.register') }}" class="habit-shadow-lg p-2 habit-btn">Registrar-se</a>
            </div>
        @endguest
    </div>

</header>
