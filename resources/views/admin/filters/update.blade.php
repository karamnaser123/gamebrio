                                        <!-- Edit User Modal for this product -->
                                        <div class="modal fade" id="editUserModal-{{ $filter->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="editUserModalLabel-{{ $filter->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="editUserModalLabel-{{ $filter->id }}">Edit Filter
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Edit User Form -->
                                                        <form id="editProductForm-{{ $filter->id }}"
                                                            action="{{ route('admin.filter.update', ['filter' => $filter->id]) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="form-group">
                                                                <label for="editphone-{{ $filter->name }}">Name
                                                                    English</label>
                                                                <input type="text" class="form-control"
                                                                    id="editphone-{{ $filter->name }}" name="name"
                                                                    value="{{ $filter->name }}">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editphone-{{ $filter->data_filter }}">Data
                                                                    Filter English</label>
                                                                <input type="text" class="form-control"
                                                                    id="editphone-{{ $filter->data_filter }}"
                                                                    name="data_filter"
                                                                    value="{{ $filter->data_filter }}">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editphone-{{ $filter->namear }}">Name
                                                                    Arabic</label>
                                                                <input type="text" class="form-control"
                                                                    id="editphone-{{ $filter->namear }}" name="namear"
                                                                    value="{{ $filter->namear }}">

                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="editphone-{{ $filter->data_filter_ar }}">Data
                                                                    Filter Arabic</label>
                                                                <input type="text" class="form-control"
                                                                    id="editphone-{{ $filter->data_filter_ar }}"
                                                                    name="data_filter_ar"
                                                                    value="{{ $filter->data_filter_ar }}">

                                                            </div>

                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="document.getElementById('editProductForm-{{ $filter->id }}').submit()">
                                                            Save Changes
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
