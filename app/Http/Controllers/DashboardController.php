<?php

namespace App\Http\Controllers;

use App\Models\Rapat;
use App\Models\Opd;
use App\Models\PesertaRapat;
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
            'rapat_mendatang' => Rapat::where('tanggal', '>=', Carbon::today())
                                    ->orderBy('tanggal')
                                    ->take(5)
                                    ->get(),
            'aktivitas_terbaru' => $this->getRecentActivities()
        ];

        return view('dashboard', $data);
    }

    private function getRecentActivities()
    {
        // This is a placeholder - implement actual activity logging
        return collect([
            ['time' => '20 menit yang lalu', 'message' => 'Notulen rapat telah ditambahkan'],
            ['time' => '1 jam yang lalu', 'message' => 'Undangan rapat telah dikirim'],
            ['time' => '2 jam yang lalu', 'message' => 'Rapat baru telah dibuat'],
        ]);
    }
} 