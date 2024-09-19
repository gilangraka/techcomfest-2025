<li class="relative max-w-[500px]">
    <img
        src="{{ asset('img/'.$categoryItem->imgUrl) }}"
        alt="{{ $categoryItem->title }}"
        class="rounded-md max-w-[350px] lg:max-w-[300px]"
    />
    <div
        class="absolute bottom-0 right-0 left-0 grid grid-cols-2 justify-center items-center m-4"
    >
        <div class="text-white flex gap-2 items-center p-2">
            <x-partials.people-svg />
            <p>{{ $categoryItem->maxTeam }} MAKS</p>
        </div>
        <div class="grid mx-auto">
            <a
                href="{{'/competition/'.$categoryItem->href}}"
                class="bg-white p-3 px-6 md:p-2 md:px-4 rounded-xl"
            >
                Lihat Detail
            </a>
        </div>
    </div>
</li>