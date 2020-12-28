<div class="container">
    <div class="row mt-5">
        <div class="col-md-2">
            <h5 class="font-weight-bold" style="color: #707070;">Dashboard</h5>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-md d-flex justify-content-end">
            <button type="button" id="showAddModal" class="btn text-white font-weight-bold" style="background-color:#96C575;" data-toggle="modal" data-target="#formModal">Tambah</button>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg">
            <div class="card">
                <table class="table table-hover">
                    <thead class="primary-color" style="background-color: #F9FAFB;">
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Pokemon Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Ability</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="primary-color">
                        <?php foreach ($pokemons as $pokemon) : ?>
                            <tr>
                                <td><img src="<?= base_url('assets/') ?>img/pokemon/<?= $pokemon['image'] ?>" alt="Pokemon Image" class="rounded-circle border" width="45px"></td>
                                <td class="align-middle"><?= $pokemon['pname'] ?></td>
                                <td class="align-middle"><?= $pokemon['cname'] ?></td>
                                <td class="align-middle"><?= $pokemon['aname'] ?></td>
                                <td class="align-middle">
                                    <a href="<?= base_url('admin/edit/') . $pokemon['pokemon_id'] ?>" class="badge badge-warning showEditModal mr-1" data-toggle="modal" data-target="#formModal" data-id="<?= $pokemon['pokemon_id']; ?>">Edit</a>
                                    <a href="<?= base_url('admin/delete/') . $pokemon['pokemon_id'] ?>" class="badge badge-danger showDeleteModal" data-toggle="modal" data-target="#deleteModal" data-id="<?= $pokemon['pokemon_id']; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <?= $this->pagination->create_links(); ?>

            <!-- <nav class="mt-4">
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
            </nav> -->
        </div>
    </div>
</div>

<!-- Create and Update Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Pokemon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('admin'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" id="pokemon_id" name="pokemon_id">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="name">Pokemon Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter pokemon name">
                        </div>
                        <div class="form-group col-sm">
                            <label for="type">Type</label>
                            <select id="type" class="selectpicker" data-width="100%" data-live-search="true" name="type[]" multiple>
                                <?php foreach ($types as $type) : ?>
                                    <option value="<?= $type['id'] ?>"><?= $type['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="category">Category</label>
                            <select id="category" name="category" class="form-control">
                                <option selected>Choose...</option>
                                <?php foreach ($p_categories as $category) : ?>
                                    <option value="<?= $category['category_id']; ?>"><?= $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-sm">
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
                        <div class="form-group col-sm-4">
                            <label for="bgcolor">Background Color</label>
                            <input type="color" class="form-control" id="bgcolor" name="bgcolor" style="width: 20%;">
                        </div>
                        <div class="form-group col-sm">
                            <label for="image">Picture</label>
                            <input type="file" class="form-control-file" id="image" name="image">
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
<!-- End of Create and Update Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Delete Pokemon?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a type="submit" id="delete" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>