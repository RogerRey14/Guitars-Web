<?php
unset($_SESSION['cart']['products'][$_SESSION['remove']]);
include __DIR__.'/shopping_cart.php';