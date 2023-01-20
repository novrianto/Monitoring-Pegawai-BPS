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

    <div class="row mb-2">
        <a href="<?= base_url('admin/work-unit/') ?>" class="btn btn-info btn-rounded mb-3" style="margin-left:15px;"><i class="mdi mdi-arrow-left"></i> Kembali</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8 table-responsive">
                            <table class="table dt-responsive nowrap">
                                <tr>
                                    <td style="width: 25%;">Nama Tim</td>
                                    <td style="margin-left: 5px; margin-right: 5px; width: 15px">:</td>
                                    <td><?= $work_unit['unit_name'] ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">Deskripsi</td>
                                    <td style="margin-left: 5px; margin-right: 5px; width: 15px">:</td>
                                    <td><?= $work_unit['description'] ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">Kordinator</td>
                                    <td style="margin-left: 5px; margin-right: 5px; width: 15px">:</td>
                                    <td><?= $work_unit['supervisor_name'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-4">
                            <canvas id="myCanvas"></canvas>
                        </div>
                        <div class="col-12 table-responsive">
                            <h5>Beban Kerja</h5>
                            <table class="table dt-responsive nowrap">
                                <tr>
                                    <th width="20">No</th>
                                    <th>Nama Tugas</th>
                                    <th>Deskripsi</th>
                                    <th>Beban Kerja</th>
                                    <th>Pekerja</th>
                                    <th>Status</th>
                                    <th>Tgl Dibuat</th>
                                    <th>Tgl Diubah</th>
                                    <th>Progress</th>
                                </tr>
                                <?php $n = 1;
                                for ($i = 0; $i < count($task); $i++) : ?>
                                    <tr>
                                        <td><?= $n++; ?></td>
                                        <td><?= $task[$i]['task_name'] ?></td>
                                        <td><?= $task[$i]['description'] ?></td>
                                        <td><?= $task[$i]['task_point'] ?></td>
                                        <td><?= $task[$i]['full_name'] ?></td>

                                        <td>
                                            <?php if ($task[$i]['status'] == 'new') : ?>
                                                <span class="badge badge-primary">Baru</span>
                                            <?php elseif ($task[$i]['status'] == 'ongoing') : ?>
                                                <span class="badge badge-warning">Sedang Berjalan</span>
                                            <?php elseif ($task[$i]['status'] == 'finish') : ?>
                                                <span class="badge badge-success">Selesai</span>
                                            <?php else : ?>
                                                <span class="badge badge-secondary">Unknown</span>
                                            <?php endif ?>
                                        </td>
                                        <td><?= $task[$i]['created_at'] ?></td>
                                        <td><?= $task[$i]['updated_at'] ?></td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="<?= 'width:' . $task[$i]['progress'] . '%' ?>" aria-valuenow="<?= $task[$i]['progress'] ?>" aria-valuemin="0" aria-valuemax="100"><?= $task[$i]['progress'] . '%' ?></div>
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
            const main_colour = "<?= ($work_unit['curr_progress'] == 100) ? 'rgb(54, 162, 235)' : 'rgb(255, 99, 132)' ?>";
            const data = {
                labels: [
                    'Selesai', 'Sisa'
                ],
                datasets: [{
                    label: 'Progress',
                    data: [
                        <?= $work_unit['curr_progress'] ?>,
                        <?= 100 - $work_unit['curr_progress'] ?>
                    ],
                    backgroundColor: [
                        main_colour,
                        'rgb(230, 236, 237)'
                    ],
                    hoverOffset: 4
                }]
            };

            const config = {
                type: 'doughnut',
                data: data,
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

                        var text = "<?= $work_unit['curr_progress'] ?>%",
                            textX = Math.round((width - ctx.measureText(text).width) / 2),
                            textY = height / 2;

                        ctx.fillText(text, textX, textY);
                        ctx.save();
                    }
                }
            };

            const myCanvas = new Chart(
                document.getElementById("myCanvas"),
                config
            );
        </script>
    </div>

</div> <!-- container -->