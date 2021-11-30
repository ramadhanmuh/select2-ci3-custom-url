<div class="card card-form d-none">
    <div class="card-body px-4">
        <div class="row border border-warning rounded-1 mb-3">
            <div class="col-12 p-0">
                <h5 class="px-2 m-0 bg-warning p-1 text-white">
                    Hasil Unggah Slip Pembayaran
                </h5>
            </div>
            <div class="col-12">
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label>
                            Berkas Slip Setor
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <span class=""
                            id="slip-setor-tidak-ada">
                            Tidak ada
                        </span>
                        <a href=""
                            class="text-decoration-none d-none"
                            target="_blank"
                            id='url-slip-setor'>
                            Lihat
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row border border-dark rounded-1 mb-3">
            <div class="col-12 p-0">
                <h5 class="px-2 m-0 bg-dark p-1 text-white">
                    Formulir Unggah Slip Pembayaran
                </h5>
            </div>
            <div class="col-12">
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label>
                            Nominal yang dibayarkan (Rp)
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <span id="nominal-slip-pembayaran">
                        </span>
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label>
                            Kode Bank
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <select id="kode-bank-slip-pembayaran"
                            class="form-select">
                            <option value="">-- Pilih --</option>
                            <?php foreach ($bank as $value) : ?>
                                <option value="<?= htmlentities($value->id) ?>">
                                    <?= htmlentities($value->nama) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="id-setor">
                            ID Setor
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <input type="text" class="form-control"
                            id="id-setor">
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="tanggal-bayar-slip-pembayaran"> 
                            Tanggal Bayar
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <input class="form-control"
                            id="tanggal-bayar-slip-pembayaran"
                            type="date">
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="berkas-slip-setor">
                            Berkas Slip Setor
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <input type="file"
                            class="form-control"
                            id="berkas-slip-setor">
                        <input type="hidden"
                            id="input-berkas-alamat-slip-pembayaran">
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-end">
            <div class="col-auto">
                <button class="btn btn-primary"
                    type="button"
                    id="tombol-slip-pembayaran-kembali">
                        Kembali
                </button>
            </div>
            <div class="col-auto p-0">
                <button class="btn btn-primary"
                    type="button"
                    id="tombol-slip-pembayaran-selanjutnya">
                        Selanjutnya
                </button>
            </div>
        </div>
    </div>
</div>