<!-- Start Content-->
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>

                        <li class="breadcrumb-item active">Monitor</li>
                    </ol>
                </div>
                <h4 class="page-title">Monitoring Tim Kerja dan Beban Kerja</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <?php foreach ($statistics as $key => $value) : ?>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 table-responsive">
                                <table class="table dt-responsive nowrap">
                                    <tr>
                                        <td>Nama Tim</td>
                                        <td class="ml-2 mr-2">:</td>
                                        <td><?= $value['unit_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td class="ml-2 mr-2">:</td>
                                        <td><?= $value['description'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kordinator</td>
                                        <td class="ml-2 mr-2">:</td>
                                        <td><?= $value['supervisor_name'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Tgl Dibuat</td>
                                        <td class="ml-2 mr-2">:</td>
                                        <td><?= $value['created_at'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tgl Diubah</td>
                                        <td class="ml-2 mr-2">:</td>
                                        <td><?= $value['updated_at'] ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <canvas id="<?= 'unit_' . $key ?>"></canvas>
                            </div>
                            <div class="col-12 table-responsive">
                                <h5>Beban Kerja</h5>
                                <table class="table dt-responsive nowrap">
                                    <tr>
                                        <th width="20">No</th>
                                        <th>Nama Tugas</th>
                                        <th>Tgl Dibuat</th>
                                        <th>Tgl Diubah</th>
                                        <th>Progress</th>
                                    </tr>
                                    <?php $n = 1;
                                    for ($i = 0; $i < count($value['task']); $i++) : ?>
                                        <tr>
                                            <td><?= $n++; ?></td>
                                            <td><?= $value['task'][$i]['task_name'] ?></td>
                                            <td><?= $value['task'][$i]['created_at'] ?></td>
                                            <td><?= $value['task'][$i]['updated_at'] ?></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="<?= 'width:' . $value['task'][$i]['progress'] . '%' ?>" aria-valuenow="<?= $value['task'][$i]['progress'] ?>" aria-valuemin="0" aria-valuemax="100"><?= $value['task'][$i]['progress'] . '%' ?></div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endfor ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                const <?= 'colour_data_unit_' . $key ?> = "<?= ($value['curr_progress'] == 100) ? 'rgb(54, 162, 235)' : 'rgb(255, 99, 132)' ?>";
                const <?= 'data_unit_' . $key ?> = {
                    labels: [
                        'Selesai', 'Sisa'
                    ],
                    datasets: [{
                        label: 'Progress',
                        data: [
                            <?= $value['curr_progress'] ?>,
                            <?= 100 - $value['curr_progress'] ?>
                        ],
                        backgroundColor: [
                            <?= 'colour_data_unit_' . $key ?>,
                            'rgb(230, 236, 237)'
                        ],
                        hoverOffset: 4
                    }]
                };

                const <?= 'config_unit_' . $key ?> = {
                    type: 'doughnut',
                    data: <?= 'data_unit_' . $key ?>,
                    options: {
                        legend: {
                            display: false
                        }
                    },
                    plugins: {
                        beforeDraw: function(chart) {
                            var width = chart.chart.width,
                                height = chart.chart.height,
                                ctx = chart.chart.ctx;

                            ctx.restore();
                            var fontSize = (height / 114).toFixed(2);
                            ctx.font = fontSize + "em sans-serif";
                            ctx.textBaseline = "middle";

                            var text = "<?= $value['curr_progress'] ?>%",
                                textX = Math.round((width - ctx.measureText(text).width) / 2),
                                textY = height / 2;

                            ctx.fillText(text, textX, textY);
                            ctx.save();
                        }
                    }
                };

                const <?= 'unit_' . $key ?> = new Chart(
                    document.getElementById("<?= 'unit_' . $key ?>"),
                    <?= 'config_unit_' . $key ?>
                );
            </script>
        <?php endforeach ?>
    </div>

</div> <!-- container -->