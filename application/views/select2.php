<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description"
            content="Masuk calon mahasiswa situs. <?= $this->config->item('nama_situs') ?>" />
        <meta name="author" content="<?= $this->config->item('author') ?>" />
        <meta name="url" content="<?= base_url('') ?>" />

        <link href="<?= base_url('vendor/sb-admin/') ?>css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?= base_url('vendor/select2/dist/css/select2.min.css') ?>">

        <title><?= $this->config->item('nama_situs') ?> - Masuk</title>
        
    </head>
    <body class="bg-light">
        <div class="container">
            <div class="row justify-content-center bg-white">
                <div class="col-auto">
                    <select class="form-select"
                        id="pengguna">
                        <option value="">-- Pilih --</option>
                        <?php if (!empty($pengguna)) : foreach ($pengguna as $value) : ?>
                            <option value="<?= $value->id ?>">
                                <?= $value->nama ?>
                            </option>
                        <?php endforeach; endif ?>
                    </select>
                    <select class="form-select js-example-basic-single">
                        <option value="">-- Pilih --</option>
                    </select>
                </div>
            </div>
        </div>
        <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
        <script src="<?= base_url('vendor/select2/dist/js/select2.full.min.js') ?>"></script>
        <script>
            $(document).ready(function() {
                var idPengguna = $('#pengguna').find('option:selected').val();

                $('#pengguna').change(function () {
                    idPengguna = $(this).find('option:selected').val();
                });

                $('.js-example-basic-single').select2({
                    minimumInputLength: 3,
                    ajax: {
                        url: '<?= base_url('select2/getKontak') ?>',
                        dataType: 'json',
                        method: 'get',
                        delay: 250,
                        data: function (params) {
                            var queryParameters = {
                                'q': params.term,
                                'id_pengguna': $('#pengguna').find('option:selected').val()
                            }

                            return queryParameters;
                        },
                        processResults: function (response) {
                            return {
                                results: response
                            };
                        },
                        cache: false
                    },
                });
            });
        </script>
    </body>
</html>
