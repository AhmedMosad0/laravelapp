<x-layout>

    <div>
        <div style="text-align: center;">
            <h1>
                Welcome To Robusta Recruitment!
            </h1>
        </div>
        <div style="text-align:right;">
            @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                <a href="{{ route('dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                <div style="display: flex; justify-content: flex-end; align-items: center;">
                    <form action="{{ route('register') }}" method="GET" style="margin-right: 10px;">
                        <button type="submit" class="btn btn-primary" style="padding: 5px 10px; font-size: 20px;">Register</button>
                    </form>
                    <form action="{{ route('login') }}" method="GET">
                        <button type="submit" class="btn btn-secondary" style="padding: 5px 10px; font-size: 20px;">Log in</button>
                    </form>
                </div>

                @endauth
            </div>

            @endif
        </div>
    </div>

</x-layout>