 <section id="time-line">
    <div class="text-center my-4 text-slate-800">
    <h2 class="text-3xl md:text-4xl font-bold">Timeline Lomba</h2>
    <p class="font-semibold text-lg">
        Catat tanggalnya yaa, jangan sampai salah..
    </p>
    </div>
    <div class="my-6 p-6 w-full grid">
    <div class="mx-auto md:w-8/12">
        @foreach($timelineItems as $timelineItem)
            <x-sections.timeline-item :timelineItem="$timelineItem"/>
        @endforeach
    </div>
</section>