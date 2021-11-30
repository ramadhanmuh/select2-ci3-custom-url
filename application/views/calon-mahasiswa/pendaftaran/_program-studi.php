<div class="card card-form d-none">
    <div class="card-body px-4">
        <!-- Pilihan Program Studi -->
        <div class="row border border-warning rounded-1 mb-3">
            <div class="col-12 p-0">
                <h5 class="px-2 m-0 bg-warning p-1 text-white">
                    Pilihan Program Studi
                </h5>
            </div>
            <div class="col-12">
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label>
                            Email
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <?= $this->session->calon_mahasiswa->email ?>
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label>
                            Nama
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9"
                        id="nama-lengkap-di-prodi">
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="kelompok-pilihan">
                            Kelompok
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <select id="kelompok-pilihan" class="form-select">
                            <option value="">
                                -- Pilih --
                            </option>
                            <?php if (!empty($kelompok)) : foreach ($kelompok as $value) : ?>
                                <option value="<?= $value->id ?>">
                                    <?= $value->nama ?>
                                </option>
                            <?php endforeach; endif ?>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="program-studi">
                            Program Studi
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <select id="program-studi" class="form-select">
                            <option value="">
                                -- Pilih --
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="kelas">
                            Kelas
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <select id="kelas" class="form-select">
                            <option value="">
                                -- Pilih --
                            </option>
                            <option value="1">
                                Reguler
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Pilihan Program Studi -->

        <!-- Asal Sekolah -->
        <div class="row border border-dark rounded-1 mb-3">
            <div class="col-12 p-0">
                <h5 class="px-2 m-0 bg-dark p-1 text-white">
                    Asal Sekolah
                </h5>
            </div>
            <div class="col-12">
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label>
                            Provinsi
                        </label>
                    </div>  
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <select id="provinsi-asal-sekolah" class="form-select">
                            <option value="">-- Pilih --</option>
                            <?php if (!empty($provinsi_asal_sekolah)) : foreach ($provinsi_asal_sekolah as $value) : ?>
                                <option value="<?= $value->kode_prop ?>"><?= $value->propinsi ?></option>
                            <?php endforeach; endif ?>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label>
                            Kotamadya/Kabupaten
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <select id="kabupaten-asal-sekolah" class="form-select">
                            <option value="">-- Pilih --</option>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label>
                            Kecamatan
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <select id="kecamatan-asal-sekolah" class="form-select">
                            <option value="">-- Pilih --</option>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label>
                            Nama Sekolah
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <select id="nama-asal-sekolah" class="form-select">
                            <option value="">-- Pilih --</option>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="tanggal-lulus-asal-sekolah">
                            Tanggal Lulus
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <input type="date"
                            class="form-control"
                            id="tanggal-lulus-asal-sekolah">
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="nomor-ijazah-asal-sekolah">
                            Nomor Ijazah
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <input type="text"
                            class="form-control"
                            id="nomor-ijazah-asal-sekolah">
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Asal Sekolah -->

        <div class="row justify-content-end">
            <div class="col-auto me-2">
                <button class="btn btn-primary"
                    id="tombol-prodi-kembali">
                    Kembali
                </button>
            </div>
            <div class="col-auto p-0">
                <button class="btn btn-primary"
                    type="button"
                    id="tombol-prodi-selanjutnya">
                        Selanjutnya
                </button>
            </div>
        </div>
    </div>
</div>