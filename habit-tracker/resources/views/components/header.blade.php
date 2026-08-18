<header class="flex border-top border-b-2 justify-between p-4 bg-white">

    <div class="flex gap-2 items-center">
        logo
    </div>

    <div class="flex gap-2 items-center">
        <p>GitHub</p>
        @auth
            <form action={{ route('auth.logout') }} method="POST">
                <button class="bg-white border-2 p-2">Sair</button>
            </form>
        @endauth

        @guest
            <a href={{ route('site.login') }}>Login</a>
        @endguest
    </div>

</header>
