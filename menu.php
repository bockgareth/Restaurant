<?php
include_once "inc/header.php";

if (isset($_POST["submit"])) {

    include_once "dbh.inc.php";

    $table = $_POST["table"];
    $burger = $_POST["burger"];
    $ribs = $_POST["ribs"];
    $fries = $_POST["fries"];
    $drink = $_POST["drink"];
    $price = $_POST["price"];
    $time = $_POST["time"];
    $date = $_POST["date"];

    $sql = "INSERT INTO customer_orders (table_no, burger, ribs, fries, drink, price, time, date) 
            VALUES ($table, '$burger', '$ribs', '$fries', '$drink', '$price', '$time', '$date')";

    if (mysqli_query($conn, $sql)) {
        ?>
        <script type="text/javascript">
            alert("New record added")
        </script><?php
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}
?>
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content center-align">
                    <span class="card-title">Menu</span>
                    <p>Ready to place an order?</p>
                    <form action="menu.php" method="post">
                        <div class="row">
                            <div class="col s12">
                                <div class="input-field col s12">
                                    <input type="number" name="table" id="table">
                                    <label for="table">Table Number</label>
                                </div>
                                <div class="input-field col s12">
                                    <select id="burger" name="burger">
                                        <option value="/" disabled selected>Choose your option</option>
                                        <option value="beef">Beef R60</option>
                                        <option value="chicken">Chicken R50</option>
                                        <option value="vegan">Vegan R45</option>
                                        <option value=" ">Nothing</option>
                                    </select>
                                    <label>Burger</label>
                                </div>
                                <div class="input-field col s12">
                                    <select id="ribs" name="ribs">
                                        <option value="/" disabled selected>Choose your option</option>
                                        <option value="120g">120g R40</option>
                                        <option value="250g">250g R85</option>
                                        <option value=" ">Nothing</option>
                                    </select>
                                    <label>Ribs</label>
                                </div>
                                <div class="input-field col s12">
                                    <select id="fries" name="fries">
                                        <option value="/" disabled selected>Choose your option</option>
                                        <option value="small">Small R20</option>
                                        <option value="large">Large R30</option>
                                        <option value=" ">Nothing</option>
                                    </select>
                                    <label>Fries</label>
                                </div>
                                <div class="input-field col s12">
                                    <select id="drink" name="drink">
                                        <option value="/" disabled selected>Choose your option</option>
                                        <option value="coke">Coke R8</option>
                                        <option value="fanta">Fanta R8</option>
                                        <option value="sprite">Sprite R8</option>
                                        <option value=" ">Nothing</option>
                                    </select>
                                    <label>Drink</label>
                                </div>
                                <input type="hidden" name="time" value="<?php echo date("H:i:s") ?>">
                                <input type="hidden" name="date" value="<?php echo date("Y-m-d") ?>">
                                <input type="hidden" name="price" id="hidden-price">
                                <p>Total Price: R<span id="total">0</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <input type="button" onclick="totalPrice()" value="Calculate Price" class="waves-effect waves-light btn">
                        </div>
                        <div class="row">
                            <input type="submit" onclick="return submitForm()" id="submit" name="submit" value="Place Order" class="waves-effect waves-light btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    const total = document.querySelector("#total");
    const burger = document.querySelector("#burger");
    const ribs = document.querySelector("#ribs");
    const fries = document.querySelector("#fries");
    const drink = document.querySelector("#drink");
    const tableNo = document.querySelector("#table");
    const hiddenPrice = document.querySelector("#hidden-price");


    let price;
    function totalPrice() {
        price = 0;
        switch (burger.value) {
            case "beef":
                price += 60;
                break;
            case "chicken":
                price += 50;
                break;
            case "vegan":
                price += 45;
                break;
            case "nothing":
                price += 0;
                break;
        }

        switch (ribs.value) {
            case "120g":
                price += 40;
                break;
            case "250g":
                price += 85;
                break;
            case "nothing":
                price += 0;
                break;
        }

        switch (fries.value) {
            case "small":
                price += 20;
                break;
            case "large":
                price += 30;
                break;
            case "nothing":
                price += 0;
                break;
        }

        switch (drink.value) {
            case "coke":
                price += 8;
                break;
            case "fanta":
                price += 8;
                break;
            case "sprite":
                price += 8;
                break;
            case "nothing":
                price += 0;
                break;
        }

        total.innerText = price.toString();

        hiddenPrice.value = price;
    }

    function submitForm() {
        if (total.innerHTML === "0" || tableNo.value <= 0) {
            alert("Please re-enter form");
            return false;
        }
    }




</script>
<?php include_once "inc/footer.php" ?>
