@props(["imgUrl", "title", "price", "category", "team", "deadline", "description"])

<div class="w-full grid">
    <img
        src="{{ asset('img/'.$imgUrl) }}"
        alt=""
        class="w-full mx-auto md:mx-0 md:w-9/12 rounded-lg"
    />
</div>
<div class="w-full">
    <h1 class="text-3xl font-bold uppercase">{{ $title }}</h1>
    <h3
        class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#263B81] to-[#DB0056]"
    >
        Rp {{ $price }}
    </h3>

    <div class="my-8">
        <ul>
            <li class="font-medium">
                Kategori: <span class="text-slate-800">{{ $category }}</span>
            </li>
            <li class="font-medium">
                Tim :
                <span class="text-slate-800">Maks. {{ $team }} Anggota</span>
            </li>
            <li class="font-medium">
                Deadline :
                <span class="text-slate-800">{{ $deadline }}</span>
            </li>
        </ul>
    </div>
    <div class="my-8">
        <div class="my-4">
            <h4 class="text-lg font-medium mb-1">Deskripsi</h4>
            <p class="text-slate-800">
                {{ $description }}
            </p>
        </div>
        <div class="my-8">
            <div class="flex gap-8">
                <a
                    href="http://"
                    class="text-white bg-gradient-to-r from-[#DB0056] to-[#263B81] p-2 px-4 rounded-full"
                    >Informasi Lomba</a
                >
                <a
                    href="http://"
                    class="text-white bg-gradient-to-r from-[#263B81] to-[#DB0056] p-2 px-4 rounded-full"
                    >Daftar Lomba</a
                >
            </div>
        </div>
    </div>
</div>
