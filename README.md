# 💥 BerbagiTautan

> Aplikasi **Link-in-Bio** bergaya komik, dibangun dengan Laravel 13. Mirip [Linktr.ee](https://linktr.ee) tapi lebih keren, lebih berwarna, dan penuh animasi!

---

## ✨ Fitur Utama

### 👤 Halaman Publik
| Fitur | Keterangan |
|---|---|
| 🎨 Desain Komik | Halftone dots, border tebal, shadow block, font Bangers |
| 💥 Animasi Loading | Loading screen + progress bar saat buka halaman |
| 🚀 Animasi Masuk | Slide-up, bounce avatar, stagger tiap tombol link |
| ✨ Efek Hover | Shimmer, ikon membesar & rotate, shadow naik |
| 💥 Partikel Klik | POW! ZAP! BAM! meledak setiap tombol diklik |
| 📂 Kategori Link | Link dikelompokkan: Sosmed, Chat, Marketplace, dll |
| 🔄 Scroll Reveal | Tiap grup link muncul saat di-scroll |

### ⚙️ Panel Admin
| Fitur | Keterangan |
|---|---|
| 🔐 Login Aman | Auth Laravel bawaan |
| 📊 Dashboard | Statistik total link, klik, klik hari ini + grafik 7 hari |
| 📈 Chart | Bar chart klik harian + Doughnut chart perangkat |
| ➕ Tambah Link | Form dengan preview tombol real-time |
| ✏️ Edit Link | Ubah judul, URL, emoji, warna bg, warna teks, urutan |
| 🗑️ Hapus Link | Dengan konfirmasi |
| 🔛 Toggle Aktif | Aktif/nonaktif via switch tanpa reload (AJAX) |
| 👁️ Detail Klik | Lihat siapa yang klik: IP, perangkat, browser, OS, waktu |
| 🎬 Animasi Admin | Sidebar slide-in, counter naik, ripple button, row stagger |

### 📡 Tracking Klik
Setiap klik dicatat otomatis:
- 🌐 IP Address pengunjung
- 📱 Jenis perangkat (Mobile / Desktop / Tablet)
- 🌍 Browser (Chrome, Firefox, Edge, Safari)
- 💻 Sistem Operasi (Windows, Android, iOS, macOS)
- ⏰ Waktu klik
- 🔗 Referer (dari mana datangnya)

---

## 🔗 19 Link Bawaan

| Kategori | Link |
|---|---|
| Sosial Media | Instagram, TikTok, YouTube, Twitter/X, Facebook |
| Komunitas & Chat | Discord, WhatsApp, Telegram |
| Marketplace | Shopee, Tokopedia, Lazada |
| Profesional | LinkedIn, GitHub, Portfolio |
| Donasi | Saweria, Trakteer |
| Konten | Blog/Medium, Spotify, Email |

---

## 🚀 Instalasi

### Persyaratan
- PHP >= 8.2
- Composer
- MySQL / SQLite

### Langkah Install

```bash
# 1. Clone repo
git clone https://github.com/rizki-habibi/berbagi-tautan.git
cd berbagi-tautan

# 2. Install dependensi
composer install

# 3. Salin file environment
cp .env.example .env

# 4. Generate app key
php artisan key:generate

# 5. Atur database di .env
# DB_CONNECTION=sqlite   (atau mysql)

# 6. Jalankan migrasi + seeder
php artisan migrate --seed

# 7. Jalankan server
php artisan serve
```

Buka browser: **http://127.0.0.1:8000**

---

## 🔑 Akun Demo

| Role | Email | Password |
|---|---|---|
| Admin | admin@berbagi.com | password123 |

---

## 📁 Struktur Proyek

```
berbagi-tautan/
├── app/
│   ├── Http/Controllers/
│   │   ├── ProfilController.php        # Halaman publik + tracking klik
│   │   └── Admin/
│   │       ├── AuthController.php      # Login / logout
│   │       ├── DashboardController.php # Statistik & chart
│   │       └── LinkController.php      # CRUD link + toggle
│   └── Models/
│       ├── Link.php                    # Model link
│       └── LinkClick.php               # Model tracking klik
├── database/
│   ├── migrations/                     # Tabel links & link_clicks
│   └── seeders/
│       ├── AdminSeeder.php             # User admin demo
│       └── LinkSeeder.php              # 19 link bawaan
├── resources/views/
│   ├── profil/tampilkan.blade.php      # Halaman publik (komik)
│   ├── admin/
│   │   ├── login.blade.php             # Halaman login
│   │   ├── dashboard.blade.php         # Dashboard statistik
│   │   └── links/
│   │       ├── index.blade.php         # Daftar link + toggle
│   │       ├── create.blade.php        # Form tambah + preview
│   │       ├── edit.blade.php          # Form edit + preview
│   │       └── show.blade.php          # Detail klik per link
│   └── layouts/admin.blade.php         # Layout admin animasi
└── routes/web.php                      # Semua route
```

---

## 🛠️ Teknologi

| Teknologi | Versi | Kegunaan |
|---|---|---|
| Laravel | 13.x | Backend framework |
| PHP | 8.5 | Bahasa pemrograman |
| SQLite / MySQL | - | Database |
| Bootstrap | 5.3 | UI komponen |
| Chart.js | 4.4 | Grafik statistik |
| Google Fonts | - | Bangers (komik) + Nunito |
| Bootstrap Icons | 1.11 | Ikon sidebar & tombol |

---

## 💡 Kelebihan & Inovasi

- ✅ **Zero konfigurasi tambahan** — langsung jalan dengan SQLite
- ✅ **Desain komik unik** — halftone, shadow block, Bangers font
- ✅ **Animasi menyeluruh** — loading, masuk, hover, klik, partikel
- ✅ **Tracking detail** — IP, browser, OS, perangkat per klik
- ✅ **Preview real-time** — lihat tampilan tombol sebelum disimpan
- ✅ **Toggle AJAX** — aktif/nonaktif link tanpa reload halaman
- ✅ **Kategori otomatis** — link dikelompokkan berdasarkan urutan
- ✅ **Counter animasi** — angka statistik hitung naik saat halaman dibuka

## ⚠️ Keterbatasan

- ❌ Belum ada fitur multi-user / multi-profil
- ❌ Belum ada upload foto profil sendiri
- ❌ Belum ada deteksi negara pengunjung (butuh GeoIP)
- ❌ Belum ada fitur custom domain
- ❌ Belum ada analitik per hari yang bisa difilter range tanggal

---

## 📄 Lisensi

MIT License — bebas digunakan dan dimodifikasi.

---

<p align="center">Dibuat dengan 💥 oleh <strong>rizki-habibi</strong></p>
