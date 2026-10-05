<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Layanan;

class LayananManager extends Component
{
    public $editId = null;
    public $nama_layanan, $tarif;

    protected $rules = [
        'nama_layanan' => 'required|min:2',
        'tarif' => 'required|numeric|min:0',
    ];

    public function simpan()
    {
        $this->validate();

        $data = ['nama_layanan' => $this->nama_layanan, 'tarif' => $this->tarif];

        if ($this->editId) {
            Layanan::find($this->editId)->update($data);
            session()->flash('success', 'Layanan berhasil diupdate!');
        } else {
            Layanan::create($data);
            session()->flash('success', 'Layanan baru berhasil ditambahkan!');
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        $this->editId = $layanan->id;
        $this->nama_layanan = $layanan->nama_layanan;
        $this->tarif = $layanan->tarif;
    }

    public function hapus($id)
    {
        Layanan::destroy($id);
        session()->flash('success', 'Layanan dihapus.');
    }

    public function resetForm()
    {
        $this->reset(['editId', 'nama_layanan', 'tarif']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.layanan-manager', [
            'layanans' => Layanan::latest()->get(),
        ]);
    }
}