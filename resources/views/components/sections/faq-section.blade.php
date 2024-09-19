<section id="faq">
    <div class="text-center my-4 text-slate-800">
        <h2 class="text-3xl md:text-4xl font-bold">
            Frequently Asked Question
        </h2>
        <p class="font-semibold text-lg">
            Yang sering ditanyakan terkait Techcomfest.
        </p>
    </div>

    <ul class="px-6 md:px-24 py-6">
        @foreach($faqItems as $faqItem)
        <x-sections.faq-item :faqItem="$faqItem" />
        @endforeach
    </ul>
</section>
