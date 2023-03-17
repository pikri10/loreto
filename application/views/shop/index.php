

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <a href="<?= base_url('shop/cart') ?>" class="btn btn-primary mb-3">Order Here</a>
                    <div class="row">
                      <div class="col-lg-6">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($item as $item) : ?>
                                <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $item['name']; ?></td>
                                <td>Rp. <?= $item['price']; ?></td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                        </div>
                    </div>

                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->