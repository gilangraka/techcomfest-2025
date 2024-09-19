@extends('layouts.competition-detail') @section('content')
<div class="my-8">
    <x-partials.button-link
        href="/"
        class="w-[150px] flex items-center gap-2 bg-slate-100"
    >
        <x-partials.back-svg />
        Kembali
    </x-partials.button-link>
</div>
<section class="grid md:grid-cols-2 items-center justify-center mx-auto gap-4">
    <x-sections.competition.header
        imgUrl="ctf.png"
        title="capture the flag"
        price="65.000"
        category="Umum"
        team="3"
        deadline="Oktober 2024"
        description="Lorem ipsum dolor sit amet, con"
    />
</section>

<section class="my-12 text-slate-800 grid md:grid-cols-2 md:gap-8">
    <x-sections.competition.competition-information :techStack="$techStackCtf" />
    <x-sections.competition.assesment-section />
</section>
@endsection
