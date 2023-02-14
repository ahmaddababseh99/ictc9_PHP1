<style>
    body{
        background-image: url("../img/store.jpg");
        background-repeat: no-repeat;
        background-size: cover;    }
</style>
<body>
    <!--In this page can be should see all user, all items, all transactions and top five items expensive -->

<div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Users</h6>
                    <h2 class="text-right"><i class="fa fa-user f-left"></i><span>
                           <?php 
                           ?>
                           <?= $data->user ?>

                        </span></h2>

                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Items</h6>
                    <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span>
                           <?= $data->item ?>
                        </span></h2>

                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Transactions</h6>
                    <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span>
                    <?= $data->trans ?>

                        </span></h2>

                </div>
            </div>
        </div>
        
        <div class="container my-5">
            <h4 style="color:black ;text-align:center">
                Five Items Expensive
                <hr class="container">
            </h4>

        </div>
        <div class="card-content table-responsive">
            <table class="table table-dark">
                <thead class="text-primary">
                    <tr>
                        <th>Name</th>
                        <th>Quentity</th>
                        <th>price</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data->exp as $exps) :?>
                    <tr>
                        <td><?php echo $exps['item_name'];?></td>
                        <td><?php echo $exps['quantity'];?></td>
                        <td><?php echo $exps['price'];?></td>
                    </tr>
                    <?php endforeach;?>

                </tbody>
            </table>
        </div>
       
      
       
    </div>
</div>
</body>

