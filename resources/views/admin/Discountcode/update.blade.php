                                        <!-- Edit User Modal for this product -->
                                        <div class="modal fade" id="editUserModal-{{ $discountcodes->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="editUserModalLabel-{{ $discountcodes->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="editUserModalLabel-{{ $discountcodes->id }}">Edit Filter
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Edit User Form -->
                                                        <form id="editProductForm-{{ $discountcodes->id }}"
                                                            action="{{ route('admin.discount.update', ['discount' => $discountcodes->id]) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="form-group">
                                                                <label
                                                                    for="editphone-{{ $discountcodes->code }}">Code</label>
                                                                <input type="text" class="form-control"
                                                                    id="editphone-{{ $discountcodes->code }}"
                                                                    name="code" value="{{ $discountcodes->code }}">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editphone-{{ $discountcodes->price }}">Price
                                                                    Discount</label>
                                                                <input type="number" class="form-control"
                                                                    id="editphone-{{ $discountcodes->price }}"
                                                                    name="price" value="{{ $discountcodes->price }}">

                                                            </div>

                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="document.getElementById('editProductForm-{{ $discountcodes->id }}').submit()">
                                                            Save Changes
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
