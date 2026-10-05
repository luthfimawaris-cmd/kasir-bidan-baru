<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pasien;

class PasienManager extends Component
{
    public $editId = null;

    public $nama, $nik, $no_rekam_medis, $jenis_kelamin, $tanggal_lahir, $no_hp, $alamat;

    protected $rules = [
        'nama' => 'required|min:3',
        'nik' => 'nullable|max:20',
        'jenis_kelamin' => 'nullable|in:L,P',
        'tanggal_lahir' => 'nullable|date',
        'no_hp' => 'nullable|max:15',
        'alamat' => 'nullable',
    ];

    public function simpan()
    {
        $this->validate();

        if ($this->editId) {
            $pasien = Pasien::find($this->editId);
            $pasien->update([
                'nama' => $this->nama,
                'nik' => $this->nik,
                'jenis_kelamin' => $this->jenis_kelamin,
                'tanggal_lahir' => $this->tanggal_lahir,
                'no_hp' => $this->no_hp,
                'alamat' => $this->alamat,
            ]);
            session()->flash('success', 'Data pasien berhasil diupdate!');
        } else {
            Pasien::create([
                'no_rekam_medis' => 'RM-' . strtoupper(uniqid()),
                'nama' => $this->nama,
                'nik' => $this->nik,
                'jenis_kelamin' => $this->jenis_kelamin,
                'tanggal_lahir' => $this->tanggal_lahir,
                'no_hp' => $this->no_hp,
                'alamat' => $this->alamat,
            ]);
            session()->flash('success', 'Pasien baru berhasil ditambahkan!');
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        $this->editId = $pasien->id;
        $this->nama = $pasien->nama;
        $this->nik = $pasien->nik;
        $this->jenis_kelamin = $pasien->jenis_kelamin;
        $this->tanggal_lahir = $pasien->tanggal_lahir?->format('Y-m-d');
        $this->no_hp = $pasien->no_hp;
        $this->alamat = $pasien->alamat;
    }

    public function hapus($id)
    {
        Pasien::destroy($id);
        session()->flash('success', 'Data pasien dihapus.');
    }

    public function resetForm()
    {
        $this->reset(['editId', 'nama', 'nik', 'jenis_kelamin', 'tanggal_lahir', 'no_hp', 'alamat']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.pasien-manager', [
            'pasiens' => Pasien::latest()->get(),
        ]);
    }
}