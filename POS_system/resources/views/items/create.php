<!-- This page create items -->
<h1>New Items</h1>

<form action="/items/store" method="POST" class="w-50">
    <div class="mb-3">
        <label for="post-title" class="form-label">Item name</label>
        <input type="text" class="form-control" id="post-title" name="item_name">
    </div>
    <div class="mb-3">
        <label for="post-title" class="form-label"> Item cost</label>
        <input type="text" class="form-control" id="post-title" name="cost">
    </div>
    <div class="mb-3">
        <label for="post-title" class="form-label"> Item price</label>
        <input type="text" class="form-control" id="post-title" name="price">
    </div>
   
    <div class="mb-3">
        <label for="post-title" class="form-label"> Item Quantity</label>
        <input type="number" class="form-control" id="post-title" name="quantity">
    </div>
    <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo">
        <label class="input-group-text" for="inputGroupFile02"><span class="material-symbols-outlined">add_a_photo</span></label>
    </div>
    
    


    <button type="submit" class="btn btn-success mt-4">Create Item</button>
</form>