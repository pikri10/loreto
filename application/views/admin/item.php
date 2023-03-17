

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    
                    <div class="row">
                      <div class="col-lg-6">
                          <?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>'); ?>

                          <?= $this->session->flashdata('message'); ?>

                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newItemModal">Add New Item</a>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($item as $item) : ?>
                                <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $item['name']; ?></td>
                                <td><?= $item['price']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>admin/item_edit/<?= $item['id']; ?>" class="badge badge-success">edit</a>
                                    <a href="<?= base_url(); ?>admin/item_delete/<?= $item['id'] ?>" class="badge badge-danger">delete</a>
                                </td>
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

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newItemModal" tabindex="-1" role="dialog" aria-labelledby="newItemModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newItemModalLabel">Add New Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/item'); ?>" method="post">
      <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Item name">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="price" name="price" placeholder="Price">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Modal -->