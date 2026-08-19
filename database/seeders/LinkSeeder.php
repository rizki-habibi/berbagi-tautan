<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    public function run(): void
    {
        Link::truncate();

        $links = [
            // ─── Sosial Media ────────────────────────────────────────
            [
                'judul'      => 'Instagram',
                'slug'       => 'instagram',
                'url'        => 'https://instagram.com',
                'deskripsi'  => 'Ikuti Instagram Rizki Habibi untuk konten sehari-hari, behind the scene, dan update terbaru.',
                'ikon'       => '📸',
                'warna_bg'   => '#E1306C',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 1,
                'aktif'      => true,
            ],
            [
                'judul'      => 'TikTok',
                'slug'       => 'tiktok',
                'url'        => 'https://tiktok.com',
                'deskripsi'  => 'Tonton video pendek, tutorial coding, dan konten kreatif di TikTok Rizki Habibi.',
                'ikon'       => '🎵',
                'warna_bg'   => '#010101',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 2,
                'aktif'      => true,
            ],
            [
                'judul'      => 'YouTube — 26 Rizki Habibi',
                'slug'       => 'youtube',
                'url'        => 'https://www.youtube.com/@26_rizkihabibi73',
                'deskripsi'  => 'Subscribe channel YouTube @26_rizkihabibi73 — video tutorial, project coding, dan konten teknologi.',
                'ikon'       => '▶️',
                'warna_bg'   => '#FF0000',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 3,
                'aktif'      => true,
            ],
            [
                'judul'      => 'Twitter / X',
                'slug'       => 'twitter-x',
                'url'        => 'https://twitter.com',
                'deskripsi'  => 'Ikuti Twitter/X Rizki Habibi untuk update singkat, opini, dan diskusi teknologi.',
                'ikon'       => '🐦',
                'warna_bg'   => '#1DA1F2',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 4,
                'aktif'      => true,
            ],

            // ─── Komunitas & Chat ─────────────────────────────────────
            [
                'judul'      => 'WhatsApp',
                'slug'       => 'whatsapp',
                'url'        => 'https://wa.me/6281234567890',
                'deskripsi'  => 'Hubungi Rizki Habibi langsung via WhatsApp untuk kolaborasi, pertanyaan, atau ngobrol santai.',
                'ikon'       => '💬',
                'warna_bg'   => '#25D366',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 5,
                'aktif'      => true,
            ],
            [
                'judul'      => 'Telegram',
                'slug'       => 'telegram',
                'url'        => 'https://t.me/contoh',
                'deskripsi'  => 'Gabung channel Telegram Rizki Habibi untuk info, update, dan diskusi komunitas.',
                'ikon'       => '✈️',
                'warna_bg'   => '#229ED9',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 6,
                'aktif'      => true,
            ],

            // ─── Marketplace ──────────────────────────────────────────
            [
                'judul'      => 'Toko Shopee — Promo Terbaru',
                'slug'       => 'shopee',
                'url'        => 'https://shopee.co.id',
                'deskripsi'  => 'Temukan produk pilihan, promo flash sale, dan diskon terbaik di toko Shopee Rizki Habibi.',
                'ikon'       => '🛍️',
                'warna_bg'   => '#EE4D2D',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 7,
                'aktif'      => true,
            ],
            [
                'judul'      => 'Toko Tokopedia',
                'slug'       => 'tokopedia',
                'url'        => 'https://tokopedia.com',
                'deskripsi'  => 'Cek toko Tokopedia Rizki Habibi — belanja aman, pengiriman cepat, dan harga terjangkau.',
                'ikon'       => '🟢',
                'warna_bg'   => '#03AC0E',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 8,
                'aktif'      => true,
            ],
            [
                'judul'      => 'Toko Lazada — Harga Murah',
                'slug'       => 'lazada',
                'url'        => 'https://lazada.co.id',
                'deskripsi'  => 'Belanja produk murah berkualitas di Lazada — temukan penawaran terbaik dan gratis ongkir!',
                'ikon'       => '🛒',
                'warna_bg'   => '#0F146D',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 9,
                'aktif'      => true,
            ],

            // ─── Profesional ──────────────────────────────────────────
            [
                'judul'      => 'GitHub — Rizki Habibi',
                'slug'       => 'github',
                'url'        => 'https://github.com/rizki-habibi',
                'deskripsi'  => 'Lihat semua project open-source, repositori, dan kontribusi Rizki Habibi di GitHub.',
                'ikon'       => '💻',
                'warna_bg'   => '#24292E',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 10,
                'aktif'      => true,
            ],
            [
                'judul'      => 'Portofolio Website',
                'slug'       => 'portofolio',
                'url'        => 'https://rizki-habibi-portofolio.vercel.app',
                'deskripsi'  => 'Kunjungi website portofolio Rizki Habibi — project, skill, pengalaman, dan kontak lengkap.',
                'ikon'       => '🚀',
                'warna_bg'   => '#FFE600',
                'warna_teks' => '#1A1A2E',
                'urutan'     => 11,
                'aktif'      => true,
            ],
            [
                'judul'      => 'LinkedIn',
                'slug'       => 'linkedin',
                'url'        => 'https://linkedin.com',
                'deskripsi'  => 'Connect di LinkedIn Rizki Habibi — networking profesional, karir, dan peluang kolaborasi.',
                'ikon'       => '💼',
                'warna_bg'   => '#0A66C2',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 12,
                'aktif'      => true,
            ],

            // ─── Donasi & Support ─────────────────────────────────────
            [
                'judul'      => 'Trakteer — Support Rizki',
                'slug'       => 'trakteer',
                'url'        => 'https://trakteer.id',
                'deskripsi'  => 'Dukung konten dan project Rizki Habibi dengan traktir kopi — setiap dukungan sangat berarti!',
                'ikon'       => '☕',
                'warna_bg'   => '#E53935',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 13,
                'aktif'      => true,
            ],
            [
                'judul'      => 'Saweria — Donasi',
                'slug'       => 'saweria',
                'url'        => 'https://saweria.co',
                'deskripsi'  => 'Bantu Rizki Habibi terus berkarya dengan donasi di Saweria — berapapun sangat membantu!',
                'ikon'       => '🍵',
                'warna_bg'   => '#FF6B35',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 14,
                'aktif'      => true,
            ],

            // ─── Konten & Lainnya ─────────────────────────────────────
            [
                'judul'      => 'Blog / Medium',
                'slug'       => 'blog',
                'url'        => 'https://medium.com',
                'deskripsi'  => 'Baca artikel, tutorial, dan tulisan Rizki Habibi seputar teknologi dan pengembangan diri.',
                'ikon'       => '✍️',
                'warna_bg'   => '#00AB6C',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 15,
                'aktif'      => true,
            ],
            [
                'judul'      => 'Spotify Playlist',
                'slug'       => 'spotify',
                'url'        => 'https://open.spotify.com',
                'deskripsi'  => 'Dengerin playlist favorit Rizki Habibi di Spotify — musik tempur sambil coding!',
                'ikon'       => '🎧',
                'warna_bg'   => '#1DB954',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 16,
                'aktif'      => true,
            ],
            [
                'judul'      => 'Email Saya',
                'slug'       => 'email',
                'url'        => 'mailto:rizkihabibi@example.com',
                'deskripsi'  => 'Kirim email ke Rizki Habibi untuk kolaborasi project, pertanyaan, atau kerja sama bisnis.',
                'ikon'       => '📧',
                'warna_bg'   => '#EA4335',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 17,
                'aktif'      => true,
            ],
        ];

        foreach ($links as $link) {
            Link::create($link);
        }
    }
}
