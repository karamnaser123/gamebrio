                                        <!-- Edit User Modal for this product -->
                                        <div class="modal fade" id="editUserModal-{{ $typegame->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="editUserModalLabel-{{ $typegame->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="editUserModalLabel-{{ $typegame->id }}">Edit TypeGame
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Edit User Form -->
                                                        <form id="editProductForm-{{ $typegame->id }}"
                                                            action="{{ route('admin.typegames.update', ['typegames' => $typegame->id]) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="form-group">
                                                                <label for="editphone-{{ $typegame->name }}">Name
                                                                    English</label>
                                                                <input type="text" class="form-control"
                                                                    id="editphone-{{ $typegame->name }}" name="name"
                                                                    value="{{ $typegame->name }}">
                                                                <div class="form-group">
                                                                    <label for="editphone-{{ $typegame->namear }}">Name
                                                                        Arabic</label>
                                                                    <input type="text" class="form-control"
                                                                        id="editphone-{{ $typegame->namear }}"
                                                                        name="namear" value="{{ $typegame->namear }}">

                                                                </div>

                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="document.getElementById('editProductForm-{{ $typegame->id }}').submit()">
                                                            Save Changes
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
