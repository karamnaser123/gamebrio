                                        <!-- Edit User Modal for this product -->
                                        <div class="modal fade" id="editUserModal-{{ $users->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="editUserModalLabel-{{ $users->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="editUserModalLabel-{{ $users->id }}">Edit Filter
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Edit User Form -->
                                                        <form id="editProductForm-{{ $users->id }}"
                                                            action="{{ route('admin.users.update', ['users' => $users->id]) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="form-group">
                                                                <label for="editphone-{{ $users->name }}">Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="editphone-{{ $users->name }}" name="name"
                                                                    value="{{ $users->name }}">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editphone-{{ $users->email }}">Email
                                                                </label>
                                                                <input type="email" class="form-control"
                                                                    id="editphone-{{ $users->email }}" name="email"
                                                                    value="{{ $users->email }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="editphone-{{ $users->username }}">UserName</label>
                                                                <input type="text" class="form-control"
                                                                    id="editphone-{{ $users->username }}"
                                                                    name="username" value="{{ $users->username }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="editphone-{{ $users->phone }}">Phone</label>
                                                                <input type="number" class="form-control"
                                                                    id="editphone-{{ $users->phone }}" name="phone"
                                                                    value="{{ $users->phone }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="editphone-{{ $users->password }}">Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="editphone-{{ $users->password }}"
                                                                    name="password">
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="editphone-{{ $users->password_confirmation }}">Confirm
                                                                    Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="editphone-{{ $users->password_confirmation }}"
                                                                    name="password_confirmation">
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="editphone-{{ $users->type }}">UserType</label>
                                                                <div class="form-group">
                                                                    @php
                                                                        $usertype = DB::select('select * from usertype');
                                                                    @endphp
                                                                    <select class="form-control" id="type"
                                                                        name="usertype">
                                                                        @foreach ($usertype as $usertypes)
                                                                            <option value="{{ $usertypes->id }}"
                                                                                {{ $users->usertype == $usertypes->id ? 'selected' : '' }}>
                                                                                {{ $usertypes->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="document.getElementById('editProductForm-{{ $users->id }}').submit()">
                                                            Save Changes
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
