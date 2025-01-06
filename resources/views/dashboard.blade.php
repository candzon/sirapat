@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-4 gap-4 mb-8">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-gray-500 text-sm">Total Rapat</h3>
            <p class="text-4xl font-bold">{{ $total_rapat }}</p>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-gray-500 text-sm">Rapat Hari Ini</h3>
            <p class="text-4xl font-bold">{{ $rapat_hari_ini }}</p>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-gray-500 text-sm">Total OPD</h3>
            <p class="text-4xl font-bold">{{ $total_opd }}</p>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-gray-500 text-sm">Total Peserta</h3>
            <p class="text-4xl font-bold">{{ $total_peserta }}</p>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-2 bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-4">Rapat Mendatang</h2>
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-left">Tanggal</th>
                        <th class="text-left">Judul</th>
                        <th class="text-left">Jenis</th>
                        <th class="text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rapat_mendatang as $rapat)
                    <tr>
                        <td>{{ $rapat->tanggal }}</td>
                        <td>{{ $rapat->judul }}</td>
                        <td>{{ $rapat->jenis }}</td>
                        <td>
                            <span class="px-2 py-1 rounded text-sm 
                                {{ $rapat->status === 'Pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                {{ $rapat->status }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-4">Aktivitas Terbaru</h2>
            <div class="space-y-4">
                @foreach($aktivitas_terbaru as $aktivitas)
                <div class="border-b pb-2">
                    <p class="text-sm text-gray-600">{{ $aktivitas['time'] }}</p>
                    <p>{{ $aktivitas['message'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection 