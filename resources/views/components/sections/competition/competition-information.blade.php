<div>
    <h4 class="text-xl font-semibold">Informasi Lomba</h4>
    <div class="flex justify-between gap-3 items-center my-2">
        <div class="flex gap-2 items-center">
            <div
                class="rounded-full p-3 bg-gradient-to-r from-[#263B81] to-[#DB0056]"
            >
                <x-partials.book-svg />
            </div>
            <div class="text-sm">
                <p class="font-medium">Buku Petunjuk</p>
                <p class="font-semibold">Web App Competition</p>
            </div>
        </div>
        <div class="p-2">
            <x-partials.button-link
                href=""
                class="bg-gradient-to-r from-co-dark-blue to-co-pink text-white"
            >
                Download
            </x-partials.button-link>
        </div>
    </div>
    <div class="my-8">
        <h4 class="text-xl font-semibold">Tech Stack</h4>
        <ul class="grid grid-cols-3 gap-4 my-2">
            @foreach($techStack as $ts)
            <li
                class="flex gap-2 text-sm font-medium bg-slate-100 p-2 px-2 md:px-4 rounded-full"
            >
                <img src="{{ $ts->imgUrl }}" alt="{{ $ts->name }}" class="w-[20px]" />
                {{ $ts->name }}
            </li>
            @endforeach
        </ul>
    </div>
</div>
