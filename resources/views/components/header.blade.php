<header class='bg-white fixed left-0 right-0 z-10 p-2'>
    <nav class='flex justify-between items-center w-[92%] mx-auto'>
        <div>
            <img
                class='w-16 cursor-pointer'
                src='{{ asset('img/tcfest 2025.png') }}'
                alt='Logo Techomfest'
            />
        </div>
        <div
            class='nav-links duration-500 md:static absolute bg-white md:min-h-fit min-h-[60vh] left-0 -top-[800px] md:w-auto w-full flex items-center px-5'
        >
            <ul
                class='flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8'
            >
                @foreach($navItems as $navItem)
                    <x-navbar.nav-item :navItem='$navItem' />
                @endforeach
            </ul>
        </div>
        <div class='flex items-center gap-6'>
           <x-partials.button-link href="{{ url('/login') }}" 
           class="bg-gradient-to-r from-co-dark-blue to-co-pink text-white">
            Masuk
           </x-partials.button-link>
            <ion-icon
                onclick='onToggleMenu(this)'
                name='menu'
                class='text-3xl cursor-pointer md:hidden'
            ></ion-icon>
        </div>
    </nav>
</header>
