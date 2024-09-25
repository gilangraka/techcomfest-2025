@if ($data['team']->is_verified != 1)
    <div class="row mt-3">
        <p style="text-align: justify">
            Untuk mengumpulkan karya, pastikan team sudah terverifikasi!
            <b>(Segera lengkapi data team)</b>
        </p>
    </div>
@else
    <div class="row mt-3">
        <p style="text-align: justify">
            Untuk mengumpulkan karya, pastikan team sudah terverifikasi!
            <b>(Segera lengkapi data team)</b>
        </p>
    </div>
@endif
