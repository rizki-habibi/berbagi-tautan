<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama dulu
        Link::truncate();

        $links = [
            // ─── Sosial Media ───────────────────────────────────────
            [
                'judul'      => 'Instagram',
                'url'        => 'https://instagram.com',
                'ikon'       => '📸',
                'warna_bg'   => '#E1306C',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 1,
                'aktif'      => true,
            ],
            [
                'judul'      => 'TikTok',
                'url'        => 'https://tiktok.com',
                'ikon'       => '🎵',
                'warna_bg'   => '#010101',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 2,
                'aktif'      => true,
            ],
            [
                'judul'      => 'YouTube',
                'url'        => 'https://youtube.com',
                'ikon'       => '▶️',
                'warna_bg'   => '#FF0000',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 3,
                'aktif'      => true,
            ],
            [
                'judul'      => 'Twitter / X',
                'url'        => 'https://twitter.com',
                'ikon'       => '🐦',
                'warna_bg'   => '#1DA1F2',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 4,
                'aktif'      => true,
            ],
            [
                'judul'      => 'Facebook',
                'url'        => 'https://facebook.com',
                'ikon'       => '👍',
                'warna_bg'   => '#1877F2',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 5,
                'aktif'      => true,
            ],

            // ─── Komunitas & Chat ────────────────────────────────────
            [
                'judul'      => 'Discord Server',
                'url'        => 'https://discord.gg/contoh',
                'ikon'       => '🎮',
                'warna_bg'   => '#5865F2',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 6,
                'aktif'      => true,
            ],
            [
                'judul'      => 'WhatsApp',
                'url'        => 'https://wa.me/6281234567890',
                'ikon'       => '💬',
                'warna_bg'   => '#25D366',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 7,
                'aktif'      => true,
            ],
            [
                'judul'      => 'Telegram Channel',
                'url'        => 'https://t.me/contoh',
                'ikon'       => '✈️',
                'warna_bg'   => '#229ED9',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 8,
                'aktif'      => true,
            ],

            // ─── Marketplace / Penjualan ─────────────────────────────
            [
                'judul'      => 'Toko Shopee',
                'url'        => 'https://shopee.co.id',
                'ikon'       => '🛍️',
                'warna_bg'   => '#EE4D2D',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 9,
                'aktif'      => true,
            ],
            [
                'judul'      => 'Toko Tokopedia',
                'url'        => 'https://tokopedia.com',
                'ikon'       => '🟢',
                'warna_bg'   => '#03AC0E',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 10,
                'aktif'      => true,
            ],
            [
                'judul'      => 'Toko Lazada',
                'url'        => 'https://lazada.co.id',
                'ikon'       => '🛒',
                'warna_bg'   => '#0F146D',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 11,
                'aktif'      => true,
            ],

            // ─── Profesional ─────────────────────────────────────────
            [
                'judul'      => 'LinkedIn',
                'url'        => 'https://linkedin.com',
                'ikon'       => '💼',
                'warna_bg'   => '#0A66C2',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 12,
                'aktif'      => true,
            ],
            [
                'judul'      => 'GitHub',
                'url'        => 'https://github.com',
                'ikon'       => '💻',
                'warna_bg'   => '#24292E',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 13,
                'aktif'      => true,
            ],
            [
                'judul'      => 'Portfolio Website',
                'url'        => 'https://example.com',
                'ikon'       => '🌐',
                'warna_bg'   => '#6C3483',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 14,
                'aktif'      => true,
            ],

            // ─── Donasi & Support ─────────────────────────────────────
            [
                'judul'      => 'Saweria (Donasi)',
                'url'        => 'https://saweria.co',
                'ikon'       => '☕',
                'warna_bg'   => '#FF6B35',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 15,
                'aktif'      => true,
            ],
            [
                'judul'      => 'Trakteer',
                'url'        => 'https://trakteer.id',
                'ikon'       => '🍵',
                'warna_bg'   => '#E53935',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 16,
                'aktif'      => true,
            ],

            // ─── Konten & Blog ────────────────────────────────────────
            [
                'judul'      => 'Blog / Medium',
                'url'        => 'https://medium.com',
                'ikon'       => '✍️',
                'warna_bg'   => '#00AB6C',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 17,
                'aktif'      => true,
            ],
            [
                'judul'      => 'Spotify Playlist',
                'url'        => 'https://open.spotify.com',
                'ikon'       => '🎧',
                'warna_bg'   => '#1DB954',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 18,
                'aktif'      => true,
            ],
            [
                'judul'      => 'Email Saya',
                'url'        => 'mailto:halo@example.com',
                'ikon'       => '📧',
                'warna_bg'   => '#EA4335',
                'warna_teks' => '#FFFFFF',
                'urutan'     => 19,
                'aktif'      => true,
            ],
        ];

        foreach ($links as $link) {
            Link::create($link);
        }
    }
}
