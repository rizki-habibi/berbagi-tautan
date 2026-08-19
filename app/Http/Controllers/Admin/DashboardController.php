<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\LinkClick;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLink      = Link::count();
        $linkAktif      = Link::where('aktif', true)->count();
        $totalKlik      = LinkClick::count();
        $klikHariIni    = LinkClick::whereDate('created_at', today())->count();

        // Klik per link (top 5)
        $topLinks = Link::withCount('klik')
            ->orderByDesc('klik_count')
            ->limit(5)
            ->get();

        // Klik 7 hari terakhir
        $klikPerHari = LinkClick::select(
                DB::raw('DATE(created_at) as tanggal'),
                DB::raw('COUNT(*) as jumlah')
            )
            ->where('created_at', '>=', now()->subDays(6))
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        // Distribusi perangkat
        $distribusiPerangkat = LinkClick::select('perangkat', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('perangkat')
            ->get();

        // Distribusi browser
        $distributBrowser = LinkClick::select('browser', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('browser')
            ->get();

        // Klik terbaru
        $klikTerbaru = LinkClick::with('link')
            ->latest()
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalLink',
            'linkAktif',
            'totalKlik',
            'klikHariIni',
            'topLinks',
            'klikPerHari',
            'distribusiPerangkat',
            'distributBrowser',
            'klikTerbaru'
        ));
    }
}
