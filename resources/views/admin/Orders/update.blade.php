                                        <!-- Edit User Modal for this product -->
                                        <div class="modal fade" id="editUserModal-{{ $order->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="editUserModalLabel-{{ $order->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="editUserModalLabel-{{ $order->id }}">Edit Products
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Edit User Form -->
                                                        <form id="editProductForm-{{ $order->id }}"
                                                            action="{{ route('admin.orders.update', ['orders' => $order->id]) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')






                                                            <div class="form-group">
                                                                <label for="editphone-{{ $order->status }}">Status
                                                                    Order</label>
                                                                <select class="form-control" id="status"
                                                                    name="status">
                                                                    @foreach ($order_status as $order_statu)
                                                                        <option value="{{ $order_statu->id }}"
                                                                            {{ $order->status == $order_statu->id ? 'selected' : '' }}>
                                                                            {{ $order_statu->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>

                                                            </div>



                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="document.getElementById('editProductForm-{{ $order->id }}').submit()">
                                                            Save Changes
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
