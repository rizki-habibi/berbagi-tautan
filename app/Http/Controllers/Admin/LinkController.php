<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\LinkClick;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function index()
    {
        $links = Link::withCount('klik')->orderBy('urutan')->get();
        return view('admin.links.index', compact('links'));
    }

    public function create()
    {
        return view('admin.links.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'      => 'required|string|max:255',
            'slug'       => 'nullable|string|max:255|unique:links,slug',
            'url'        => 'required|url|max:500',
            'deskripsi'  => 'nullable|string|max:500',
            'ikon'       => 'nullable|string|max:10',
            'warna_bg'   => 'required|string|max:7',
            'warna_teks' => 'required|string|max:7',
            'urutan'     => 'required|integer|min:0',
            'aktif'      => 'boolean',
        ], [
            'judul.required'  => 'Judul link wajib diisi.',
            'url.required'    => 'URL wajib diisi.',
            'url.url'         => 'Format URL tidak valid.',
            'slug.unique'     => 'Slug sudah digunakan, coba yang lain.',
        ]);

        $data['aktif'] = $request->boolean('aktif');

        // Jika slug dikosongkan, biarkan model yang auto-generate dari judul
        if (empty($data['slug'])) {
            unset($data['slug']);
        } else {
            $data['slug'] = Str::slug($data['slug'], '-');
        }

        Link::create($data);

        return redirect()->route('admin.links.index')
            ->with('sukses', 'Link berhasil ditambahkan!');
    }

    public function show(Link $link)
    {
        $klik = $link->klik()->latest()->paginate(20);
        $totalKlik = $link->klik()->count();

        $distribusiPerangkat = $link->klik()
            ->selectRaw('perangkat, COUNT(*) as jumlah')
            ->groupBy('perangkat')
            ->get();

        return view('admin.links.show', compact('link', 'klik', 'totalKlik', 'distribusiPerangkat'));
    }

    public function edit(Link $link)
    {
        return view('admin.links.edit', compact('link'));
    }

    public function update(Request $request, Link $link)
    {
        $data = $request->validate([
            'judul'      => 'required|string|max:255',
            'slug'       => 'nullable|string|max:255|unique:links,slug,' . $link->id,
            'url'        => 'required|url|max:500',
            'deskripsi'  => 'nullable|string|max:500',
            'ikon'       => 'nullable|string|max:10',
            'warna_bg'   => 'required|string|max:7',
            'warna_teks' => 'required|string|max:7',
            'urutan'     => 'required|integer|min:0',
            'aktif'      => 'boolean',
        ], [
            'judul.required' => 'Judul link wajib diisi.',
            'url.required'   => 'URL wajib diisi.',
            'url.url'        => 'Format URL tidak valid.',
            'slug.unique'    => 'Slug sudah digunakan, coba yang lain.',
        ]);

        $data['aktif'] = $request->boolean('aktif');

        // Jika slug dikosongkan, regenerate dari judul baru
        if (empty($data['slug'])) {
            $data['slug'] = Link::buatSlugUnik(
                Str::slug($data['judul'], '-'),
                $link->id
            );
        } else {
            $data['slug'] = Str::slug($data['slug'], '-');
        }

        $link->update($data);

        return redirect()->route('admin.links.index')
            ->with('sukses', 'Link berhasil diperbarui!');
    }

    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->route('admin.links.index')
            ->with('sukses', 'Link berhasil dihapus!');
    }

    // Toggle aktif/nonaktif via AJAX
    public function toggleAktif(Link $link)
    {
        $link->update(['aktif' => !$link->aktif]);
        return response()->json([
            'sukses' => true,
            'aktif'  => $link->aktif,
        ]);
    }
}
