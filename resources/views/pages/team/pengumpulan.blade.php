@if ($data['team']->is_verified != 1)
    <div class="row mt-3">
        <p style="text-align: justify">
            Untuk mengumpulkan karya, pastikan team sudah terverifikasi!
            <b>(Segera lengkapi data team)</b>
        </p>
    </div>
@else
    <form id="submitForm" action="{{ route('pengumpulan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-3">
            <label class="col-md-4 col-lg-3 col-form-label">ID Team</label>
            <div class="col-md-8 col-lg-9">
                <input type="text" class="form-control" value="{{ $data['team']->id }}" disabled>
            </div>
        </div>

        @if ($data['team']->kategori_id == 1)
            <div class="row mt-3">
                <label for="link_host" class="col-md-4 col-lg-3 col-form-label">Link Host</label>
                <div class="col-md-8 col-lg-9">
                    <input name="link_host" type="text" class="form-control" placeholder="https://linkhost.xyz"
                        @if ($data['pengumpulan'] != null) disabled value="{{ $data['pengumpulan']->link_host }}" @endif>
                </div>
            </div>
            <div class="row mt-3">
                <label for="link_git" class="col-md-4 col-lg-3 col-form-label">Link Git</label>
                <div class="col-md-8 col-lg-9">
                    <input name="link_git" type="text" class="form-control"
                        placeholder="https://github.com/nama_akun/nama_repository"
                        @if ($data['pengumpulan'] != null) value="{{ $data['pengumpulan']->link_git }}" disabled @endif>
                </div>
            </div>
        @endif

        @if ($data['team']->kategori_id == 2)
            <div class="row mt-3">
                <label for="file_rar" class="col-md-4 col-lg-3 col-form-label">File RAR</label>
                <div class="col-md-8 col-lg-9">
                    @if ($data['pengumpulan'] != null)
                        <a class="btn btn-primary"
                            href="{{ route('berkas.download', ['3', $data['pengumpulan']->file_rar]) }}">
                            <i class="nav-icon bi bi-eye"></i>
                        </a>
                    @else
                        <input name="file_rar" type="file" accept=".zip, .rar" class="form-control">
                    @endif
                </div>
            </div>
        @endif

        @if ($data['team']->kategori_id == 3)
            <div class="row mt-3">
                <label for="orisinalitas_karya" class="col-md-4 col-lg-3 col-form-label">Orisinalitas Karya</label>
                <div class="col-md-8 col-lg-9">
                    @if ($data['pengumpulan'] != null)
                        <a class="btn btn-primary"
                            href="{{ route('berkas.download', ['4', $data['pengumpulan']->orisinalitas_karya]) }}">
                            <i class="nav-icon bi bi-eye"></i>
                        </a>
                    @else
                        <div class="col-md-8 col-lg-9">
                            <input name="orisinalitas_karya" type="file" accept=".pdf, .docx" class="form-control">
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mt-3">
                <label for="hasil_karya" class="col-md-4 col-lg-3 col-form-label">Hasil Karya</label>
                <div class="col-md-8 col-lg-9">
                    @if ($data['pengumpulan'] != null)
                        <a class="btn btn-primary"
                            href="{{ route('berkas.download', ['5', $data['pengumpulan']->hasil_karya]) }}">
                            <i class="nav-icon bi bi-eye"></i>
                        </a>
                    @else
                        <input name="hasil_karya" type="file" accept=".pdf, .docx" class="form-control">
                    @endif
                </div>
            </div>
        @endif

        <div class="row mt-4 mt-md-3">
            <div class="col-12">
                @if ($data['pengumpulan'] == null)
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                        data-bs-target="#submitModal">
                        SUBMIT PENGUMPULAN
                    </button>
                @endif
            </div>
        </div>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="submitModal" tabindex="-1" aria-labelledby="submitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="submitModalLabel">Konfirmasi Pengumpulan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Yakin ingin mengumpulkan karya? <span class="fw-bold">(Karya yang sudah dikumpulkan
                        <span class="text-danger"><b><u>tidak bisa</u></b></span> di ubah lagi)</span></span>
                </div>
                <div class="modal-footer">
                    <button onclick="document.getElementById('submitForm').submit()" type="submit"
                        class="btn btn-primary w-100">KUMPULKAN</button>
                </div>
            </div>
        </div>
    </div>
@endif
