<div class="product-card m-3">
    <div class="logo-cart">
        <!--<img src="images/logo.jpg" alt="logo">-->
        <i class='bx bx-shopping-bag'></i>
    </div>
    <div class="main-images">
        <!--<img id="blue" class="blue active" src="images/blue.png" alt="blue">-->
        <!--<img id="pink" class="pink" src="images/pink.png" alt="blue">-->
        <!--<img id="yellow" class="yellow" src="images/yellow.png" alt="blue">-->
    </div>
    <div class="shoe-details">
        <span class="shoe_name">
            <?php
            echo $_POST['itemName'];
            ?>
        </span>
        <p>
            <?php
            echo $_POST['title'];
            ?>
        </p>
        <div class="stars">
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bx-star'></i>
        </div>
    </div>
    <div class="color-price">
        <div class="color-option">
            <span class="color">Colour:</span>
            <div class="circles">
                <span class="circle blue active" id="blue"></span>
                <span class="circle pink " id="pink"></span>
                <span class="circle yellow " id="yellow"></span>
            </div>
        </div>
        <div class="price">
            <span class="price_num">$09.00</span>
            <span class="price_letter">Nine dollar only</span>
        </div>
    </div>
    <div class="button">
        <div class="button-layer"></div>
        <button>Add To Cart</button>
    </div>
</div>