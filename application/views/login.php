<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bus</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>
<style>
    a {
        text-decoration: none;
    }

    .login-page {
        width: 100%;
        height: 100vh;
        display: inline-block;
        display: flex;
        align-items: center;
    }

    .form-right i {
        font-size: 100px;
    }

    .bi {
        -webkit-text-stroke: 1px;
    }

    html {
        scroll-behavior: smooth;
    }

    .scroll::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #FFFFFF;
    }

    .scroll::-webkit-scrollbar {
        width: 0px;
        background-color: #FFFFFF;
    }

    .scroll::-webkit-scrollbar-thumb {
        background: rgb(255, 255, 255);
        background: -moz-linear-gradient(0deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%);
        background: -webkit-linear-gradient(0deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%);
        background: linear-gradient(0deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#FFFFFF", endColorstr="#FFFFFF", GradientType=1);
    }

    th {
        text-align: center;
    }
</style>

<body onload="startTime()">

    <div class="login-page bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <h3 class="mb-3">Login Now <span><i class="bi bi-info-circle" style="color: #FF3300;"
                                onclick="$('#alert').fadeToggle(200);"></i></span></h3>
                    <div class="bg-white shadow rounded">
                        <div class="row">
                            <div class="col-md-7 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <form action="<?php echo site_url('Bus/'); ?>login" method="post" class="row g-4">
                                        <div class="col-12">
                                            <label>Username<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text text-white"
                                                    style="background-color: #FF3300;font-size: 24px;"><i
                                                        class="bi bi-person-fill"></i>
                                                </div>
                                                <input type="text" class="form-control" name="user"
                                                    style="font-size: 24px;" placeholder="Enter Username">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label>Password<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text text-white"
                                                    style="background-color: #FF3300;font-size: 24px;"><i
                                                        class="bi bi-lock-fill"></i>
                                                </div>
                                                <input type="password" class="form-control" name="pass"
                                                    style="font-size: 24px;" placeholder="Enter Password">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" style="background-color: #FF3300;font-weight: 500;"
                                                class="btn px-4 float-end mt-4 text-white">login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 ps-0 d-none d-md-block">
                                <div class="form-right h-100 text-white text-center pt-5"
                                    style="background-color: #FF3300;">
                                    <!-- <i class="bi bi-bootstrap"></i> -->
                                    <img src="http://172.28.1.23/img/uvctlogo.gif" alt="" height="300">
                                    <h2 class="fs-1">Welcome</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <div style="position: fixed;top: 0;left: 0;height: 100vh;width: 100vw;background: linear-gradient(90deg, rgba(255,255,255,0.7) 0%, rgba(255,255,255,0.7) 100%);"
        class="container-fluid" id="alert">
        <div class="row">
            <div class="col-md-4 bg-dark" style="position: fixed;top: 30vh;left: 20vw;">
                <div class="row">
                    <div class="col-md-3 text-start p-1">
                        <h1 style="color: #FF3300;"><u>แจ้งเตือน</u></h1>
                    </div>
                    <div class="col text-end p-1">
                        <h3 style="color: #FFF;" id="time"><u>00:00:00</u></h3>
                    </div>
                </div>
                <p>
                <h4 style="color: #FFF;">เวลาระบบ ส่ง E-Mail ให้บริษัทจัดรถรับส่งพนักงานอัตโนมัติ</h4>
                </p>
                <p>
                <h4 style="color: #FFF;"><u>กะกลางวัน เวลา 14:00 น.</u></h4>
                </p>
                <p>
                <h4 style="color: #FFF;"><u>กะกลางคืน เวลา 21:00 น.</u></h4>
                </p>
                <p>
                <h4 style="color: #FFF;">
                    ขอให้พนักงานทุกท่าน ลงบันทึกการใช้รถรับส่งพนักงาน ก่อนเวลาที่ระบบจะทำการส่ง E-Mail
                </h4>
                </p>
                <div class="row">
                    <div class="col"></div>
                    <div class="col-md-4 bg-dark text-center" style="padding-bottom: 10px;">
                        <button class="btn text-white" style="background-color: #FF3300;font-weight: 700;"
                            onclick="$('#alert').fadeOut(200);">รับทราบ</button>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
            <div class="col bg-dark text-white scroll p-0"
                style="position: fixed;top: 30vh;right: 20vw;width: 500px;overflow-y: auto;">
                <table class="table-bordered text-white w-100">
                    <tr>
                        <th style="width: 40%;">สายรถ</th>
                        <th style="background-color: #FF3300;width: 9%;">กะ</th>
                        <th style="background-color: #FF3300;width: 9%;">A</th>
                        <th style="background-color: #FF3300;width: 9%;">B</th>
                        <th style="background-color: #FF3300;width: 9%;">C</th>
                        <th style="background-color: #FF3300;width: 12%;">A+C</th>
                        <th style="background-color: #FF3300;width: 12%;">B+C</th>
                    </tr>
                    <tr>
                        <td colspan="7" class="p-0">
                            <div class="p-0 scroll" style="height: 370px;overflow-y: auto;">
                                <table class="table-bordered text-white w-100">
                                    <?php foreach ($count_staff as $x) { ?>
                                        <tr>
                                            <th style="width: 40%;">
                                                <?php echo $x->description; ?>
                                            </th>
                                            <th style="width: 9%;"><i class="bi bi-person-fill" style="color: #FF3300;"></i>
                                            </th>
                                            <th style="width: 9%;">
                                                <?php echo $x->A; ?>
                                            </th>
                                            <th style="width: 9%;">
                                                <?php echo $x->B; ?>
                                            </th>
                                            <th style="width: 9%;">
                                                <?php echo $x->C; ?>
                                            </th>
                                            <th style="width: 12%;<?php if ($x->A + $x->C >= 12) {
                                                echo 'background-color: #FF3300;';
                                            } ?>">
                                                <?php echo $x->A + $x->C; ?>
                                            </th>
                                            <th style="width: 12%;<?php if ($x->B + $x->C >= 12) {
                                                echo 'background-color: #FF3300;';
                                            } ?>">
                                                <?php echo $x->B + $x->C; ?>
                                            </th>
                                        </tr>
                                        <?php ?>
                                        <?php ?>
                                    <?php } ?>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        var c = 0;
        h = checkTime(h);
        m = checkTime(m);
        s = checkTime(s);
        h = h.toString();
        m = m.toString();
        s = s.toString();
        var arH = h.split("");
        var arM = m.split("");
        var arS = s.split("");
        // alert(arH[0]);
        var currentDate = new Date();
        var dd = currentDate.getDate();
        var mm = currentDate.getMonth() + 1;
        var yy = currentDate.getFullYear();
        dd = checkTime(dd);
        mm = checkTime(mm);

        dd = dd.toString();
        mm = mm.toString();
        yy = yy.toString();
        var ardd = dd.split("");
        var armm = mm.split("");
        var aryy = yy.split("");

        dd = checkTime(dd);
        mm = checkTime(mm);
        var date = '<i class="bi bi-' + ardd[0] + '-square"></i><i class="bi bi-' + ardd[1] + '-square"> - ';
        date += '<i class="bi bi-' + armm[0] + '-square"></i><i class="bi bi-' + armm[1] + '-square"> - ';
        date += '<i class="bi bi-' + aryy[0] + '-square"></i><i class="bi bi-' + aryy[1] + '-square"><i class="bi bi-' + aryy[2] + '-square"><i class="bi bi-' + aryy[3] + '-square">';
        document.getElementById('time').innerHTML = date + '<br>' +'<i class="bi bi-' + arH[0] + '-square"></i><i class="bi bi-' + arH[1] + '-square"></i> : <i class="bi bi-' + arM[0] + '-square"></i><i class="bi bi-' + arM[1] + '-square"></i> : <i class="bi bi-' + arS[0] + '-square"></i><i class="bi bi-' + arS[1] + '-square"></i>';
        // document.getElementById('time').innerHTML = dd + '/' + mm + '/' + yy + ' ' + h + ':' + m + ':' + s;
        date = yy + '-' + mm + '-' + dd;

        var t = setTimeout(startTime, 1000);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }; // add zero in front of numbers < 10
        return i;
    }
    // startTime();
</script>

</html>