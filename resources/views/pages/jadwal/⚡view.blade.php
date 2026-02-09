<?php

use Livewire\Component;
use Flux\Flux;

new class extends Component {
    public $hari = 'Senin';
    public $jadwal_id;

    public $mata_kuliah;
    public $program_studi;
    public $kelas;
    public $dosen1;
    public $dosen2;
    public $waktu_mulai;
    public $waktu_selesai;

    public function lihatJadwal($id)
    {
        $jadwal = \App\Models\Jadwal::find($id);

        $this->jadwal_id = $id;
        $this->mata_kuliah = $jadwal->mata_kuliah;
        $this->program_studi = $jadwal->program_studi;
        $this->kelas = $jadwal->kelas;
        $this->dosen1 = $jadwal->dosen1;
        $this->dosen2 = $jadwal->dosen2;
        $this->hari = $jadwal->hari;
        $this->waktu_mulai = $jadwal->waktu_mulai;
        $this->waktu_selesai = $jadwal->waktu_selesai;
    }

    public function updateJadwal()
    {
        $this->validate([
            'mata_kuliah' => 'nullable|string',
            'program_studi' => 'nullable|string',
            'kelas' => 'nullable|string',
            'dosen1' => 'nullable|string',
            'dosen2' => 'nullable|string',
            'hari' => 'required|string',
            'waktu_mulai' => 'required|string',
            'waktu_selesai' => 'required|string',
        ]);

        // Update existing jadwal
        \App\Models\Jadwal::where('id', $this->jadwal_id)->update([
            'mata_kuliah' => $this->mata_kuliah,
            'program_studi' => $this->program_studi,
            'kelas' => $this->kelas,
            'dosen1' => $this->dosen1,
            'dosen2' => $this->dosen2,
            'hari' => $this->hari,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
        ]);

        Flux::modal('edit-jadwal-' . $this->jadwal_id)->close();
        $this->resetForm();

    }

    public function saveJadwal()
    {
        $this->validate([
            'mata_kuliah' => 'nullable|string',
            'program_studi' => 'nullable|string',
            'kelas' => 'nullable|string',
            'dosen1' => 'nullable|string',
            'dosen2' => 'nullable|string',
            'hari' => 'required|string',
            'waktu_mulai' => 'required|string',
            'waktu_selesai' => 'required|string',
        ]);

        // Create new jadwal
        \App\Models\Jadwal::create([
            'mata_kuliah' => $this->mata_kuliah,
            'program_studi' => $this->program_studi,
            'kelas' => $this->kelas,
            'dosen1' => $this->dosen1,
            'dosen2' => $this->dosen2,
            'hari' => $this->hari,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
        ]);

        Flux::modal('tambah-jadwal')->close();
        $this->resetForm();

    }

    public function setDeleteJadwal($id)
    {
        $this->jadwal_id = $id;
    }

    public function deleteJadwal()
    {
        \App\Models\Jadwal::destroy($this->jadwal_id);
        Flux::modal('delete-jadwal-' . $this->jadwal_id)->close();
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->mata_kuliah = '';
        $this->program_studi = '';
        $this->kelas = '';
        $this->dosen1 = '';
        $this->dosen2 = '';
        $this->waktu_mulai = '';
        $this->waktu_selesai = '';
        $this->jadwal_id = null;
    }

    public function render()
    {
        return view('pages.jadwal.⚡view', [
            'hari' => $this->hari,
            'jadwals' => \App\Models\Jadwal::where('hari', $this->hari)->get(),
            'allJadwals' => \App\Models\Jadwal::all(),
        ])->layout('layouts.app');
    }
};
?>

<div>
    <div class="flex justify-between items-center">
        <flux:tabs wire:model.live="hari" variant="segmented">
            <flux:tab name="Senin">Senin</flux:tab>
            <flux:tab name="Selasa">Selasa</flux:tab>
            <flux:tab name="Rabu">Rabu</flux:tab>
            <flux:tab name="Kamis">Kamis</flux:tab>
            <flux:tab name="Jumat">Jumat</flux:tab>
        </flux:tabs>

        <flux:modal.trigger name="tambah-jadwal">
            <flux:button variant="primary" size="sm">+ Jadwal</flux:button>
        </flux:modal.trigger>
    </div>

    <div class="mt-5">
        <flux:table>
            <flux:table.columns sticky>
                <flux:table.column>Jam</flux:table.column>
                <flux:table.column>Mata Kuliah</flux:table.column>
                <flux:table.column>Program Studi</flux:table.column>
                <flux:table.column>Kelas</flux:table.column>
                <flux:table.column>Dosen</flux:table.column>
                <flux:table.column>Aksi</flux:table.column>
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
                        <flux:table.cell>
                            <flux:modal.trigger :name="'edit-jadwal-'.$item->id">
                                <flux:button wire:click="lihatJadwal({{ $item->id }})" size="sm" variant="subtle" icon="pencil" aria-label="Edit Jadwal" />
                            </flux:modal.trigger>
                            <flux:modal.trigger :name="'delete-jadwal-'.$item->id">
                                <flux:button wire:click="setDeleteJadwal({{ $item->id }})" size="sm" variant="subtle" color="danger" icon="trash"
                                    aria-label="Delete Jadwal" />
                            </flux:modal.trigger>
                        </flux:table.cell>
                    </flux:table.row>
                @endforeach



            </flux:table.rows>
        </flux:table>
    </div>


    <form wire:submit="saveJadwal">
        <flux:modal name="tambah-jadwal" class="md:w-1/2 lg:w-1/2">
            <div class="space-y-6 w-full">
                <div>
                    <flux:heading size="lg">Tambah Jadwal</flux:heading>
                    <flux:text class="mt-2">Tambahkan jadwal baru.</flux:text>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <flux:input wire:model="mata_kuliah" label="Mata Kuliah" placeholder="Masukkan mata kuliah" />
                    <flux:input wire:model="program_studi" label="Program Studi" placeholder="Masukkan program studi" />
                    <flux:input wire:model="kelas" label="Kelas" placeholder="Masukkan kelas" />
                </div>
                <flux:input wire:model="dosen1" label="Dosen 1" placeholder="Masukkan dosen 1" />
                <flux:input wire:model="dosen2" label="Dosen 2 (Opsional)" placeholder="Masukkan dosen 2 (Opsional)" />
                {{-- hari --}}
                <flux:select label="Hari" wire:model="hari">
                    <flux:select.option value="Senin">Senin</flux:select.option>
                    <flux:select.option value="Selasa">Selasa</flux:select.option>
                    <flux:select.option value="Rabu">Rabu</flux:select.option>
                    <flux:select.option value="Kamis">Kamis</flux:select.option>
                    <flux:select.option value="Jumat">Jumat</flux:select.option>
                </flux:select>

                <div class="grid grid-cols-3 gap-4">
                    <flux:input wire:model="waktu_mulai" label="Waktu Mulai" type="time" />
                    <flux:input wire:model="waktu_selesai" label="Waktu Selesai" type="time" />
                </div>
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
            </div>
        </flux:modal>
    </form>


    @foreach ($allJadwals as $item)
        <form wire:submit="updateJadwal()">
            <flux:modal :name="'edit-jadwal-'.$item->id" class="md:w-1/2 lg:w-1/2">
                <div class="space-y-6 w-full">
                    <div>
                        <flux:heading size="lg">Edit Jadwal</flux:heading>
                        <flux:text class="mt-2">Edit jadwal yang sudah ada.</flux:text>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <flux:input wire:model="mata_kuliah" label="Mata Kuliah" placeholder="Masukkan mata kuliah" />
                        <flux:input wire:model="program_studi" label="Program Studi"
                            placeholder="Masukkan program studi" />
                        <flux:input wire:model="kelas" label="Kelas" placeholder="Masukkan kelas" />
                    </div>
                    <flux:input wire:model="dosen1" label="Dosen 1" placeholder="Masukkan dosen 1" />
                    <flux:input wire:model="dosen2" label="Dosen 2 (Opsional)"
                        placeholder="Masukkan dosen 2 (Opsional)" />
                    {{-- hari --}}
                    <flux:select label="Hari" wire:model="hari">
                        <flux:select.option value="Senin">Senin</flux:select.option>
                        <flux:select.option value="Selasa">Selasa</flux:select.option>
                        <flux:select.option value="Rabu">Rabu</flux:select.option>
                        <flux:select.option value="Kamis">Kamis</flux:select.option>
                        <flux:select.option value="Jumat">Jumat</flux:select.option>
                    </flux:select>

                    <div class="grid grid-cols-3 gap-4">
                        <flux:input wire:model="waktu_mulai" label="Waktu Mulai" type="time" />
                        <flux:input wire:model="waktu_selesai" label="Waktu Selesai" type="time" />
                    </div>
                    <div class="flex">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary">Perbaharui</flux:button>
                    </div>
                </div>
            </flux:modal>
        </form>
    @endforeach


    @foreach ($allJadwals as $item)
        <form wire:submit="deleteJadwal">
            <flux:modal :name="'delete-jadwal-'.$item->id" class="min-w-[22rem]">
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Hapus Jadwal?</flux:heading>
                        <flux:text class="mt-2">
                            Anda akan menghapus jadwal <strong>{{ $item->mata_kuliah }}</strong>.<br>
                            Tindakan ini tidak dapat dikembalikan.
                        </flux:text>
                    </div>
                    <div class="flex gap-2">
                        <flux:spacer />
                        <flux:modal.close>
                            <flux:button variant="ghost">Batal</flux:button>
                        </flux:modal.close>
                        <flux:button type="submit" variant="danger">Hapus</flux:button>
                    </div>
                </div>
            </flux:modal>
        </form>
    @endforeach
</div>
