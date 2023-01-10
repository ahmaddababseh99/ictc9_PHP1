<!-- In this page can be should edit or delete items -->
<div class="mt-5 d-flex flex-row-reverse gap-3">
        <a href="/item/edit?id=<?= $data->item->id ?>" class="btn btn-warning">edit</a>
 
        <a href="/items/delete?id=<?= $data->item->id ?>" class="btn btn-danger">Delete</a>

</div>
<div class="my-5">
    <!-- for admins -->
    <h1 class="text-center">
     
    </h1>
     <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">ITem name : <?= $data->item->item_name ?></h6>
                    <h6 class="m-b-20">price <?= $data->item->price ?></h6>
                    <h6 class="m-b-20">cost <?= $data->item->cost ?></h6>
                    <h6 class="m-b-20"> quantity <?= $data->item->quantity ?></h6>
                   

                </div>
            </div>
        </div>
   
</div>