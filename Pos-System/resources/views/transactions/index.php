<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            background-image: url("resources/img/supermarket.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        table,
        td,
        th {
            border: 1px solid black;
            padding: 15px;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            text-align: center;
        }
    </style>

</head>

<body>
    <h1 class="text-center m-5">List Transaction</h1>
    <form id="Form" action="#" class="d-flex justify-content-around flex-row text-center w-75 m-auto border">
        <label for="choose">
            <div class="dropdown m-3">
                <label for="choose location">Please choose items</label>
                <select id="chooselocation" required>
                    <?php foreach ($data->item as $items) {
                        if($items->quantity >0){

                        
                    ?>
                        <option value="<?= $items->id ?>"><?= $items->item_name ?></option>
                    <?php
                    }else{
                        continue;
                    }
                    } ?>
                </select>
            </div>
        </label>
        <div class="m-3">
            <label for="number">Number items</label>
            <input id="numberItem" type="number" required min="1" required>
        </div>
        <div class="m-3">
            <button id="Sendbtn" class="btn btn-primary"><span class="material-symbols-outlined">add</span></button>
        </div>
    </form>




    <table id="tableItems" class="table w-75 m-auto table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Items</th>
                <th scope="col">Number</th>
                <th scope="col">action</th>

            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($data->data as $transaction) {
                foreach ($data->item as $items) {
                    if ($items->id == $transaction->item_id ) {
                    echo '<tr>';
                    echo '<td>' . $items->id . '</td>';
                    echo '<td>' . $items->item_name . '</td>';
                    echo '<td>' . $transaction->ItemQuantity . '</td>';
                    ?>
                   <td> <a href="/transaction/update?id=<?=$transaction->id?>" class="btn btn-success">edit</a>
                  <a href="/transaction/delete?id=<?=$transaction->id?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                    <?php
                      echo '</tr>';
                    }
                }
            }
            ?>
        </tbody>
    </table>
  









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script>
        /**
         * Sending data to the database using the API
         * 
         */

        $(document).ready(function() {

        $("#Sendbtn").click(function() {

        $.ajax({

        method: 'get',

        url: 'transactions/Store',

        data: {

            item_id: $('#chooselocation').val(),

            itemQuantity: $('#numberItem').val()

        },

        success: function(msg) {

          window.location.reload;

        }

    })

})

})
    </script>
</body>

</html>