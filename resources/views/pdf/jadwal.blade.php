<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal - {{ $hari }}</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #007bff;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: bold;
            font-size: 13px;
            border: 1px solid #ddd;
        }
        td {
            padding: 10px 12px;
            border: 1px solid #ddd;
            font-size: 12px;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tbody tr:hover {
            background-color: #f0f0f0;
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
            padding: 20px;
            color: #666;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Jadwal Kuliah</h1>
        <p><strong>Hari: {{ $hari }}</strong></p>
    </div>

    @if($jadwals->count() > 0)
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
                @foreach ($jadwals as $item)
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

    <div class="footer">
        <p>© {{ date('Y') }} - Sistem Jadwal Kuliah</p>
    </div>
</body>
</html>
