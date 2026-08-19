@extends('layouts.admin')
@section('judul', 'Tambah Link Baru')

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

            <form action="{{ route('admin.links.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold" style="text-transform:uppercase; letter-spacing:0.5px; font-size:0.85rem;">
                        📝 Judul Link <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul') }}"
                        placeholder="cth: Instagram Saya"
                        style="border:3px solid #1A1A2E; border-radius:10px; box-shadow:3px 3px 0 #1A1A2E; font-weight:700;">
                    @error('judul') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold" style="text-transform:uppercase; letter-spacing:0.5px; font-size:0.85rem;">
                        🔗 URL <span class="text-danger">*</span>
                    </label>
                    <input type="url" name="url"
                        class="form-control @error('url') is-invalid @enderror"
                        value="{{ old('url') }}"
                        placeholder="https://instagram.com/username"
                        style="border:3px solid #1A1A2E; border-radius:10px; box-shadow:3px 3px 0 #1A1A2E; font-weight:700;">
                    @error('url') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                </div>

                {{-- Slug --}}
                <div class="mb-3">
                    <label class="form-label fw-bold" style="text-transform:uppercase; letter-spacing:0.5px; font-size:0.85rem;">
                        🏷️ Slug Halaman Berbagi
                        <span class="text-muted fw-normal" style="font-size:0.78rem;">(kosongkan = otomatis dari judul)</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text fw-bold"
                              style="border:3px solid #1A1A2E; border-right:none; border-radius:10px 0 0 10px; background:#f8f9fa; font-size:0.8rem;">
                            /berbagi/
                        </span>
                        <input type="text" name="slug" id="slugInput"
                            class="form-control @error('slug') is-invalid @enderror"
                            value="{{ old('slug') }}"
                            placeholder="lazada-murah"
                            style="border:3px solid #1A1A2E; border-radius:0 10px 10px 0; font-weight:700;">
                        @error('slug') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                    </div>
                    <div class="mt-1" id="slugPreviewWrap" style="display:none;">
                        <small class="text-muted fw-bold">
                            🔗 URL berbagi: <span id="slugPreviewTeks" class="text-primary"></span>
                        </small>
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label class="form-label fw-bold" style="text-transform:uppercase; letter-spacing:0.5px; font-size:0.85rem;">
                        📄 Deskripsi
                        <span class="text-muted fw-normal" style="font-size:0.78rem;">(opsional, muncul di halaman berbagi & WhatsApp preview)</span>
                    </label>
                    <textarea name="deskripsi" rows="2"
                        class="form-control @error('deskripsi') is-invalid @enderror"
                        placeholder="cth: Temukan produk murah dan promo terbaru di Lazada!"
                        maxlength="500"
                        style="border:3px solid #1A1A2E; border-radius:10px; box-shadow:3px 3px 0 #1A1A2E; font-weight:700; resize:vertical;">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <div class="invalid-feedback fw-bold">{{ $message }}</div> @enderror
                    <small class="text-muted fw-bold">Maks 500 karakter</small>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-4">
                        <label class="form-label fw-bold" style="text-transform:uppercase; letter-spacing:0.5px; font-size:0.85rem;">
                            😀 Ikon (Emoji)
                        </label>
                        <input type="text" name="ikon"
                            class="form-control text-center"
                            value="{{ old('ikon', '🔗') }}"
                            maxlength="5"
                            style="border:3px solid #1A1A2E; border-radius:10px; box-shadow:3px 3px 0 #1A1A2E; font-size:1.5rem; font-weight:700;">
                    </div>
                    <div class="col-4">
                        <label class="form-label fw-bold" style="text-transform:uppercase; letter-spacing:0.5px; font-size:0.85rem;">
                            🎨 Warna Tombol
                        </label>
                        <input type="color" name="warna_bg"
                            class="form-control form-control-color w-100"
                            value="{{ old('warna_bg', '#FF6B6B') }}"
                            style="border:3px solid #1A1A2E; border-radius:10px; height:50px; box-shadow:3px 3px 0 #1A1A2E;">
                    </div>
                    <div class="col-4">
                        <label class="form-label fw-bold" style="text-transform:uppercase; letter-spacing:0.5px; font-size:0.85rem;">
                            🖊️ Warna Teks
                        </label>
                        <input type="color" name="warna_teks"
                            class="form-control form-control-color w-100"
                            value="{{ old('warna_teks', '#FFFFFF') }}"
                            style="border:3px solid #1A1A2E; border-radius:10px; height:50px; box-shadow:3px 3px 0 #1A1A2E;">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold" style="text-transform:uppercase; letter-spacing:0.5px; font-size:0.85rem;">
                        🔢 Urutan
                    </label>
                    <input type="number" name="urutan"
                        class="form-control"
                        value="{{ old('urutan', 1) }}"
                        min="0"
                        style="border:3px solid #1A1A2E; border-radius:10px; box-shadow:3px 3px 0 #1A1A2E; font-weight:700; max-width:120px;">
                </div>

                <!-- Preview Tombol -->
                <div class="mb-4 p-3 rounded" style="border:3px dashed #ccc; background:#fafafa;">
                    <label class="form-label fw-bold mb-2" style="font-size:0.85rem; text-transform:uppercase;">
                        👁️ Preview Tombol:
                    </label>
                    <div>
                        <span id="preview-btn" class="d-inline-flex align-items-center gap-2 px-4 py-2"
                              style="
                                background:{{ old('warna_bg','#FF6B6B') }};
                                color:{{ old('warna_teks','#FFFFFF') }};
                                border:4px solid #1A1A2E;
                                border-radius:12px;
                                box-shadow:5px 5px 0 #1A1A2E;
                                font-weight:900;
                                font-size:1.05rem;
                              ">
                            <span id="preview-ikon">{{ old('ikon','🔗') }}</span>
                            <span id="preview-judul">{{ old('judul','Judul Link') }}</span>
                        </span>
                    </div>
                </div>

                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" name="aktif" id="aktif" value="1"
                        style="width:48px; height:26px;"
                        {{ old('aktif', true) ? 'checked' : '' }}>
                    <label class="form-check-label ms-2 fw-bold" for="aktif">
                        Aktifkan link ini
                    </label>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-komik px-4 py-2"
                            style="background:#2ECC40; color:#fff;">
                        💾 SIMPAN LINK
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
const slugInput    = document.getElementById('slugInput');
const warnaInput   = document.querySelector('[name=warna_bg]');
const teksInput    = document.querySelector('[name=warna_teks]');
const ikonInput    = document.querySelector('[name=ikon]');
const previewBtn   = document.getElementById('preview-btn');
const previewJudul = document.getElementById('preview-judul');
const previewIkon  = document.getElementById('preview-ikon');
const slugPreviewWrap = document.getElementById('slugPreviewWrap');
const slugPreviewTeks = document.getElementById('slugPreviewTeks');
const baseUrl = '{{ url('/berbagi') }}/';

function buatSlug(str) {
    return str.toLowerCase()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_]+/g, '-')
        .replace(/^-+|-+$/g, '');
}

function updatePreview() {
    previewBtn.style.background = warnaInput.value;
    previewBtn.style.color      = teksInput.value;
    previewJudul.textContent    = judulInput.value || 'Judul Link';
    previewIkon.textContent     = ikonInput.value || '🔗';
}

// Auto-isi slug dari judul jika slug masih kosong
judulInput.addEventListener('input', function() {
    updatePreview();
    if (!slugInput.value.trim()) {
        const otomatis = buatSlug(judulInput.value);
        slugPreviewTeks.textContent = baseUrl + (otomatis || '...');
        slugPreviewWrap.style.display = otomatis ? 'block' : 'none';
    }
});

// Update preview URL saat slug diketik manual
slugInput.addEventListener('input', function() {
    const val = slugInput.value.trim();
    if (val) {
        slugPreviewTeks.textContent = baseUrl + val;
        slugPreviewWrap.style.display = 'block';
    } else {
        // fallback ke slug dari judul
        const otomatis = buatSlug(judulInput.value);
        slugPreviewTeks.textContent = baseUrl + (otomatis || '...');
        slugPreviewWrap.style.display = otomatis ? 'block' : 'none';
    }
});

[warnaInput, teksInput, ikonInput].forEach(el => el.addEventListener('input', updatePreview));
</script>
@endpush
