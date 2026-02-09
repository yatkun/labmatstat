<!DOCTYPE html>
<html lang="id" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Jadwal Lab Matematika & Statistika' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
   
</head>

<body class="antialiased bg-white">
    <div class="relative min-h-screen">

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
        <div class="fixed inset-0 z-20 pointer-events-none overflow-hidden"
            style="
             background-image:
               linear-gradient(to right, rgba(0,0,0,0.03) 1px, transparent 1px),
               linear-gradient(to bottom, rgba(0,0,0,0.03) 1px, transparent 1px);
             background-size: 40px 40px;
             ">
        </div>

        <!-- NAVBAR TRANSPARAN -->
        <nav class="fixed top-0 left-0 w-full z-40 bg-white/70 backdrop-blur-sm ">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <!-- LOGO KIRI -->
                <div class="text-xl font-bold text-slate-800">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <img src="/storage/images/logoweb.png" alt="Logo" class="h-16">
                    </a>
                </div>

                <!-- MENU KANAN -->
                <ul class="flex space-x-3 text-slate-800 font-medium items-center">
                    <li><a href="#" class="transition-colors hover:text-[#DAFE56] px-4 py-2 rounded-sm">Jadwal</a>
                    </li>
                    @auth
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit"
                                    class="transition-colors bg-[#DAFE56]/60 hover:bg-[#DAFE56] px-4 py-2 rounded-sm font-medium">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}"
                                class="transition-colors bg-[#DAFE56]/60 hover:bg-[#DAFE56] px-4 py-2 rounded-sm">Login</a>
                        </li>
                    @endauth
                </ul>

            </div>
        </nav>

        <!-- CONTENT -->
        <flux:main>
            <div class="relative z-30 min-h-screen flex flex-col items-center justify-center pt-16 px-4">
                {{ $slot }}
            </div>
        </flux:main>

    </div>
    @fluxScripts
    @livewireScripts
</body>

</html>
