<!--In this page can be should edit or delete Transactions-->
<table class="table table-dark">
    <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                Item Name
            </th>
            <th>
                Item Quantity
            </th>
            <th>
                Price
            </th>
            <th>
                Totall Price
            </th>
            <th>
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
  $count=0;
        use Core\Controller\items;

        foreach ($data->data as $d) {
          
        ?>
            <tr>
                <td>
                    <?php echo $d['trans_id']; ?>
                </td>
                <td>
                    <?php echo $d['item_name']; ?>
                </td>
                <td>
                    <?php echo $d['ItemQuantity']; ?>
                </td>
                <td>
                    <?php echo $d['price']; ?>
                </td>
                <td>
                    <?php
                    $z= $d['ItemQuantity']*$d['price'].'$';
                    echo $z ?>
                </td>
                <td>
                    <a href="/transaction/delete?id=<?php echo $d['trans_id']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    <a href="/transaction/update?id=<?php echo $d['trans_id']; ?>" class="btn btn-success">edit</a>

                </td>
            </tr>
        <?php
            @$count+=$z; // This line return Total
        }
        
        ?>

    </tbody>
</table>
<h1 style="padding: 10px; color:white;background-color:black;display:inline;float: right;">
<?=  $count.'$' ?>

</h1>

