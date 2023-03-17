

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-6">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">

                            <?= form_open_multipart('shop/cart'); ?>
                            
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Product</label>
                                <div class="col-sm-10">
                                <select class="form-control" name="name" id="name" onchange="totalPrice()">
                                <?php $i = 1; ?>
                                <?php foreach($item as $item) : ?>
                                    <?= $i; ?>
                                    <option value="<?= $item['name']; ?>, <?= $item['price']; ?>"><?= $item['name']; ?></option>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </select>
                            <input type="text" class="form-control" id="data1" name="data1" hidden>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                                <div class="col-sm-10">
                                <input type="number" class="form-control" id="quantity" name="quantity" onchange="totalPrice()">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="price" name="price" readonly>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end mr-6">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" id="submit">Order Now</button>
                        </div>
                    </div>
                </div>
                    </div>

                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <script>
function totalPrice() {
    let total = 0;
    // let harga = document.getElementById('name').value;
    var selectElement = document.getElementById("name");
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var values = selectedOption.value.split(",");

    var value1 = values[0];
    var value2 = values[1];

    let harga = value2;
    document.getElementById("data1").setAttribute('value', value1);

    let quantity = parseInt(document.getElementById('quantity').value);

    if (quantity >= 0) {
        total = harga * quantity;
        document.getElementById("price").setAttribute('value', total);
    }
}
// $('#submit').on('click', function() {
//     $('.name').empty().append('<?= $item['name']; ?>');
//   });
// function test(){
//     let id = document.getElementById('tes').value;
//     console.log(id);
// }
</script>
            <!-- End of Main Content -->
 