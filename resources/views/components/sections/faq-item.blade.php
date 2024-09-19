<li>
    <details class="p-2 bg-slate-100 m-3 hover:cursor-pointer rounded-md" >
        <summary class="p-2 text-[#263B81] font-semibold">
            {{ $faqItem->question }}
        </summary>
        <p class="p-2 text-slate-700">
            {{ $faqItem->answer }}
        </p>
    </details>
</li>