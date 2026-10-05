<?php

namespace App\Livewire\Actions;

use Livewire\Component;
use App\Models\Pasien;
use App\Models\Obat;
use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class KasirUtama extends Component
{
    public $pasien_id;
    public $keranjangObat = [];
    public $keranjangLayanan = [];
    public $totalHarga = 0;

    public function tambahObat($id)
    {
        $obat = Obat::find($id);
        if (!$obat || $obat->stok <= 0) {
            session()->flash('error', 'Stok obat habis!');
            return;
        }

        if (isset($this->keranjangObat[$id])) {
            if ($this->keranjangObat[$id]['qty'] < $obat->stok) {
                $this->keranjangObat[$id]['qty']++;
            } else {
                session()->flash('error', 'Stok tidak mencukupi!');
            }
        } else {
            $this->keranjangObat[$id] = [
                'nama' => $obat->nama,
                'harga' => $obat->harga_jual,
                'qty' => 1
            ];
        }
        $this->hitungTotal();
    }

    public function kurangObat($id)
    {
        if (isset($this->keranjangObat[$id])) {
            $this->keranjangObat[$id]['qty']--;
            if ($this->keranjangObat[$id]['qty'] <= 0) {
                unset($this->keranjangObat[$id]);
            }
        }
        $this->hitungTotal();
    }

    public function tambahLayanan($id)
    {
        $layanan = Layanan::find($id);
        if (!isset($this->keranjangLayanan[$id])) {
            $this->keranjangLayanan[$id] = [
                'nama' => $layanan->nama_layanan,
                'tarif' => $layanan->tarif
            ];
        }
        $this->hitungTotal();
    }

    public function hapusObat($id)
    {
        unset($this->keranjangObat[$id]);
        $this->hitungTotal();
    }

    public function hapusLayanan($id)
    {
        unset($this->keranjangLayanan[$id]);
        $this->hitungTotal();
    }

    public function hitungTotal()
    {
        $total = 0;
        foreach ($this->keranjangObat as $item) {
            $total += $item['harga'] * $item['qty'];
        }
        foreach ($this->keranjangLayanan as $item) {
            $total += $item['tarif'];
        }
        $this->totalHarga = $total;
    }

    public function simpanTransaksi()
    {
        if (!$this->pasien_id) {
            session()->flash('error', 'Pilih pasien dulu ya!');
            return;
        }

        if (empty($this->keranjangObat) && empty($this->keranjangLayanan)) {
            session()->flash('error', 'Keranjang masih kosong, pilih obat atau layanan dulu!');
            return;
        }

        $transaksiId = null;

        DB::transaction(function() use (&$transaksiId) {
            $transaksi = Transaksi::create([
                'kode_transaksi' => 'TRX-' . strtoupper(uniqid()),
                'pasien_id' => $this->pasien_id,
                'total_harga' => $this->totalHarga,
                'status_pembayaran' => 'Sukses'
            ]);

            foreach ($this->keranjangObat as $id => $item) {
                $transaksi->detailObat()->create([
                    'obat_id' => $id,
                    'qty' => $item['qty'],
                    'harga_satuan' => $item['harga']
                ]);
                Obat::find($id)->decrement('stok', $item['qty']);
            }

            foreach ($this->keranjangLayanan as $id => $item) {
                $transaksi->detailLayanan()->create([
                    'layanan_id' => $id,
                    'tarif_satuan' => $item['tarif']
                ]);
            }

            $transaksiId = $transaksi->id;
        });

        $this->reset(['pasien_id', 'keranjangObat', 'keranjangLayanan', 'totalHarga']);
        session()->flash('success', 'Transaksi berhasil! Struk sedang dicetak...');

        $this->js("window.open('/transaksi/{$transaksiId}/struk', '_blank')");
    }

    public function render()
    {
        $pasiens = Pasien::orderBy('nama')->get();
        $obats = Obat::where('stok', '>', 0)->orderBy('nama')->get();
        $layanans = Layanan::orderBy('nama_layanan')->get();

        return view('livewire.actions.kasir-utama', [
            'pasiens' => $pasiens,
            'obats' => $obats,
            'layanans' => $layanans,
        ]);
    }
}