<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Obat;

class ObatManager extends Component
{
    public $editId = null;
    public $nama, $stok, $harga_jual, $expired_at;

    protected $rules = [
        'nama' => 'required|min:2',
        'stok' => 'required|integer|min:0',
        'harga_jual' => 'required|numeric|min:0',
        'expired_at' => 'nullable|date',
    ];

    public function simpan()
    {
        $this->validate();

        $data = [
            'nama' => $this->nama,
            'stok' => $this->stok,
            'harga_jual' => $this->harga_jual,
            'expired_at' => $this->expired_at,
        ];

        if ($this->editId) {
            Obat::find($this->editId)->update($data);
            session()->flash('success', 'Data obat berhasil diupdate!');
        } else {
            Obat::create($data);
            session()->flash('success', 'Obat baru berhasil ditambahkan!');
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        $this->editId = $obat->id;
        $this->nama = $obat->nama;
        $this->stok = $obat->stok;
        $this->harga_jual = $obat->harga_jual;
        $this->expired_at = $obat->expired_at?->format('Y-m-d');
    }

    public function hapus($id)
    {
        Obat::destroy($id);
        session()->flash('success', 'Data obat dihapus.');
    }

    public function resetForm()
    {
        $this->reset(['editId', 'nama', 'stok', 'harga_jual', 'expired_at']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.obat-manager', [
            'obats' => Obat::latest()->get(),
        ]);
    }
}