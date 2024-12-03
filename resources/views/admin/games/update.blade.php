                                        <!-- Edit User Modal for this product -->
                                        <div class="modal fade" id="editUserModal-{{ $filter->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="editUserModalLabel-{{ $filter->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="editUserModalLabel-{{ $filter->id }}">Edit Games
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Edit User Form -->
                                                        <form id="editProductForm-{{ $filter->id }}"
                                                            action="{{ route('admin.games.update', ['games' => $filter->id]) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')


                                                            <div class="form-group">
                                                                <label>Name Games</label>
                                                                <select class="form-control" name="namegames"
                                                                    style="padding-right: 30px">
                                                                    @foreach (App\Models\products::orderBy('id')->get() as $games)
                                                                        <option value="{{ $games->id }} "
                                                                            {{ $filter->namegames == $games->id ? 'selected' : '' }}>

                                                                            {{ $games->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="editphone-{{ $filter->account }}">
                                                                    Account</label>
                                                                <input type="text" class="form-control"
                                                                    id="editphone-{{ $filter->account }}" name="account"
                                                                    value="{{ $filter->account }}">

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
