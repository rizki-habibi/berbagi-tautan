<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\LinkClick;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    // Halaman utama publik (mirip linktr.ee)
    public function tampilkan()
    {
        $links     = Link::aktif()->get();
        $unggulan  = Link::aktif()->where('unggulan', true)->orderBy('urutan')->get();
        return view('profil.tampilkan', compact('links', 'unggulan'));
    }

    // Halaman berbagi per link berdasarkan slug
    public function halamanBerbagi(string $slug)
    {
        $link = Link::where('slug', $slug)
            ->where('aktif', true)
            ->firstOrFail();

        // Ambil beberapa link lain yang aktif sebagai saran (maks 4, kecuali link ini)
        $linkLain = Link::aktif()
            ->where('id', '!=', $link->id)
            ->limit(4)
            ->get();

        return view('profil.berbagi', compact('link', 'linkLain'));
    }

    // Redirect + catat klik
    public function klik(Request $request, Link $link)
    {
        if (!$link->aktif) {
            abort(404);
        }

        // Deteksi perangkat dari user agent
        $userAgent = $request->userAgent() ?? '';
        $perangkat = $this->deteksiPerangkat($userAgent);
        $browser   = $this->deteksiBrowser($userAgent);
        $os        = $this->deteksiOS($userAgent);

        LinkClick::create([
            'link_id'        => $link->id,
            'ip_address'     => $request->ip(),
            'user_agent'     => $userAgent,
            'perangkat'      => $perangkat,
            'browser'        => $browser,
            'sistem_operasi' => $os,
            'referer'        => $request->header('referer'),
        ]);

        return redirect()->away($link->url);
    }

    private function deteksiPerangkat(string $ua): string
    {
        if (preg_match('/tablet|ipad/i', $ua)) return 'Tablet';
        if (preg_match('/mobile|android|iphone|ipod|windows phone/i', $ua)) return 'Mobile';
        return 'Desktop';
    }

    private function deteksiBrowser(string $ua): string
    {
        if (str_contains($ua, 'Edg'))     return 'Edge';
        if (str_contains($ua, 'Chrome'))  return 'Chrome';
        if (str_contains($ua, 'Firefox')) return 'Firefox';
        if (str_contains($ua, 'Safari'))  return 'Safari';
        if (str_contains($ua, 'Opera'))   return 'Opera';
        return 'Lainnya';
    }

    private function deteksiOS(string $ua): string
    {
        if (str_contains($ua, 'Windows')) return 'Windows';
        if (str_contains($ua, 'Mac'))     return 'macOS';
        if (str_contains($ua, 'Android')) return 'Android';
        if (str_contains($ua, 'iPhone') || str_contains($ua, 'iPad')) return 'iOS';
        if (str_contains($ua, 'Linux'))   return 'Linux';
        return 'Lainnya';
    }
}
