<?php
include_once "inc/header.php";

?>
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content center-align">
                    <span class="card-title">Kitchen Orders</span>
                    <p>These are the following orders.</p>
                </div>
                <div class="card-action center-align">
                    <table class="bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Burger</th>
                            <th>Ribs</th>
                            <th>Fries</th>
                            <th>Drink</th>
                            <th>Time</th>
                        </tr>
                        </thead>

                        <tbody id="data">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    let ajax = new XMLHttpRequest();

    ajax.open("GET", "orders.inc.php", true);

    ajax.send();

    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            let data = JSON.parse(this.responseText);
            console.log(data);
            let html = "";

            for (let i = 0; i < data.length; i++)
            {
                let tableNo = data[i].table_no;
                let burger = data[i].burger;
                let ribs = data[i].ribs;
                let fries = data[i].fries;
                let drink = data[i].drink;
                let time = data[i].time;

                html += `
                    <tr>
                        <td>${tableNo}</td>
                        <td>${burger}</td>
                        <td>${ribs}</td>
                        <td>${fries}</td>
                        <td>${drink}</td>
                        <td>${time}</td>
                    <tr/>
                `;
            }

            const table = document.querySelector("#data");
            table.innerHTML = html;
        }
    }
</script>
<?php include_once "inc/footer.php" ?>

