

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
                        <form action="" method="post">
                            <div class="form-group row">
                            <input type="hidden" name="id" value="<?= $r['id']; ?>">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="role" name="role" value="<?= $r['role']; ?>">
                                </div>
                            </div>
                    <div class="form-group row justify-content-end mr-6">
                        <div class="col-sm-10">
                            <a href="<?= base_url('admin/role'); ?>" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
                </form>
                    </div>

                    
                </div>
                <!-- /.container-fluid -->

            </div>