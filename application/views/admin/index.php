<div class="container">
    <div class="row mt-5">
        <div class="col-md-2">
            <h5 class="font-weight-bold" style="color: #707070;">Dashboard</h5>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-md d-flex justify-content-end">
            <button type="button" class="btn text-white font-weight-bold" style="background-color:#96C575;" data-toggle="modal" data-target="#tambahModal">Tambah</button>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg">
            <div class="card">
                <table class="table table-hover">
                    <thead style="background-color: #F9FAFB;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav class="mt-4">
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Pokemon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('admin'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Pokemon Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter pokemon name">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="category">Category</label>
                            <select id="category" name="category" class="form-control">
                                <option selected>Choose...</option>
                                <?php foreach ($p_categories as $category) : ?>
                                    <option value="<?= $category['category_id']; ?>"><?= $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md">
                            <label for="ability">Abilities</label>
                            <select id="ability" name="ability" class="form-control">
                                <option selected>Choose...</option>
                                <?php foreach ($p_abilities as $ability) : ?>
                                    <option value="<?= $ability['ability_id']; ?>"><?= $ability['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description..."></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-2 mb-1">
                            Picture
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-3">
                                <img src=" <?= base_url('assets/') ?>img/pokemon/default.png" class="img-thumbnail">
                            </div>
                            <div class="form-group col-sm-9">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                    <input type="file" class="custom-file-input" id="image" name="image" />
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn font-weight-bold text-white" style="background-color: #96C575;">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>