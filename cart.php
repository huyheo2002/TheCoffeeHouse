<?php
    
?>

<!-- cart -->
<div class="btn__cart-wrap">
<!-- href="./ajax/debug-cart.php" -->
    <a class="btn__cart" id="btnCart">                
        <i class="fa-solid fa-cart-shopping" id="cart__logo"></i>
    </a>
    <!-- jquery -->
    <script>
        $(document).ready(function () {
            $("#btnCart").click(function() {
                showCart();
            });
        });
    </script>
    <div class="cart__badge" id="cart__badge">
        <i class="fa-solid fa-star">
            <p class="count">1</p>
        </i>
    </div>
</div>

<div class="cart__sidebar">
    <div class="cart__sidebar-overlay">
        <header class="cart__title">
            <h3 class="cart__title-text">Thông báo</h3>
            <div class="cart__btnClose">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </header>
        <ul class="cart__list" id="cart__list">
            <li><a href="">
                <div class="cart__imgWrap">
                    <img src="./assets/img/menu/BM1.jpg" alt="">
                </div>
                <div class="cart__info">
                    <h4 class="cart__info-title">hi</h4>
                    <p class="cart__info-value">124.000đ</p>
                </div>
            </a></li>
        </ul>

        <footer class="cart__footer">
            <div class="cart__footer-btnReset" id="btnResetCart">Reset</div>
            <div class="cart__footer-btnBuy">Thanh toán</div>
        </footer>

        <!-- jquery -->
        <script>
            $(document).ready(function () {
                $("#btnResetCart").click(function() {
                    resetCart();
                });
            });
        </script>
    </div>
</div>
<script>
    
</script>