<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Lengkap</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #fff;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #333;
            padding-bottom: 15px;
        }
        .header h1 {
            font-size: 24px;
            margin-bottom: 5px;
            color: #333;
        }
        .header p {
            font-size: 14px;
            color: #666;
            margin: 5px 0;
        }
        .day-section {
            margin-bottom: 40px;
            page-break-inside: avoid;
        }
        .day-section h2 {
            font-size: 16px;
            color: white;
            background-color: #007bff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #e9ecef;
            color: #333;
            padding: 10px;
            text-align: left;
            font-weight: bold;
            font-size: 13px;
            border: 1px solid #ddd;
        }
        td {
            padding: 10px;
            border: 1px solid #ddd;
            font-size: 12px;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .dosen {
            font-size: 11px;
            line-height: 1.6;
        }
        .badge {
            display: inline-block;
            padding: 4px 8px;
            background-color: #28a745;
            color: white;
            border-radius: 4px;
            font-size: 11px;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 11px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }
        .no-data {
            text-align: center;
            padding: 15px;
            color: #666;
            font-style: italic;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Jadwal Kuliah Lengkap</h1>
    </div>

    @forelse($jadwals as $hari => $hari_jadwals)
        <div class="day-section">
            <h2>{{ $hari }}</h2>
            @if($hari_jadwals->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th style="width: 10%;">Jam</th>
                            <th style="width: 20%;">Mata Kuliah</th>
                            <th style="width: 15%;">Program Studi</th>
                            <th style="width: 10%;">Kelas</th>
                            <th style="width: 25%;">Dosen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hari_jadwals as $item)
                            <tr>
                                <td><strong>{{ $item->waktu_mulai }} - {{ $item->waktu_selesai }}</strong></td>
                                <td>{{ $item->mata_kuliah }}</td>
                                <td>
                                    <span class="badge">{{ $item->program_studi }}</span>
                                </td>
                                <td><strong>{{ $item->kelas }}</strong></td>
                                <td class="dosen">
                                    <div>{{ $item->dosen1 }}</div>
                                    @if ($item->dosen2)
                                        <div>{{ $item->dosen2 }}</div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="no-data">
                    <p>Tidak ada jadwal untuk hari {{ $hari }}</p>
                </div>
            @endif
        </div>
    @empty
        <div class="no-data" style="padding: 40px;">
            <p>Belum ada jadwal yang tersimpan</p>
        </div>
    @endforelse

    <div class="footer">
        <p>© {{ date('Y') }} - Sistem Jadwal Kuliah</p>
    </div>
</body>
</html>
