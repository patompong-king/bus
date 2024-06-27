<?php

use PHPUnit\Framework\Constraint\Count;

$link = site_url('Bus/');
$json_rep = file_get_contents($link . 'bus_report_report?date=' . $date);
$data_rep = json_decode($json_rep);
if ($data_rep != null) {
    $json_lo = file_get_contents($link . 'bus_report_lo');
    $data_lo = json_decode($json_lo);
    $data = array();
    for ($i = 0; $i < count($data_lo); $i++) {
        $lo_c = $data_lo[$i]->location_code;
        $data['t05'][$lo_c] = array();
        $data['t08'][$lo_c] = array();
        $data['t17'][$lo_c] = array();
        $data['t20'][$lo_c] = array();
    }
    for ($i = 0; $i < count($data_lo); $i++) {
        $lo_c = $data_lo[$i]->location_code;
        $data['t05'][$lo_c] = $data_rep->t05->$lo_c;
        $data['t08'][$lo_c] = $data_rep->t08->$lo_c;
        $data['t17'][$lo_c] = $data_rep->t17->$lo_c;
        $data['t20'][$lo_c] = $data_rep->t20->$lo_c;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
        </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<style>
    tr,
    th,
    td {
        border: 1px solid #000000;
    }

    th {
        text-align: center;
    }

    .bg-info,
    .bg-warning,
    .btn-info,
    .btn-warning {
        color: #515151;
    }

    .list-group-item {
        cursor: pointer;
    }

    .icon {
        font-size: 22px;
        -webkit-text-stroke: .5px;
    }

    .line {
        background-color: #53B035;
        color: #ffffff;
        border: none;
    }

    .line:hover {
        background-color: #3A9F1A;
    }
</style>

<body>
    <div class="container-fluid" id="top">
        <div class="row">
        </div>
        <?php if ($data_rep != null) { ?>
            <hr id="17x" style="padding: 1rem;">
            <div class="row">
                <div class="div col-md">
                    <div class="card">
                        <div class="card-header bg-warning">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md text-start"><button type="submit" class="btn btn-success btn-sm"
                                            style="font-size: 20px;font-weight: 600;"
                                            onclick="tableToExcel('17', '<?php echo date('d-m-y') . ' 17:00 น.'; ?>')"><i
                                                class="bi bi-filetype-xls icon"></i> Excel</button></div>
                                    <div class="col-md text-end">
                                        <div class="card-title h4"><i class="bi bi-clock-fill"></i> 17:00 น. <i
                                                class="bi bi-calendar3"></i>
                                            <?php echo date('d/m/y', strtotime($date)); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="17">
                            <?php for ($i = 0; $i < count($data_lo); $i++) { ?>
                                <?php $lo = $data_lo[$i]->location_code; ?>
                                <?php if (count($data['t17'][$lo]) > 0) { ?>
                                    <table style="width: 100%;" class="table">
                                        <thead class="bg-warning">
                                            <tr>
                                                <th colspan="8"><i class="bi bi-pin-map-fill">
                                                        <?php echo $data_lo[$i]->description; ?>
                                                    </i> <i class="bi bi-calendar3"></i>
                                                    <?php echo date('d/m/y', strtotime($date)); ?>
                                                    <i class="bi bi-clock-fill"> 17:00 น. </i> <i class="bi bi-people-fill"
                                                        id="u_17_<?php echo $i; ?>"></i>
                                                </th>
                                                <th><button class="btn btn-success line btn-sm" style="width: 100%;"
                                                        onclick="line('<?php echo $data_lo[$i]->description; ?>','17:00','<?php echo $date; ?>')"><i
                                                            class="bi bi-line"></i> Line send </button></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 2%;">#</th>
                                                <th style="width: 8%;">Emp code</th>
                                                <th style="width: 5%;">Shop</th>
                                                <th style="width: 5%;">Dept.</th>
                                                <th style="width: 5%;">Shift</th>
                                                <th style="width: 20%;">Name</th>
                                                <th style="width: 30%;">Station</th>
                                                <th style="width: 15%;">Tel.</th>
                                                <th style="width: 10%;">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-warning">
                                            <?php for ($j = 0; $j < count($data['t17'][$lo]); $j++) { ?>
                                                <tr>
                                                    <th>
                                                        <?php echo $j + 1; ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $data['t17'][$lo][$j]->staff_code; ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $data['t17'][$lo][$j]->shop; ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $data['t17'][$lo][$j]->shop2; ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $data['t17'][$lo][$j]->shift; ?>
                                                    </th>
                                                    <td>
                                                        <?php echo $data['t17'][$lo][$j]->title . ' ' . $data['t17'][$lo][$j]->f_name . ' ' . $data['t17'][$lo][$j]->l_name . '(' . $data['t17'][$lo][$j]->nickname . ')'; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['t17'][$lo][$j]->station; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['t17'][$lo][$j]->phone; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($data['t17'][$lo][$j]->status != '') { ?>
                                                            <?php echo $data['t17'][$lo][$j]->status; ?>
                                                        <?php } else { ?>
                                                            <div style="font-size: 12px;">
                                                                <?php echo date('d/m/y H:i', strtotime($data['t17'][$lo][$j]->create_date_time)); ?>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <script>
                                                document.getElementById('u_17_<?php echo $i; ?>').innerHTML = ' <?php echo $j; ?> คน ';
                                            </script>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr id="20x" style="padding: 2rem;">
            <div class="row"></div>
            <div class="row">
                <div class="div col-md">
                    <div class="card" id="20">
                        <div class="card-header bg-dark text-white">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md text-start"><button type="submit" class="btn btn-success btn-sm"
                                            style="font-size: 20px;font-weight: 600;"
                                            onclick="tableToExcel('20', '<?php echo date('d-m-y') . ' 20:00 น.'; ?>')"><i
                                                class="bi bi-filetype-xls icon"></i> Excel</button></div>
                                    <div class="col-md text-end">
                                        <div class="card-title h4"><i class="bi bi-clock-fill"></i> 20:00 น. <i
                                                class="bi bi-calendar3"></i>
                                            <?php echo date('d/m/y', strtotime($date)); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php for ($i = 0; $i < count($data_lo); $i++) { ?>
                                <?php $lo = $data_lo[$i]->location_code; ?>
                                <?php if (count($data['t20'][$lo]) > 0) { ?>
                                    <table style="width: 100%;" class="table">
                                        <thead class="bg-dark text-white">
                                            <tr>
                                                <th colspan="8"><i class="bi bi-pin-map-fill">
                                                        <?php echo $data_lo[$i]->description; ?>
                                                    </i> <i class="bi bi-calendar3"></i>
                                                    <?php echo date('d/m/y', strtotime($date)); ?>
                                                    <i class="bi bi-clock-fill"> 20:00 น. </i> <i class="bi bi-people-fill"
                                                        id="u_20_<?php echo $i; ?>"></i>
                                                </th>
                                                <th><button class="btn btn-success line btn-sm" style="width: 100%;"
                                                        onclick="line('<?php echo $data_lo[$i]->description; ?>','20:00','<?php echo $date; ?>')"><i
                                                            class="bi bi-line"></i> Line send </button></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 2%;">#</th>
                                                <th style="width: 8%;">Emp code</th>
                                                <th style="width: 5%;">Shop</th>
                                                <th style="width: 5%;">Dept.</th>
                                                <th style="width: 5%;">Shift</th>
                                                <th style="width: 20%;">Name</th>
                                                <th style="width: 30%;">Station</th>
                                                <th style="width: 15%;">Tel.</th>
                                                <th style="width: 10%;">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-light">
                                            <?php for ($j = 0; $j < count($data['t20'][$lo]); $j++) { ?>
                                                <tr>
                                                    <th>
                                                        <?php echo $j + 1; ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $data['t20'][$lo][$j]->staff_code; ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $data['t20'][$lo][$j]->shop; ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $data['t20'][$lo][$j]->shop2; ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $data['t20'][$lo][$j]->shift; ?>
                                                    </th>
                                                    <td>
                                                        <?php echo $data['t20'][$lo][$j]->title . ' ' . $data['t20'][$lo][$j]->f_name . ' ' . $data['t20'][$lo][$j]->l_name . '(' . $data['t20'][$lo][$j]->nickname . ')'; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['t20'][$lo][$j]->station; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['t20'][$lo][$j]->phone; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($data['t20'][$lo][$j]->status != '') { ?>
                                                            <?php echo $data['t20'][$lo][$j]->status; ?>
                                                        <?php } else { ?>
                                                            <div style="font-size: 12px;">
                                                                <?php echo date('d/m/y H:i', strtotime($data['t20'][$lo][$j]->create_date_time)); ?>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <script>
                                                document.getElementById('u_20_<?php echo $i; ?>').innerHTML = ' <?php echo $j; ?> คน ';
                                            </script>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr id="05x" style="padding: 2rem;">
            <div class="row"></div>
            <div class="row">
                <div class="div col-md">
                    <div class="card" id="05">
                        <div class="card-header bg-primary text-white">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md text-start"><button type="submit" class="btn btn-success btn-sm"
                                            style="font-size: 20px;font-weight: 600;"
                                            onclick="tableToExcel('05', '<?php echo date('d-m-y') . ' 05:00 น.'; ?>')"><i
                                                class="bi bi-filetype-xls icon"></i> Excel</button></div>
                                    <div class="col-md text-end">
                                        <div class="card-title h4"><i class="bi bi-clock-fill"></i> 05:00 น. <i
                                                class="bi bi-calendar3"></i>
                                            <?php echo date('d/m/y', strtotime($date)); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php for ($i = 0; $i < count($data_lo); $i++) { ?>
                                <?php $lo = $data_lo[$i]->location_code; ?>
                                <?php if (count($data['t05'][$lo]) > 0) { ?>
                                    <table style="width: 100%;" class="table">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th colspan="8"><i class="bi bi-pin-map-fill">
                                                        <?php echo $data_lo[$i]->description; ?>
                                                    </i> <i class="bi bi-calendar3"></i>
                                                    <?php echo date('d/m/y', strtotime($date)); ?>
                                                    <i class="bi bi-clock-fill"> 05:00 น. </i> <i class="bi bi-people-fill"
                                                        id="u_05_<?php echo $i; ?>"></i>
                                                </th>
                                                <th><button class="btn btn-success line btn-sm" style="width: 100%;"
                                                        onclick="line('<?php echo $data_lo[$i]->description; ?>','05:00','<?php echo $date; ?>')"><i
                                                            class="bi bi-line"></i> Line send </button></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 2%;">#</th>
                                                <th style="width: 8%;">Emp code</th>
                                                <th style="width: 5%;">Shop</th>
                                                <th style="width: 5%;">Dept.</th>
                                                <th style="width: 5%;">Shift</th>
                                                <th style="width: 20%;">Name</th>
                                                <th style="width: 30%;">Station</th>
                                                <th style="width: 15%;">Tel.</th>
                                                <th style="width: 10%;">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-primary">
                                            <?php for ($j = 0; $j < count($data['t05'][$lo]); $j++) { ?>
                                                <tr>
                                                    <th>
                                                        <?php echo $j + 1; ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $data['t05'][$lo][$j]->staff_code; ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $data['t05'][$lo][$j]->shop; ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $data['t05'][$lo][$j]->shop2; ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $data['t05'][$lo][$j]->shift; ?>
                                                    </th>
                                                    <td>
                                                        <?php echo $data['t05'][$lo][$j]->title . ' ' . $data['t05'][$lo][$j]->f_name . ' ' . $data['t05'][$lo][$j]->l_name . '(' . $data['t05'][$lo][$j]->nickname . ')'; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['t05'][$lo][$j]->station; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['t05'][$lo][$j]->phone; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($data['t05'][$lo][$j]->status != '') { ?>
                                                            <?php echo $data['t05'][$lo][$j]->status; ?>
                                                        <?php } else { ?>
                                                            <div style="font-size: 12px;">
                                                                <?php echo date('d/m/y H:i', strtotime($data['t05'][$lo][$j]->create_date_time)); ?>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <script>
                                                document.getElementById('u_05_<?php echo $i; ?>').innerHTML = ' <?php echo $j; ?> คน ';
                                            </script>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr id="08x" style="padding: 2rem;">
            <div class="row"></div>
            <div class="row">
                <div class="div col-md">
                    <div class="card" id="08">
                        <div class="card-header bg-info">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md text-start"><button type="submit" class="btn btn-success btn-sm"
                                            style="font-size: 20px;font-weight: 600;"
                                            onclick="tableToExcel('08', '<?php echo date('d-m-y') . ' 08:00 น.'; ?>')"><i
                                                class="bi bi-filetype-xls icon"></i> Excel</button></div>
                                    <div class="col-md text-end">
                                        <div class="card-title h4"><i class="bi bi-clock-fill"></i> 08:00 น. <i
                                                class="bi bi-calendar3"></i>
                                            <?php echo date('d/m/y', strtotime($date)); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php for ($i = 0; $i < count($data_lo); $i++) { ?>
                                <?php $lo = $data_lo[$i]->location_code; ?>
                                <?php if (count($data['t08'][$lo]) > 0) { ?>
                                    <table style="width: 100%;" class="table">
                                        <thead class="bg-info">
                                            <tr>
                                                <th colspan="8"><i class="bi bi-pin-map-fill">
                                                        <?php echo $data_lo[$i]->description; ?>
                                                    </i> <i class="bi bi-calendar3"></i>
                                                    <?php echo date('d/m/y', strtotime($date)); ?>
                                                    <i class="bi bi-clock-fill"> 08:00 น. </i> <i class="bi bi-people-fill"
                                                        id="u_08_<?php echo $i; ?>"></i>
                                                </th>
                                                <th><button class="btn btn-success line btn-sm" style="width: 100%;"
                                                        onclick="line('<?php echo $data_lo[$i]->description; ?>','08:00','<?php echo $date; ?>')"><i
                                                            class="bi bi-line"></i> Line send </button></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 2%;">#</th>
                                                <th style="width: 8%;">Emp code</th>
                                                <th style="width: 5%;">Shop</th>
                                                <th style="width: 5%;">Dept.</th>
                                                <th style="width: 5%;">Shift</th>
                                                <th style="width: 20%;">Name</th>
                                                <th style="width: 30%;">Station</th>
                                                <th style="width: 15%;">Tel.</th>
                                                <th style="width: 10%;">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-info">
                                            <?php for ($j = 0; $j < count($data['t08'][$lo]); $j++) { ?>
                                                <tr>
                                                    <th>
                                                        <?php echo $j + 1; ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $data['t08'][$lo][$j]->staff_code; ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $data['t08'][$lo][$j]->shop; ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $data['t08'][$lo][$j]->shop2; ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $data['t08'][$lo][$j]->shift; ?>
                                                    </th>
                                                    <td>
                                                        <?php echo $data['t08'][$lo][$j]->title . ' ' . $data['t08'][$lo][$j]->f_name . ' ' . $data['t08'][$lo][$j]->l_name . '(' . $data['t08'][$lo][$j]->nickname . ')'; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['t08'][$lo][$j]->station; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['t08'][$lo][$j]->phone; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($data['t08'][$lo][$j]->status != '') { ?>
                                                            <?php echo $data['t08'][$lo][$j]->status; ?>
                                                        <?php } else { ?>
                                                            <div style="font-size: 12px;">
                                                                <?php echo date('d/m/y H:i', strtotime($data['t08'][$lo][$j]->create_date_time)); ?>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <script>
                                                document.getElementById('u_08_<?php echo $i; ?>').innerHTML = ' <?php echo $j; ?> คน ';
                                            </script>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div>

        <div class="container-fluid" style="position: fixed;top: 0%;left: 0%;background: #ffffff;top: 0%;">

            <div class="row">
                <div class="col-md-1 text-start">
                    <button class="btn" style="width: 100%;font-weight: 700;font-size: 24px;" data-bs-toggle="offcanvas"
                        href="#offcanvasExample" role="button" aria-controls="offcanvasExample">Menu</button>
                </div>
                <div class="col-md-2 p-0">
                    <form id="xxx" action="" method="post">
                        <input type="date" name="date" id="date" class="form-control" value="<?php echo $date; ?>"
                            onchange="$('#xxx').submit()" style="width: 100%;font-size: 24px;font-weight: 700;">
                    </form>
                </div>
                <div class="col-md-2 p-0"><a class="btn btn-warning" href="#17x"
                        style="width: 100%;font-weight: 700;font-size: 24px;"><i class="bi bi-clock-fill"></i> 17:00
                        น.</a></div>
                <div class="col-md-2 p-0"><a class="btn btn-dark" href="#20x"
                        style="width: 100%;font-weight: 700;font-size: 24px;"><i class="bi bi-clock-fill"></i> 20:00
                        น.</a></div>
                <div class="col-md-2 p-0"><a class="btn btn-primary" href="#05x"
                        style="width: 100%;font-weight: 700;font-size: 24px;"><i class="bi bi-clock-fill"></i> 05:00
                        น.</a></div>
                <div class="col-md-2 p-0"><a class="btn btn-info" href="#08x"
                        style="width: 100%;font-weight: 700;font-size: 24px;"><i class="bi bi-clock-fill"></i> 08:00
                        น.</a></div>
                <div class="col-md-1 p-0 text-end"><a class="btn btn-danger" href="#top"
                        style="font-weight: 700;font-size: 24px;"><i class="bi bi-arrow-up-square icon"></i></a></div>
            </div>
        </div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" style="cursor: pointer;font-weight: 900;" id="offcanvasExampleLabel"
                    onclick="location.replace('<?php echo site_url('Bus/'); ?>admin')">Home</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" style="font-weight: 700;">
                <ul class="list-group">
                    <!-- <li class="list-group-item active" aria-current="true">An active item</li> -->
                    <li class="list-group-item"
                        onclick="location.replace('http://172.28.1.23/app/bus3/index.php/Bus/new_staff')"><i
                            class="bi bi-person-plus-fill icon"></i> เพิ่มรายชื่อพนักงาน</li>
                    <li class="list-group-item"
                        onclick="location.replace('http://172.28.1.23/app/bus3/index.php/Bus/staff_by_lo')"><i
                            class="bi bi-person-lines-fill icon"></i> รายชื่อพนักงานในแต่ละสายรถ</li>
                    <li class="list-group-item"
                        onclick="location.replace('http://172.28.1.23/app/bus3/index.php/Bus/late')"><i
                            class="bi bi-alarm-fill icon"></i> ลงเวลาใช้รถช้า</li>
                    <li class="list-group-item"
                        onclick="location.replace('http://172.28.1.23/app/bus3/index.php/Bus/approved')"><i
                            class="bi bi-check2-square icon"></i> อนุมัติการขอย้ายสายรถ</li>
                    <li class="list-group-item bg-danger text-white"
                        onclick="location.replace('http://172.28.1.23/app/bus3/index.php/Bus/logout')"><i
                            class="bi bi-box-arrow-left icon"></i> Sign-Out</li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item active" aria-current="true"
                        onclick="location.replace('http://172.28.1.23/app/bus3/index.php/Bus/report')"><i
                            class="bi bi-clipboard2-minus icon"></i> Report</li>
                    <li class="list-group-item"
                        onclick="window.open('http://172.28.1.23/app/send_mail_v2.php?shift=day&date=<?php echo date('Y-m-d') ?>','_blank')">
                        <i class="bi bi-send-fill icon"></i> Mail Day Shift
                    </li>
                    <li class="list-group-item"
                        onclick="window.open('http://172.28.1.23/app/send_mail_v2.php?shift=night&date=<?php echo date('Y-m-d') ?>','_blank')">
                        <i class="bi bi-send-fill icon"></i> Mail Night Shift
                    </li>
                    <li class="list-group-item"
                        onclick="location.replace('http://172.28.1.23/app/bus3/index.php/Bus/mail_status')"><i
                            class="bi bi-archive icon"></i> Mail Status</li>
                </ul>
            </div>
        </div>
        <!-- <a href="#top" class="btn btn-info" style="position: fixed;bottom: 1%;right: 1%;font-size: 22px;"><i class="bi bi-arrow-up-square"></i></a> -->
</body>
<script type="text/javascript">
    var tableToExcel = (function () {
        var uri = 'data:application/vnd.ms-excel;base64,',
            template =
                '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
            base64 = function (s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            },
            format = function (s, c) {
                return s.replace(/{(\w+)}/g, function (m, p) {
                    return c[p];
                })
            }
        return function (table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {
                worksheet: name || 'Worksheet',
                table: table.innerHTML
            }
            window.location.href = uri + base64(format(template, ctx))
        }
    })()


    function line(lo, time, date) {
        // alert(lo+time+date);
        var myWindow = window.open("http://172.28.1.23/app/line_send.php?lo=" + lo + "&time=" + time + "&date=" + date,
            "_blank", "height=300,width=300");
    }
</script>

</html>