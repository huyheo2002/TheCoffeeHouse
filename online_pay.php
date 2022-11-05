<?php
require_once "./classes/DB.php";

// kiểm tra session đã bắt đầu chưa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$tien_ship = 20000;
$TongTien = (int)$_SESSION['price'] + $tien_ship;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="format-detection" content="telephone=no">
    <title>
        Qu&#233;t m&#227; qua ứng dụng Ng&#226;n h&#224;ng/ V&#237; điện tử
    </title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://sandbox.vnpayment.vn/paymentv2/Styles/vendors/bootstrap/bootstrap.bundles.css">
    <!-- end bootstrap -->
    <!-- select2 -->
    <link rel="stylesheet" href="https://sandbox.vnpayment.vn/paymentv2/Styles/vendors/select2/select2.bundles.css">
    <!-- end select2 -->
    <link href="https://sandbox.vnpayment.vn/paymentv2/Styles/vendors/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <!-- css use for this page only -->
    <!-- end css use for this page only -->
    <!-- css use for this page only -->
    <!-- end css use for this page only -->
    <link rel="stylesheet" href="https://sandbox.vnpayment.vn/paymentv2/Styles/style.css">
    <link rel="stylesheet" href="https://sandbox.vnpayment.vn/paymentv2/Styles/custom.bundles.css">
    <link rel="shortcut icon" type="text/html" href="https://sandbox.vnpayment.vn/paymentv2/images/favicon/favicon.png">
</head>


<body onunload="">

    <div class="main main-layout-lg layout-bills">
        <!-- _custom.header -->
        <div class="header-desktop show-desktop">
            <div class="row row-16 align-items-center justify-content-between">
                <div class="col-auto">
                    <!-- button.button -->
                    <a href="./pay.php" class="ubg-transparent ubox-size-button-default ubg-hover ubg-active ubtn" id="backButton">
                        <div class="ubtn-inner">
                            <span class="ubtn-ic ubtn-ic-left">
                                <img src="https://sandbox.vnpayment.vn/paymentv2/images/icons-color/default/default/24x24-chevronleft.svg" alt="" class="ic-default">
                            </span>
                            <span class="ubtn-text">Quay lại</span>
                        </div>
                    </a>
                    <!-- end button.button -->
                </div>
                <div class="col-auto block-right">
                    <div class="title h4">
                        
                        <!-- end button.button -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end _custom.header -->

        <div class="main-wrap">
            <div class="main-inner main-inner-page">
                <div class="box box-main">
                    <!-- _custom.headerMobile -->

                    <div class="box__header header-box header-box-simple">
                        <div class="box__header-inner">
                            <div class="section">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-auto header-box-top">
                                        <div class="row align-items-center justify-content-md-center">
                                            <div class="col-auto show-mobile">
                                                <!-- button.button -->
                                                <a href="/paymentv2/Transaction/GoBack.html?token=c4e70d7cd3564f2e883059054f17d39f" class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn">
                                                    <div class="ubtn-inner">
                                                        <span class="ubtn-ic ubtn-ic-left">
                                                            <img src="https://sandbox.vnpayment.vn/paymentv2/images/icons-color/default/default/24x24-chevronleft.svg" alt="" class="ic-default">
                                                        </span>
                                                    </div>
                                                </a>
                                                <!-- end button.button -->
                                            </div>
                                            <div class="col-md-auto col logo-group-wrap w-100">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-md-auto col">
                                                        <div class="logo d-block">
                                                            <img src="https://sandbox.vnpayment.vn/paymentv2/Images/brands/logo.svg" alt="VNPAY">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-auto col">
                                                        <div class="logo d-block text-right">
                                                            <img src="https://sandbox.vnpayment.vn/paymentv2/images/merchant/vban.png" alt="Merchant Logo" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto show-mobile box-ic-holder-col">
                                                <div class="box-ic-holder"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md timer">
                                        <div class="timmer-inner">
                                            <div class="row row-12 align-items-center justify-content-md-end justify-content-between list-mb12 list-crop">
                                                <div class="col-md-auto col color-sub-default">
                                                    Giao dịch hết hạn sau
                                                </div>
                                                <div class="col-auto color-sub-default">
                                                    <div class="timer-clock fz-h3 weight5">
                                                        <div class="row row-4 align-items-center">
                                                            <div class="col-auto">
                                                                <div class="ubg-default ubox-size-ic-xs ubox-square ubox ubox-ic" id="minute">
                                                                    --
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">:</div>
                                                            <div class="col-auto">
                                                                <div class="ubg-default ubox-size-ic-xs ubox-square ubox ubox-ic" id="second">
                                                                    --
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end _custom.headerMobile -->
                    <div class="box__body ubg-white">
                        <div class="list-mb24">
                            <div class="layout-bills-inner box-section">
                                <div class="row list-mb24 list-crop">
                                    <div class="col-12 main-title-mobile show-mobile h3 text-center">
                                        Thanh to&#225;n qua ứng dụng Ng&#226;n h&#224;ng/ V&#237; điện tử
                                    </div>
                                    <div class="col-12 show-desktop">
                                        <div class="alert-box alert-box-warning ubg-sub-warning list-crop">
                                            <div class="alert-box-title">
                                                <div class="row row-8">
                                                    <div class="col-auto ic">
                                                        <img src="https://sandbox.vnpayment.vn/paymentv2/images/icons-color/warning/default/24x24-alert.svg" alt="" class="ic-default">
                                                    </div>
                                                    <div class="col title weight5">
                                                        Qu&#253; kh&#225;ch vui l&#242;ng kh&#244;ng tắt tr&#236;nh duyệt cho đến khi nhận được kết quả giao dịch tr&#234;n website. Xin cảm ơn!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 bills-col">
                                        <div class="bills">
                                            <div class="bills-header h2 show-desktop">
                                                Th&#244;ng tin đơn h&#224;ng
                                            </div>
                                            <div class="bills-header-mobile show-mobile list-mb12 list-last-mb" data-bs-toggle="collapse" data-bs-target="#accordionBill" aria-expanded="true" aria-controls="accordionBill">
                                                <div class="title weight5">
                                                    Thanh to&#225;n đơn h&#224;ng 108224
                                                </div>
                                                <div class="row color-primary align-items-center">
                                                    <div class="col h2">
                                                        <span id="totalAmountMb">10.020</span><sup>VND</sup>
                                                    </div>
                                                    <div class="col-auto">
                                                        <!-- button.button -->
                                                        <div class="ubg-transparent ubox-size-button-xs ubg-hover ubg-active ubtn">
                                                            <div class="ubtn-inner">
                                                                <span class="ubtn-text color-primary">
                                                                    Xem chi tiết
                                                                </span>
                                                                <span class="ubtn-ic ubtn-ic-right">
                                                                    <img src="/paymentv2/Images/icons-color/primary/default/24x24-chevrondown.svg" alt="" class="ic-default">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- end button.button -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bills-body accordion-collapse collapse" id="accordionBill">
                                                <div>
                                                    <div class="bills-list list-mb24 list-last-mb">
                                                        <div class="bills-list-item show-desktop">
                                                            <div class="row">
                                                                <div class="col-md-12 col-5 mb4">
                                                                    <div class="sub-title color-sub-default">
                                                                        Số tiền thanh to&#225;n
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col">
                                                                    <div class="title text-left-md-right color-primary h2">
                                                                        <span id="totalAmountDt"><?php echo $TongTien; ?></span><sup>VND</sup>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="bills-list-item">
                                                            <div class="row">
                                                                <div class="col-md-12 col-5 mb4">
                                                                    <div class="sub-title color-sub-default">
                                                                        Gi&#225; trị đơn h&#224;ng
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col">
                                                                    <div class="title text-left-md-right h3">
                                                                        <?php echo $_SESSION['price']; ?><sup>VND</sup>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="bills-list-item">
                                                            <div class="row">
                                                                <div class="col-md-12 col-5 mb4">
                                                                    <div class="sub-title color-sub-default">
                                                                        Ph&#237; giao dịch
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col">
                                                                    <div class="title text-left-md-right h3">
                                                                        20000<sup>VND</sup>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="bills-list-item" id="discountAmountItem" style="display:none">
                                                            <div class="row">
                                                                <div class="col-md-12 col-5 mb4">
                                                                    <div class="sub-title color-sub-default">
                                                                        lbl_promotion
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col">
                                                                    <div class="title text-left-md-right h3">
                                                                        <span id="discountAmount">0</span><sup>VND</sup>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="bills-list-item show-desktop">
                                                            <div class="row">
                                                                <div class="col-md-12 col-5 mb4">
                                                                    <div class="sub-title color-sub-default">
                                                                        M&#227; đơn h&#224;ng
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col">
                                                                    <div class="title text-left-md-right h3">
                                                                        108224
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="bills-list-item">
                                                            <div class="row">
                                                                <div class="col-md-12 col-5 mb4">
                                                                    <div class="sub-title color-sub-default">
                                                                        Nh&#224; cung cấp
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col">
                                                                    <div class="title text-left-md-right h3">
                                                                        TheCoffeeHouse
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md right-bill-col">
                                        <div class="right-bill-col-inner">
                                            <div class="main-title h2 text-center show-desktop mb24">
                                                Qu&#233;t m&#227; qua ứng dụng Ng&#226;n h&#224;ng/ V&#237; điện tử
                                            </div>
                                            <div class="qr-section">
                                                <div class="qr-section-inner list-mb24 list-last-mb">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalHuongDan" class="link weight5 link-style-default show-desktop">
                                                        <img src="/paymentv2/images/icons-color/info/default/24x24-information-circle.svg" alt="" class='ic-default'>
                                                        Hướng dẫn thanh toán
                                                    </a>
                                                    <div class="qr qr-size-default" data-bs-toggle="modal" data-bs-target="#modalQR">
                                                        <div class="qr-inner" style="background-image: url('https://sandbox.vnpayment.vn/images/img/mics/qr-frame.svg')">
                                                            <img class="qrcodeimg-modal" src="data:image/png;base64,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" alt="QR CODE">
                                                        </div>
                                                    </div>
                                                    <div class="section show-mobile">
                                                        <a href="/paymentv2/Transaction/DownloadQR.html" class="link weight5 link-style-default">
                                                            <img src="/paymentv2/images/icons-color/info/default/24x24-download.svg" alt="" class='ic-default'>

                                                            Tải m&#227; thanh to&#225;n
                                                        </a>
                                                    </div>
                                                    <div class="list-bank-mobile w-100 show-mobile">
                                                        <div class="list-mb16 list-last-mb">
                                                            <div class="p weight5">
                                                                Sử dụng
                                                                <a data-bs-toggle="modal" data-bs-target="#modalDanhSachUngDung" class="link link-underline weight5"> Ứng dụng hỗ trợ
                                                                </a>
                                                                để quét mã hoặc
                                                                <b> nhấn vào logo
                                                                </b>
                                                                để thanh toán trực tiếp trên ứng dụng
                                                                <a data-bs-toggle="modal" data-bs-target="#modalHuongDanMobile" class="link link-underline weight5">
                                                                    <img src="/paymentv2/images/icons-color/info/default/24x24-question-circle.svg" alt="" class="ic-md">
                                                                </a>
                                                            </div>

                                                            <!-- modal.modal -->
                                                            <div class="modal fade" id="modalQR" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-size-default modal-dialog-scrollable" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <div class="modal-wrap">
                                                                                <div class="row row-16 modal-title-wrap">
                                                                                    <div class="col-12 text-center">
                                                                                        <h2 class="modal-title h2">
                                                                                            Qu&#233;t m&#227; thanh to&#225;n

                                                                                        </h2>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- button.button -->
                                                                                <a data-bs-dismiss="modal" class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn modal-close-btn">
                                                                                    <div class="ubtn-inner">
                                                                                    </div>
                                                                                </a>
                                                                                <!-- end button.button -->
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="list-mb24 list-crop text-center row justify-content-center">
                                                                                <div class="col-12">
                                                                                    <div class="qr qr-size-lg">
                                                                                        <div class="qr-inner" style="background-image: url('../../../../images/img/mics/qr-frame.svg')">
                                                                                            <img class="qrcodeimg-modal" src="data:image/png;base64,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" alt="QR CODE">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="bills bills-simple">
                                                                                        <div class="text-center">
                                                                                            <div class="sub-title weight5 mb4">
                                                                                                Số tiền thanh to&#225;n
                                                                                            </div>
                                                                                            <div class="title color-primary h2">
                                                                                                10.020<sup>VND</sup>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-auto show-desktop">
                                                                                    <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalHuongDan" class="link weight5 link-style-default">
                                                                                        <img src="/paymentv2/images/icons-color/info/default/24x24-information-circle.svg" alt="" class='ic-default'>
                                                                                        Hướng dẫn thanh toán
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-12 show-mobile">
                                                                                    <!-- button.button -->
                                                                                    <a href="/paymentv2/Transaction/DownloadQR.html" class="ubg-sub-primary ubox-size-button-default ubg-hover ubg-active ubtn">
                                                                                        <div class="ubtn-inner">
                                                                                            <span class="ubtn-ic ubtn-ic-left">
                                                                                                <img src="/paymentv2/images/icons-color/primary/default/24x24-download.svg" alt="" class="ic-default">
                                                                                            </span>
                                                                                            <span class="ubtn-text">Tải m&#227; thanh to&#225;n</span>
                                                                                        </div>
                                                                                    </a>
                                                                                    <!-- end button.button -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end modal.modal -->
                                                            <!-- modal.modal -->

                                                            <div class="modal fade" id="modalHuongDan" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-size-md modal-dialog-scrollable" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <div class="modal-wrap">
                                                                                <div class="row row-16 modal-title-wrap show-mobile">
                                                                                    <div class="col-12 text-center">
                                                                                        <h2 class="modal-title h2">
                                                                                            Danh s&#225;ch ứng dụng hỗ trợ

                                                                                        </h2>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- button.button -->
                                                                                <a data-bs-dismiss="modal" class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn modal-close-btn">
                                                                                    <div class="ubtn-inner">
                                                                                    </div>
                                                                                </a>
                                                                                <!-- end button.button -->
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="modal-section show-desktop">
                                                                                <div class="guide">
                                                                                    <div class="guide-inner">
                                                                                        <div class="row row-52">
                                                                                            <div class="col-auto">
                                                                                                <div class="tab-content">
                                                                                                    <div class="tab-pane fade show active tabGuide1">
                                                                                                        <div class="guide-image">
                                                                                                            <img src="/paymentv2/images/img/guide/hd-1.png" alt="">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="tab-pane fade tabGuide2">
                                                                                                        <div class="guide-image">
                                                                                                            <img src="/paymentv2/images/img/guide/hd-2.png" alt="">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="tab-pane fade tabGuide3">
                                                                                                        <div class="guide-image">
                                                                                                            <img src="/paymentv2/images/img/guide/hd-3.png" alt="">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col">
                                                                                                <div class="h2 mb32">Hướng dẫn thanh toán</div>
                                                                                                <!-- tab.tab -->
                                                                                                <div class="nav-wrap">
                                                                                                    <nav class="nav nav-style-guide tabs-vertical tabs-progress nav-full">
                                                                                                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target=".tabGuide1">
                                                                                                            <div class="guide-content color-default">
                                                                                                                <div class="row row-16">
                                                                                                                    <div class="col-auto">
                                                                                                                        <div class="guide-title-number">
                                                                                                                            <div class="guide-title-number-inner h3">1</div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col">
                                                                                                                        <div class="guide-title h3 mb2">
                                                                                                                            <div class="guide-title-inner">
                                                                                                                                Qu&#233;t m&#227; QR

                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="guide-sub-title">
                                                                                                                            Đăng nhập ứng dụng Mobile Banking, chọn chức năng QRPay và quét mã QR
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </a>
                                                                                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target=".tabGuide2">
                                                                                                            <div class="guide-content color-default">
                                                                                                                <div class="row row-16">
                                                                                                                    <div class="col-auto">
                                                                                                                        <div class="guide-title-number">
                                                                                                                            <div class="guide-title-number-inner h3">2</div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col">
                                                                                                                        <div class="guide-title h3 mb2">
                                                                                                                            <div class="guide-title-inner">
                                                                                                                                Kiểm tra đơn h&#224;ng

                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="guide-sub-title">
                                                                                                                            Kiểm tra thông tin đơn hàng và lựa chọn tài khoản thanh toán để tiếp tục
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </a>
                                                                                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target=".tabGuide3">
                                                                                                            <div class="guide-content color-default">
                                                                                                                <div class="row row-16">
                                                                                                                    <div class="col-auto">
                                                                                                                        <div class="guide-title-number">
                                                                                                                            <div class="guide-title-number-inner h3">3</div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col">
                                                                                                                        <div class="guide-title h3 mb2">
                                                                                                                            <div class="guide-title-inner">
                                                                                                                                X&#225;c nhận giao dịch

                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="guide-sub-title">
                                                                                                                            Xác nhận thanh toán và hoàn tất giao dịch
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </a>
                                                                                                    </nav>
                                                                                                </div>
                                                                                                <!-- end tab.tab -->
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-section">
                                                                                <div class="list-mb24 list-last-mb">
                                                                                    <div class="row">
                                                                                        <div class="col-md-8 show-desktop">
                                                                                            <div class="h2">
                                                                                                Danh s&#225;ch ứng dụng hỗ trợ

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <!-- form.input -->
                                                                                            <div class="form-group">
                                                                                                <div class="input-group-wrap input-default input-size-default input-group-vertical">
                                                                                                    <label class="input-inner-wrap">
                                                                                                        <input type="text" class="input input-label-change input-has-clear" placeholder="T&#236;m kiếm..." autocorrect="off" id="searchAppSupportQR">
                                                                                                        <div class="input-extend input-extend-left">
                                                                                                            <div class="input-box input-ic">
                                                                                                                <img src="/paymentv2/images/icons-color/default2/default/24x24-search.svg" alt="" class="ic-default">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="input-extend input-extend-right">
                                                                                                            <div class="input-box input-ic-clear"></div>
                                                                                                        </div>
                                                                                                        <div class="input-frame"></div>
                                                                                                    </label>
                                                                                                </div>
                                                                                                <div class="errorBlock"></div>
                                                                                            </div>
                                                                                            <!-- end form.input -->
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="app-list">
                                                                                        <div class="row list-mb16 list-crop row-16">
                                                                                            <div class="col-md-6 list-app-qr" search-value="vcb mobile-b@anking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/VIETCOMBANK.png" alt="VCB Mobile-B@anking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        VCB Mobile-B@anking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 3.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 3.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="agribank e-mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/AGRIBANK.png" alt="Agribank E-Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        Agribank E-Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 2.2.12</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.0.12</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="bidv smart banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/BIDV.png" alt="BIDV Smart Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        BIDV Smart Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.1.5</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 2.5.2</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="vietinbank ipay">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/VIETINBANK.png" alt="VietinBank IPay">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        VietinBank IPay
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 4.0.4</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 4.0.4</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="vnpay e-wallet">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/VNPAYEWALLET.png" alt="VNPAY E-Wallet">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        VNPAY E-Wallet
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.0.1</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.0.1</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="vietcombank pay">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/VCBPAY.png" alt="VietcomBank Pay">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        VietcomBank Pay
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="scb mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/SCB.png" alt="SCB Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        SCB Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 3.0.1</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 3.0.1</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="abbank mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/ABBANK.png" alt="ABBANK Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        ABBANK Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 2.0.2</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 2.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="seabank smartbanking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/SEABANK.png" alt="Seabank SmartBanking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        Seabank SmartBanking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.0.3</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.0.7</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="ivb mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/IVB.png" alt="IVB Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        IVB Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 2.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 2.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="vietbank digital">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/VIETBANK.png" alt="Vietbank Digital">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        Vietbank Digital
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.0.4</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.0.4</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="eximbank mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/EXIMBANK.png" alt="Eximbank Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        Eximbank Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 2.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 2.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="eximbank omni">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/EXIMBANKOMNI.png" alt="Eximbank OMNI">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        Eximbank OMNI
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: #</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: #</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="oceanbank mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/OJB.png" alt="OceanBank Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        OceanBank Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.0.3</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.2</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="namabank mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/NAMABANK.png" alt="NamABank Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        NamABank Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 2.0.4</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 3.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="baoviet smart">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/BAOVIETBANK.png" alt="BAOVIET Smart">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        BAOVIET Smart
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.0.2</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.0.1</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="hdbank mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/HDBANK.png" alt="HDBank Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        HDBank Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 2.8</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 2.4</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="saigonbank smartbanking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/SAIGONBANK.png" alt="SAIGONBANK SmartBanking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        SAIGONBANK SmartBanking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="kienlongbank mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/KIENLONGBANK.png" alt="Kienlongbank Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        Kienlongbank Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="bidc mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/BIDC.png" alt="BIDC Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        BIDC Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.1.1</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.0.7</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="vietabank mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/VIETABANK.png" alt="VietABank Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        VietABank Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 3.0.9</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 3.0-11</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="msbmobile">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/MSBANK.png" alt="msbmobile">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        msbmobile
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 4.0.8</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 4.2.2</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="shb mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/SHB.png" alt="SHB Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        SHB Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 3.0.7</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 3.0.7</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="vib mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/VIB.png" alt="VIB Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        VIB Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 8.1.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 8.1.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="tpbank quickpay">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/TPBANK.png" alt="TPBANK QuickPay">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        TPBANK QuickPay
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.7</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.7</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="mbbank mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/MBBANK.png" alt="MBBANK Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        MBBANK Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 3.6</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.6</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="bacabank mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/BACABANK.png" alt="BacABank Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        BacABank Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.0.4</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 2.0.4</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="acb mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/ACB.png" alt="ACB Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        ACB Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 2.4.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 2.4.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="ocb mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/OCB.png" alt="OCB Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        OCB Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 10.01.2019</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 10.01.2019</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="wooribank mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/WOORIBANK.png" alt="WOORIBANK Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        WOORIBANK Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.5.3</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.4.25</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="pvcombank mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/PVCOMBANK.png" alt="PVCOMBANK Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        PVCOMBANK Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 2.5</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 2.5</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="vietcapital mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/VIETCAPITALBANK.png" alt="VietCapital Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        VietCapital Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 2.40</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 2.94</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="shinhan bank vietnam sol">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/SHINHANBANK.png" alt="Shinhan Bank Vietnam SOL">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        Shinhan Bank Vietnam SOL
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 2.1.8</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 2.2.2</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="vbsp mobile banking">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/VBSP.png" alt="VBSP Mobile Banking">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        VBSP Mobile Banking
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="coopbank">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/COOPBANK.png" alt="CoopBank">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        CoopBank
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="public bank vietnam">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/VIDBANK.png" alt="Public Bank Vietnam">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        Public Bank Vietnam
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.0.2</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.0.2</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="vnptpay e-wallet">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/VNPTPAY.png" alt="VNPTPAY E-wallet">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        VNPTPAY E-wallet
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.5.6</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="vinid e-wallet">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/VINID.png" alt="VINID E-wallet">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        VINID E-wallet
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 3.4.2</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 3.4.2</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="galaxypay e-wallet">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/GALAXYPAY.png" alt="GALAXYPAY E-wallet">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        GALAXYPAY E-wallet
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="vimass e-wallet">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/VIMASS.png" alt="VIMASS E-wallet">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        VIMASS E-wallet
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 4.0.5</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 2.0.14</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="v&#237; ting">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/VITING.png" alt="V&#237; Ting">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        V&#237; Ting
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 0.0.68</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 0.0.68</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="truemoney e-wallet">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/1PAY.png" alt="TrueMoney E-wallet">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        TrueMoney E-wallet
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 3.4.2</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 3.4.2</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="9pay">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/9PAY.png" alt="9PAY">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        9PAY
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 3.5.0+368</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 3.5.0+368</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="appota">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/APPOTAPAY.png" alt="Appota">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        Appota
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 4.9.13</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 4.9.13</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="v&#237; việt">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/VIVIET.png" alt="V&#237; Việt">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        V&#237; Việt
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 2.7.7</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 2.7.7</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="vi dien tu yolo">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/YOLO.png" alt="Vi dien tu YOLO">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        Vi dien tu YOLO
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 1.5.6</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 1.0.0</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="v&#237; điện tử vtcpay">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/VTCPAY.png" alt="V&#237; điện tử VTCPay">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        V&#237; điện tử VTCPay
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 9.22.29</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 4.3.56</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 list-app-qr" search-value="v&#237; mobiphonepay">
                                                                                                <div class="app-list-item">
                                                                                                    <div class="app-list-item-inner">
                                                                                                        <div class="row row-12">
                                                                                                            <div class="col-auto">
                                                                                                                <div class="icon">
                                                                                                                    <img src="/paymentv2/images/img/logos/app/MOBIPHONEPAY.png" alt="V&#237; MOBIPHONEPAY">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col content">
                                                                                                                <div class="list-mb8 list-last-mb">
                                                                                                                    <div class="title weight5">
                                                                                                                        V&#237; MOBIPHONEPAY
                                                                                                                    </div>
                                                                                                                    <div class="app-os fz-h5">
                                                                                                                        <div class="row row-16">
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item ios">
                                                                                                                                    <div class="app-os-title">iOS: 4.0.8</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col">
                                                                                                                                <div class="app-os-item android">
                                                                                                                                    <div class="app-os-title">Android: 4.2.2</div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- modal.modal -->
                                                            <div class="modal fade modal-full-height" id="modalHuongDanMobile" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-size-md modal-dialog-scrollable" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <div class="modal-wrap">
                                                                                <div class="row row-16 modal-title-wrap">
                                                                                    <div class="col-12 text-center">
                                                                                        <h2 class="modal-title h2">
                                                                                            Hướng dẫn thanh to&#225;n

                                                                                        </h2>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- button.button -->
                                                                                <a data-bs-dismiss="modal" class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn modal-close-btn">
                                                                                    <div class="ubtn-inner">
                                                                                    </div>
                                                                                </a>
                                                                                <!-- end button.button -->
                                                                                <div class="mt16">
                                                                                    <!-- tab.tab -->
                                                                                    <div class="nav-wrap">
                                                                                        <nav class="nav nav-style-pills nav-fill">
                                                                                            <a class="nav-link active" data-bs-toggle="tab" data-bs-target=".tabGuideMobile1">
                                                                                                Qua quét mã VNPAY<sup>QR</sup>
                                                                                            </a>
                                                                                            <a class="nav-link" data-bs-toggle="tab" data-bs-target=".tabGuideMobile2">
                                                                                                Qua ứng dụng hỗ trợ VNPAY<sup>QR</sup>
                                                                                            </a>
                                                                                        </nav>
                                                                                    </div>
                                                                                    <!-- end tab.tab -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end modal.modal -->



                                                            <footer class="footer main-footer show-desktop">
                                                                <div class="footer-inner text-center">
                                                                    Phát triển bởi VNPAY &copy; 2022
                                                                </div>
                                                            </footer>
                                                        </div>
                                                        <div class="chat-box show-desktop">
                                                            <div class="chat-box-icon">
                                                                <a href="https://zalo.me/4134983655549474109" target="_blank">
                                                                    <img src="/paymentv2/images/img/logos/zalo.svg" alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!-- _custom.footerMobile -->
                                                        <div class="footer_mobile show-mobile">
                                                            <div class="footer_mobile-inner">
                                                                <div class="row row-32 align-items-center">
                                                                    <div class="col">
                                                                        <div class="inline-block">
                                                                            <!-- button.button -->
                                                                            <a class="ubg-ghost ubox-size-button-sm ubg-hover ubg-active ubtn" href="/paymentv2/VnPayQR/Transaction/Index.html?token=c4e70d7cd3564f2e883059054f17d39f&amp;vnp_Locale=en-US">
                                                                                <div class="ubtn-inner">
                                                                                    <span class="ubtn-ic ubtn-ic-left">
                                                                                        <img src="/paymentv2/images/img/flags/en.svg" alt="" class="ic-xl">
                                                                                    </span>
                                                                                    <span class="ubtn-text">En</span>
                                                                                </div>
                                                                            </a>
                                                                            <!-- end button.button -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <div class="row row-0">
                                                                            <div class="col-auto">
                                                                                <!-- button.button -->
                                                                                <a href="https://zalo.me/4134983655549474109" class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn">
                                                                                    <div class="ubtn-inner">
                                                                                        <span class="ubtn-ic ubtn-ic-left">
                                                                                            <img src="/paymentv2/images/img/logos/zalo.svg" alt="" class="ic-default">
                                                                                        </span>
                                                                                    </div>
                                                                                </a>
                                                                                <!-- end button.button -->
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <!-- button.button -->
                                                                                <a href="tel:1900555577" class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn">
                                                                                    <div class="ubtn-inner">
                                                                                        <span class="ubtn-ic ubtn-ic-left">
                                                                                            <img src="/paymentv2/images/icons-color/default/default/24x24-phone.svg" alt="" class="ic-default">
                                                                                        </span>
                                                                                    </div>
                                                                                </a>
                                                                                <!-- end button.button -->
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <!-- button.button -->
                                                                                <a href="mailto:hotro@vnpay.vn" class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn">
                                                                                    <div class="ubtn-inner">
                                                                                        <span class="ubtn-ic ubtn-ic-left">
                                                                                            <img src="/paymentv2/images/icons-color/default/default/24x24-email.svg" alt="" class="ic-default">
                                                                                        </span>
                                                                                    </div>
                                                                                </a>
                                                                                <!-- end button.button -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end _custom.footerMobile -->
                                                        <!-- modal.modalAlert -->
                                                        <!-- modal.modal -->
                                                        <div class="modal fade text-center" id="modalCancelPayment" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-size-alert-default modal-dialog-scrollable modal-alert" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <div class="modal-wrap">
                                                                            <div class="row row-16 modal-title-wrap">
                                                                                <div class="col-12 text-center">
                                                                                    <h2 class="modal-title h2">
                                                                                        Hủy thanh to&#225;n
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-body color-sub-default fz-h3">
                                                                        Qu&#253; kh&#225;ch c&#243; chắc chắn muốn hủy thanh to&#225;n giao dịch n&#224;y?
                                                                    </div>
                                                                    <div class="modal-footer justify-content-center">
                                                                        <!-- button.btnGroup -->
                                                                        <div class="ubtn-group list-mb16 list-crop row row-16 justify-content-center group-col-md-3 group-col-fill">
                                                                            <div class="group-col-item">
                                                                                <!-- button.button -->
                                                                                <a data-bs-dismiss="modal" class="ubg-secondary ubox-size-button-default ubg-hover ubg-active ubtn">
                                                                                    <div class="ubtn-inner">
                                                                                        <span class="ubtn-text">Đ&#243;ng</span>
                                                                                    </div>
                                                                                </a>
                                                                                <!-- end button.button -->
                                                                            </div>
                                                                            <div class="group-col-item">
                                                                                <!-- button.button -->
                                                                                <a data-bs-dismiss="modal" href="#" class="ubg-danger ubox-size-button-default ubg-hover ubg-active ubtn" onclick="cancelConfirm()">
                                                                                    <div class="ubtn-inner">
                                                                                        <span class="ubtn-text">X&#225;c nhận hủy</span>
                                                                                    </div>
                                                                                </a>
                                                                                <!-- end button.button -->
                                                                            </div>
                                                                        </div>
                                                                        <!-- end button.btnGroup -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end modal.modal -->
                                                        <!-- end modal.modalAlert -->
                                                        <!-- modal.modalAlert -->
                                                        <!-- modal.modal -->
                                                        <div class="modal fade text-center" id="modalNotifySupportQR" role="dialog" aria-labelledby="modalNotifySupportQR" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-size-alert-default modal-dialog-scrollable modal-alert" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body color-sub-default fz-h3" id="messageNotify">
                                                                        Qu&#253; kh&#225;ch c&#243; chắc chắn muốn hủy thanh to&#225;n giao dịch n&#224;y?
                                                                    </div>
                                                                    <div class="modal-footer justify-content-center">
                                                                        <!-- button.btnGroup -->
                                                                        <div class="ubtn-group list-mb16 list-crop row row-16 justify-content-center group-col-md-3 group-col-fill">
                                                                            <div class="group-col-item">
                                                                                <!-- button.button -->
                                                                                <a data-bs-dismiss="modal" class="ubg-secondary ubox-size-button-default ubg-hover ubg-active ubtn">
                                                                                    <div class="ubtn-inner">
                                                                                        <span class="ubtn-text">Đ&#243;ng</span>
                                                                                    </div>
                                                                                </a>
                                                                                <!-- end button.button -->
                                                                            </div>
                                                                        </div>
                                                                        <!-- end button.btnGroup -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end modal.modal -->
                                                        <!-- end modal.modalAlert -->
                                                        <!-- modal.modalAlert -->
                                                        <!-- modal.modal -->
                                                        <div class="modal fade text-center" id="modalNotifyOpenNewTab" role="dialog" aria-labelledby="modalNotifyOpenNewTab" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-size-alert-default modal-dialog-scrollable modal-alert" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body color-sub-default fz-h3">
                                                                        Qu&#253; kh&#225;ch đang thực hiện giao dịch ở 1 m&#224;n h&#236;nh kh&#225;c. Qu&#253; kh&#225;ch vui l&#242;ng chỉ thực hiện giao dịch tr&#234;n 1 m&#224;n h&#236;nh. Tr&#226;n trọng cảm ơn Qu&#253; kh&#225;ch v&#224; xin lỗi v&#236; sự bất tiện n&#224;y.
                                                                    </div>
                                                                    <div class="modal-footer justify-content-center">
                                                                        <!-- button.btnGroup -->
                                                                        <div class="ubtn-group list-mb16 list-crop row row-16 justify-content-center group-col-md-3 group-col-fill">
                                                                            <div class="group-col-item">
                                                                                <!-- button.button -->
                                                                                <a href="#" class="ubg-secondary ubox-size-button-default ubg-hover ubg-active ubtn" onclick="cancelConfirm()">
                                                                                    <div class="ubtn-inner">
                                                                                        <span class="ubtn-text">Đ&#243;ng</span>
                                                                                    </div>
                                                                                </a>
                                                                                <!-- end button.button -->
                                                                            </div>
                                                                        </div>
                                                                        <!-- end button.btnGroup -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end modal.modal -->
                                                        <!-- end modal.modalAlert -->
</body>
<!-- jquery -->
<script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/jquery/jquery.bundles.js"></script>
<script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/jquery/jquery.init.js"></script>
<!-- jquery -->
<!-- bootstrap -->
<script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/bootstrap/bootstrap.bundles.js"></script>
<script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/bootstrap/bootstrap.init.js"></script>
<!-- bootstrap -->
<!-- select2 -->
<script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/select2/select2.bundles.js"></script>
<script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/select2/select2.init.js"></script>
<!-- select2 -->
<!-- parsley -->
<script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/parsley/parsley.bundles.js"></script>
<script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/parsley/parsley.init.js"></script>
<!-- parsley -->
<!-- cleave -->
<script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/cleave/cleave.bundles.js"></script>
<script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/cleave/cleave.init.js"></script>
<!-- cleave -->
<!-- autosize -->
<script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/autosize/autosize.bundles.js"></script>
<script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/autosize/autosize.init.js"></script>
<script src="/paymentv2/Scripts/vendors/datetimepicker/moment.js"></script>
<script src="/paymentv2/Scripts/vendors/datetimepicker/bootstrap-datetimepicker.min.js"></script>
<!-- autosize -->
<!-- script use for this page only -->
<!-- end script for this page only -->
<script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/custom.min.js?rnd=976511110"></script>
<!-- script use for this page only -->
<!-- end script for this page only -->



<script>
    var errorUrl = 'https://sandbox.vnpayment.vn/paymentv2/Payment/Error.html?code=15';

    function cancelConfirm() {
        var x = this;
        var postData = {
            "btnCancel": "confirm"
        };
        var submitUrl = $(x).closest('form').attr("action");
        $(".loading").show();
        $.ajax({
            type: "POST",
            url: submitUrl,
            data: postData,
            dataType: 'JSON',
            success: function(data) {
                if (data.code === '00') {
                    //Check ifram container
                    if (self === top) {
                        //  location.href = data.url;
                        setTimeout(function() {
                            location.href = data.url;
                        }, 200);
                    } else {
                        //  window.top.location.href = data.url;
                        setTimeout(function() {
                            window.top.location.href = data.url;
                        }, 200);
                    }
                    return false;
                } else {
                    alert(data.message);
                }
            }
        });
        $(".loading").hide();
        return false;
    }
</script>

<script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/custom.min.js?rnd=976511110"></script>
<script type="text/javascript">
    $(function() {
        var notify = $.connection('/paymentv2/notify');
        notify.qs = {
            token: "c4e70d7cd3564f2e883059054f17d39f",
            xid: "1860430"
        };
        notify.received(function(data) {
            try {
                var msg = JSON.parse(data);
                switch (msg.msgtype) {
                    case "displayqr":
                        $("#qrCode").attr("src", msg.data);
                        $("#qrCode").show();
                        break;
                    case "confirm":
                        notify.stop();
                        top.location.href = msg.data;
                        break;
                }
            } catch (e) {
                if (window.console) {
                    window.console.log(e);
                }
            }
        });
        notify.reconnected(function() {
            try {
                notify.start();
                if (window.console) {
                    window.console.log("Reconnect to server");
                }
            } catch (e) {
                window.console.log("Reconnect to server exception: " + e);
            }
        });
        notify.disconnected(function() {
            window.console.log("Disconnected to server");
            setTimeout(function() {
                notify.start();
            }, 5000); // Restart connection after 5 seconds.
        });
        notify.start();

        notify.connectionSlow(function() {
            window.console.log("UserOfConnectionProblem");
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.0/html2canvas.min.js"></script>
<script type="text/javascript">
    var timer = 833;
    async function shareImage() {
        const canvas = await html2canvas(document.querySelector(".qrcode"));
        const dataUrl = canvas.toDataURL();
        let blob = await fetch(dataUrl).then(r => r.blob());
        var file = new File([blob], "picture.jpg", {
            type: 'image/jpeg'
        });
        var filesArray = [file];

        if (navigator.canShare && navigator.canShare({
                files: filesArray
            })) {
            navigator.share({
                    files: filesArray,
                    title: 'Pictures',
                    text: 'Our Pictures.',
                })
                .then(() => console.log('Share was successful.'))
                .catch((error) => console.log('Sharing failed', error));
        } else {
            console.log(`Your system doesn't support sharing files.`);
            alert(`Your system doesn't support sharing files.`);
        }
    }
    $('.nav-link').click(function() {
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
    });
</script>


</html>