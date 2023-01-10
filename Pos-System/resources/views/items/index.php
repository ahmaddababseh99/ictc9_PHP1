    <!-- This page index items -->
    <h1 class="d-flex justify-content-around">Items List (<?= $data->item_count ?>)</h1>

    <div class="row my-5">

        <?php foreach ($data->items as $item) : ?>
            <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="card w-100" id="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <?= $item->item_name ?>
                        </h5>
                        <img src="./resources/views/uploads/<?= $item->photo ?>" style="height: 250px;width:250px;" class="card-img-top" alt="none">


                        <div class="d-flex justify-content-center align-items-center">
                            <a href="./item?id=<?= $item->id ?>" class="btn btn-primary">Check Items</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        

    </div>