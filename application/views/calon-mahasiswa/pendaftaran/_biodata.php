<div class="card card-form">
    <div class="card-body px-4">
        <!-- Data Calon Mahasiswa -->
        <div class="row border border-warning rounded-1 mb-3">
            <div class="col-12 p-0">
                <h5 class="px-2 m-0 bg-warning p-1 text-white">
                    Data Calon Mahasiswa
                </h5>
            </div>
            <div class="col-12">
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="nama-sesuai-ijazah">
                            Nama Sesuai Ijazah
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <input type="text"
                            class="form-control"
                            id="nama-sesuai-ijazah"
                            required />
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="nama-ibu-kandung">
                            Nama Ibu Kandung
                        </label>
                    </div>
                    <div class="col-md">
                        <input type="text"
                            class="form-control"
                            id="nama-ibu-kandung"
                            required />
                    </div>
                    <div class="col-12 col-lg-auto">
                        (Sesuai Kelahiran)
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="nomor-ktp-nik">
                            Nomor KTP / NIK
                        </label>
                    </div>
                    <div class="col-md">
                        <input type="text"
                            class="form-control number"
                            id="nomor-ktp-nik" />
                    </div>
                    <div class="col-12 col-lg-auto">
                        (Tanpa Tanda Baca)
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="kewarnegaraan">
                            Kewarnegaraan
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <select type="text"
                            class="form-select"
                            id="kewarnegaraan"
                            required>
                            <option value="">-- Pilih --</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Asing">Asing</option>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="jenis-kelamin">
                            Jenis Kelamin
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <select type="text"
                            class="form-select"
                            id="jenis-kelamin"
                            required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="agama">
                            Agama
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <select type="text"
                            class="form-select"
                            id="agama"
                            required>
                            <option value="">-- Pilih --</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="tempat-lahir">
                            Tempat Lahir
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <input type="text"
                            class="form-control"
                            id="tempat-lahir"
                            required />
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="tanggal-lahir">
                            Tanggal Lahir
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <input type="date"
                            class="form-control"
                            id="tanggal-lahir"
                            required />
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="nomor-induk-siswa-nasional">
                            Nomor Induk Siswa Nasional
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <input type="text"
                            class="form-control number"
                            id="nomor-induk-siswa-nasional" />
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="nomor-ukg">
                            Nomor UKG
                        </label>
                    </div>
                    <div class="col-md">
                        <input type="text"
                            class="form-control"
                            id="nomor-ukg"
                            required />
                    </div>
                    <div class="col-12 col-lg-auto">
                        *khusus PPG
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Data Calon Mahasiswa -->

        <!-- Alamat Sesuai KTP/KK -->
        <div class="row border border-dark rounded-1 mb-3">
            <div class="col-12 p-0">
                <h5 class="px-2 m-0 bg-dark p-1 text-white">
                    Alamat Sesuai KTP/KK
                </h5>
            </div>
            <div class="col-12">
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="alamat-jalan">
                            Alamat Jalan
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <input type="text"
                            class="form-control"
                            id="alamat-jalan"
                            required />
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="dusun">
                            Dusun/RT/RW
                        </label>
                    </div>
                    <div class="col-6 col-lg-6 col-md-4">
                        <input type="text"
                            class="form-control"
                            id="dusun" />
                    </div>
                    <div class="col-auto p-0">/</div>
                    <div class="col">
                        <input type="text"
                            id="rt"
                            class="form-control" />
                    </div>
                    <div class="col-auto p-0">/</div>
                    <div class="col">
                        <input type="text"
                            id="rw"
                            class="form-control" />
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="desa">
                            Desa/Kelurahan
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <input type="text"
                            class="form-control"
                            id="desa"
                            required />
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="provinsi">
                            Provinsi
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <select id="provinsi" class="form-select">
                            <option value="">-- Pilih --</option>
                            <?php if (!empty($provinsi)) : foreach ($provinsi as $value) : ?>
                                <option value="<?= $value->id ?>">
                                    <?= $this->security->xss_clean($value->nama) ?>
                                </option>
                            <?php endforeach; endif ?>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="kabupaten">
                            Kotamadya/Kabupaten
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <select id="kabupaten" class="form-select">
                            <option value="">-- Pilih --</option>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="kecamatan">
                            Kecamatan
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <select id="kecamatan" class="form-select">
                            <option value="">-- Pilih --</option>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="kode-pos">
                            Kode Pos
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <input type="text"
                            class="form-control"
                            id="kode-pos"
                            required>
                    </div>
                </div>
                <div class="row align-items-center my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="telepon">
                            Telepon/HP
                        </label>
                    </div>
                    <div class="col">
                        <input type="text"
                            class="form-control"
                            id="telepon">
                    </div>
                    <div class="col-auto">/</div>
                    <div class="col-12 col-md">
                        <input type="text"
                            class="form-control"
                            id="hp">
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Alamat Sesuai KTP/KK -->

        <!-- Informasi Kampus -->
        <div class="row border border-info rounded-1 mb-3">
            <div class="col-12 p-0">
                <h5 class="px-2 m-0 bg-info p-1 text-white">
                    Informasi Kampus
                </h5>
            </div>
            <div class="col-12">
                <div class="row my-2">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <label for="sumber-informasi">
                            Sumber Informasi
                        </label>
                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <div class="row">
                            <?php if (!empty($sumber_informasi)) : foreach ($sumber_informasi as $key => $value) : ?>
                                <div class="col-auto">
                                    <div class="form-check">
                                        <input class="form-check-input sumber-informasi"
                                            type="checkbox"
                                            value="<?= $value->id ?>"
                                            id="sumber-<?= $key ?>">
                                        <label class="form-check-label" for="sumber-<?= $key ?>">
                                            <?= $value->nama ?>
                                        </label>
                                    </div>
                                </div>
                            <?php endforeach;endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Informasi Kampus -->

        <div class="row justify-content-end">
            <div class="col-auto p-0">
                <button class="btn btn-primary"
                    type="button"
                    id="tombol-selanjutnya-biodata">
                        Selanjutnya
                </button>
            </div>
        </div>
    </div>
</div>