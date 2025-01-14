<?php

namespace App\Http\Controllers;

use App\Models\Rapat;
use App\Models\JenisRapat;
use App\Models\Opd;
use App\Models\PesertaRapat;
use App\Models\Notulen;
use App\Models\Undangan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_rapat' => Rapat::count(),
            'rapat_hari_ini' => Rapat::whereDate('tanggal', Carbon::today())->count(),
            'total_opd' => Opd::count(),
            'total_peserta' => PesertaRapat::count(),
            'rapat_mendatang' => Rapat::with('jenisRapat')
                                    ->where('tanggal', '>=', Carbon::today())
                                    ->orderBy('tanggal')
                                    ->take(5)
                                    ->get(),
            'aktivitas_terbaru' => $this->getRecentActivities()
        ];

        return view('dashboard', $data);
    }

    private function getRecentActivities()
    {   
        Carbon::setLocale('id');

        // Ambil data terbaru dari masing-masing model
        $notulen = Notulen::select('created_at')->orderBy('created_at', 'desc')->first();
        $undangan = Undangan::select('created_at')->orderBy('created_at', 'desc')->first();
        $rapat = Rapat::select('created_at')->orderBy('created_at', 'desc')->first();

        // Pastikan objek yang diambil valid sebelum digunakan
        $activities = collect([
            [
                'time' => $notulen ? $notulen->created_at : null,
                'message' => $notulen ? 'Notulen rapat telah ditambahkan' : 'Tidak ada notulen'
            ],
            [
                'time' => $undangan ?  $undangan->created_at : null,
                'message' => $undangan ? 'Undangan rapat telah dikirim' : 'Tidak ada undangan'
            ],
            [
                'time' => $rapat ? $rapat->created_at : null,
                'message' => $rapat ? 'Rapat baru telah dibuat' : 'Tidak ada rapat'
            ]
        ]);

        // Urutkan berdasarkan waktu asli
        return $activities->sortByDesc('time')->map(function ($activity) {
            $activity['time'] = $activity['time'] ? Carbon::parse($activity['time'])->diffForHumans() : '';
            return $activity;
        })->values();
    }
} 