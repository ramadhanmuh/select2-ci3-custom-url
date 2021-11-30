<div class="card card-form">
    <div class="card-body px-4 py-5">
        <div class="row">
            <div class="col-12">
                <h5>Cetak Bukti Pra Registrasi</h5>
            </div>
            <div class="col-12">
                <ul>
                    <li>
                        Pastikan PROGRAM STUDI yang dipilih SUDAH BENAR
                    </li>
                    <li>
                        Setelah mencetak BUKTI PRA REGISTRASI,
                        maka anda tidak dapat menyunting lagi PROGRAM STUDI
                    </li>
                    <li>
                        Jika anda sudah yakin, tekan Cetak Bukti Daftar dibawah
                    </li>
                    <li>
                        Pada lembar BUKTI PRA REGISTRASI akan tertulis Nomor Pra Registrasi.
                        Nomor Pra Registrasi adalah Nomor yang anda gunakan untuk pembayaran Biaya Pendaftaran atau SPP.
                    </li>
                    <li>
                        Setelah melakukan pembayaran,
                        anda mendapatkan PIN dan dapat melakukan pencetakan Kartu Ujian bagi yang mengikuti Ujian.
                    </li>
                </ul>
            </div>
            <div class="col-12 text-center">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <button class="btn btn-secondary"
                            href="<?= base_url('kartureg') ?>"
                            target="_blank"
                            id="tombol-cetak-praregistrasi"
                            onclick="konfirmasiTombolCetakPraRegistrasi(this)">
                            Cetak Bukti Daftar
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row justify-content-end">
                    <div class="col-auto me-2">
                    </div>
                    <div class="col-auto p-0 mt-2 mt-md-0">
                        <button class="btn btn-primary"
                            type="button"
                            id="tombol-praregistrasi-selanjutnya">
                                Selanjutnya
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>