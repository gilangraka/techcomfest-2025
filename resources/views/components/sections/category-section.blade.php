<section id="category" class="">
    <div class="text-center my-4 text-slate-800">
        <h2 class="text-3xl md:text-4xl font-bold">Kategori Lomba</h2>
        <p class="font-semibold text-lg">
            Ada lomba apa aja sih di Techcomfest?
        </p>
    </div>
    <ul class="flex flex-wrap justify-center gap-6 px-12 py-6 md:px-4">
        @foreach($categoryItems as $categoryItem)
        <x-sections.category-item :categoryItem="$categoryItem" />
        @endforeach
    </ul>
</section>
