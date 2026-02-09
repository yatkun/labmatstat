<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lab Matematika dan Statistika</title>
    <link rel="icon" href="/favicon.ico" sizes="any">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="relative min-h-screen">

    <!-- BACKGROUND GRADIENT (sesuai primary color #DAFE56) -->
    <div class="fixed inset-0 -z-10 bg-linear-to-tr from-[#DAFE56]/50 via-white to-white">
    </div>

    <!-- ORB TOP RIGHT -->
    <div class="fixed top-0 right-0 -z-0 w-[800px] h-[800px]
              translate-y-[-50%] translate-x-[33.33%]
              rounded-full blur-[80px]
              pointer-events-none"
        style="background: radial-gradient(circle, rgba(218,254,86,0.15) 0%, rgba(218,254,86,0) 70%);">
    </div>

    <!-- ORB BOTTOM LEFT -->
    <div class="fixed bottom-0 left-0 -z-0 w-[600px] h-[600px]
              translate-y-[50%] translate-x-[-33.33%]
              rounded-full blur-[80px]
              pointer-events-none"
        style="background: radial-gradient(circle, rgba(218,254,86,0.1) 0%, rgba(218,254,86,0) 70%);">
    </div>

    <!-- TRANSPARENT GRID -->
    <div class="fixed inset-0 z-20 pointer-events-none"
        style="
         background-image:
           linear-gradient(to right, rgba(0,0,0,0.03) 1px, transparent 1px),
           linear-gradient(to bottom, rgba(0,0,0,0.03) 1px, transparent 1px);
         background-size: 40px 40px;">
    </div>

    <!-- NAVBAR TRANSPARAN -->
    <nav class="fixed top-0 left-0 w-full z-40">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <!-- LOGO KIRI -->
            <div class="text-xl font-bold text-slate-800">
                {{-- logo storage/images/logoweb.png --}}
                <a href="#">
                    <img src="/storage/images/logoweb.png" alt="Logo" class="h-16 inline">

                </a>
            </div>

            <!-- MENU KANAN -->
            <ul class="flex space-x-3 text-slate-800 font-medium">
                <li><a href="#" class="transition-colors bg-[#DAFE56]/60 px-4 py-3 rounded-sm">Jadwal</a></li>
            </ul>

        </div>
    </nav>

    <!-- CONTENT -->
    <div class="relative z-60 min-h-screen flex flex-col items-center justify-center pt-24 text-center">
        <h1 class="text-4xl font-bold text-slate-800">
            Jadwal Penggunaan Lab Matematika dan Statistika
        </h1>
        <h2 class="text-4xl font-bold text-slate-800">Universitas Sulawesi Barat</h2>
        
        <div>
            <div class="flex justify-between items-center">
                <flux:tabs wire:model.live="hari" variant="segmented">
                    <flux:tab name="Senin">Senin</flux:tab>
                    <flux:tab name="Selasa">Selasa</flux:tab>
                    <flux:tab name="Rabu">Rabu</flux:tab>
                    <flux:tab name="Kamis">Kamis</flux:tab>
                    <flux:tab name="Jumat">Jumat</flux:tab>
                </flux:tabs>

            </div>
        </div>
    </div>

</body>

</html>
