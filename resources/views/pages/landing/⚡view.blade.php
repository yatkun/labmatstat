<?php

use Livewire\Component;

new class extends Component {
    public $hari = 'Senin';

    public function render()
    {
        return view('pages.landing.⚡view', [
            'hari' => $this->hari,
            'jadwals' => \App\Models\Jadwal::where('hari', $this->hari)->get(),
            'allJadwals' => \App\Models\Jadwal::all(),
        ])->layout('layouts.landing');
    }
};

?>

<div class="w-full max-w-4xl ">
    <h1 class="text-xl md:text-3xl font-bold text-slate-800 text-center">
        Jadwal Penggunaan Lab Matematika dan Statistika
    </h1>
    <h2 class="text-xl md:text-3xl font-bold text-slate-800 mb-12 text-center">Universitas Sulawesi Barat</h2>

    <div class="bg-white p-6 rounded-xl shadow-xl">
        <div class="flex justify-center">
            <flux:tabs wire:model.live="hari" variant="segmented">
                <flux:tab name="Senin">Senin</flux:tab>
                <flux:tab name="Selasa">Selasa</flux:tab>
                <flux:tab name="Rabu">Rabu</flux:tab>
                <flux:tab name="Kamis">Kamis</flux:tab>
                <flux:tab name="Jumat">Jumat</flux:tab>
            </flux:tabs>
        </div>

        <div class="mt-5">
            <flux:table>
                <flux:table.columns sticky class="text-center">
                    <flux:table.column>Jam</flux:table.column>
                    <flux:table.column>Mata Kuliah</flux:table.column>
                    <flux:table.column>Program Studi</flux:table.column>
                    <flux:table.column>Kelas</flux:table.column>
                    <flux:table.column>Dosen</flux:table.column>

                </flux:table.columns>

                <flux:table.rows>
                    @foreach ($jadwals as $item)
                        <flux:table.row>
                            <flux:table.cell>{{ $item->waktu_mulai }}-{{ $item->waktu_selesai }}</flux:table.cell>
                            <flux:table.cell>{{ $item->mata_kuliah }}</flux:table.cell>
                            <flux:table.cell>
                                <flux:badge color="green" size="sm" inset="top bottom">{{ $item->program_studi }}
                                </flux:badge>
                            </flux:table.cell>
                            <flux:table.cell variant="strong">{{ $item->kelas }}</flux:table.cell>
                            <flux:table.cell>
                                <div class="flex flex-col text-xs">
                                    <span>{{ $item->dosen1 }}</span>
                                    @if ($item->dosen2)
                                        <span>{{ $item->dosen2 }}</span>
                                    @endif
                                </div>
                            </flux:table.cell>

                        </flux:table.row>
                    @endforeach



                </flux:table.rows>
            </flux:table>
        </div>
    </div>
</div>
