@extends('layouts.admin')
@section('judul', 'Edit Link')

@section('konten')

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="komik-card p-4">

            <div class="mb-4">
                <a href="{{ route('admin.links.index') }}"
                   class="btn btn-sm btn-komik"
                   style="background:#fff; color:#1A1A2E;">
                    ← Kembali
                </a>
            </div>

            <form action="{{ route('admin.links.update', $link) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold" style="text-transform:uppercase; letter-spacing:0.5px; font-size:0.85rem;">
                        📝 Judul Link <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul', $link->judul) }}"
                        style="border:3px solid #1A1A2E; border-radius:10px; box-shadow:3px 3px 0 #1A1A2E; font-weight:700;">
                    @error('judul') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold" style="text-transform:uppercase; letter-spacing:0.5px; font-size:0.85rem;">
                        🔗 URL <span class="text-danger">*</span>
                    </label>
                    <input type="url" name="url"
                        class="form-control @error('url') is-invalid @enderror"
                        value="{{ old('url', $link->url) }}"
                        style="border:3px solid #1A1A2E; border-radius:10px; box-shadow:3px 3px 0 #1A1A2E; font-weight:700;">
                    @error('url') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-4">
                        <label class="form-label fw-bold" style="text-transform:uppercase; letter-spacing:0.5px; font-size:0.85rem;">
                            😀 Ikon (Emoji)
                        </label>
                        <input type="text" name="ikon"
                            class="form-control text-center"
                            value="{{ old('ikon', $link->ikon) }}"
                            maxlength="5"
                            style="border:3px solid #1A1A2E; border-radius:10px; box-shadow:3px 3px 0 #1A1A2E; font-size:1.5rem; font-weight:700;">
                    </div>
                    <div class="col-4">
                        <label class="form-label fw-bold" style="text-transform:uppercase; letter-spacing:0.5px; font-size:0.85rem;">
                            🎨 Warna Tombol
                        </label>
                        <input type="color" name="warna_bg"
                            class="form-control form-control-color w-100"
                            value="{{ old('warna_bg', $link->warna_bg) }}"
                            style="border:3px solid #1A1A2E; border-radius:10px; height:50px; box-shadow:3px 3px 0 #1A1A2E;">
                    </div>
                    <div class="col-4">
                        <label class="form-label fw-bold" style="text-transform:uppercase; letter-spacing:0.5px; font-size:0.85rem;">
                            🖊️ Warna Teks
                        </label>
                        <input type="color" name="warna_teks"
                            class="form-control form-control-color w-100"
                            value="{{ old('warna_teks', $link->warna_teks) }}"
                            style="border:3px solid #1A1A2E; border-radius:10px; height:50px; box-shadow:3px 3px 0 #1A1A2E;">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold" style="text-transform:uppercase; letter-spacing:0.5px; font-size:0.85rem;">
                        🔢 Urutan
                    </label>
                    <input type="number" name="urutan"
                        class="form-control"
                        value="{{ old('urutan', $link->urutan) }}"
                        min="0"
                        style="border:3px solid #1A1A2E; border-radius:10px; box-shadow:3px 3px 0 #1A1A2E; font-weight:700; max-width:120px;">
                </div>

                <!-- Preview -->
                <div class="mb-4 p-3 rounded" style="border:3px dashed #ccc; background:#fafafa;">
                    <label class="form-label fw-bold mb-2" style="font-size:0.85rem; text-transform:uppercase;">
                        👁️ Preview Tombol:
                    </label>
                    <div>
                        <span id="preview-btn" class="d-inline-flex align-items-center gap-2 px-4 py-2"
                              style="
                                background:{{ old('warna_bg', $link->warna_bg) }};
                                color:{{ old('warna_teks', $link->warna_teks) }};
                                border:4px solid #1A1A2E;
                                border-radius:12px;
                                box-shadow:5px 5px 0 #1A1A2E;
                                font-weight:900;
                                font-size:1.05rem;
                              ">
                            <span id="preview-ikon">{{ old('ikon', $link->ikon) }}</span>
                            <span id="preview-judul">{{ old('judul', $link->judul) }}</span>
                        </span>
                    </div>
                </div>

                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" name="aktif" id="aktif" value="1"
                        style="width:48px; height:26px;"
                        {{ old('aktif', $link->aktif) ? 'checked' : '' }}>
                    <label class="form-check-label ms-2 fw-bold" for="aktif">
                        Aktifkan link ini
                    </label>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-komik px-4 py-2"
                            style="background:#0057FF; color:#fff;">
                        💾 PERBARUI LINK
                    </button>
                    <a href="{{ route('admin.links.index') }}"
                       class="btn btn-komik px-4 py-2"
                       style="background:#fff; color:#1A1A2E;">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
const judulInput   = document.querySelector('[name=judul]');
const warnaInput   = document.querySelector('[name=warna_bg]');
const teksInput    = document.querySelector('[name=warna_teks]');
const ikonInput    = document.querySelector('[name=ikon]');
const previewBtn   = document.getElementById('preview-btn');
const previewJudul = document.getElementById('preview-judul');
const previewIkon  = document.getElementById('preview-ikon');

function updatePreview() {
    previewBtn.style.background = warnaInput.value;
    previewBtn.style.color      = teksInput.value;
    previewJudul.textContent    = judulInput.value || 'Judul Link';
    previewIkon.textContent     = ikonInput.value || '🔗';
}

[judulInput, warnaInput, teksInput, ikonInput].forEach(el => el.addEventListener('input', updatePreview));
</script>
@endpush
