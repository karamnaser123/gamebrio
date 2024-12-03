                                        <!-- Edit User Modal for this product -->
                                        <div class="modal fade" id="editUserModal-{{ $product->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="editUserModalLabel-{{ $product->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="editUserModalLabel-{{ $product->id }}">Edit Products
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Edit User Form -->
                                                        <form id="editProductForm-{{ $product->id }}"
                                                            action="{{ route('admin.product.update', ['product' => $product->id]) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="form-group">
                                                                <label for="editphone-{{ $product->name }}">Name
                                                                    English</label>
                                                                <input type="text" class="form-control"
                                                                    id="editphone-{{ $product->name }}" name="name"
                                                                    value="{{ $product->name }}">

                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="editphone-{{ $product->description }}">Description
                                                                    English</label>
                                                                <textarea class="form-control" id="editphone-{{ $product->description }}" name="description">{{ $product->description }}</textarea>

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editphone-{{ $product->namear }}">Name
                                                                    Arabic</label>
                                                                <input type="text" class="form-control"
                                                                    id="editphone-{{ $product->namear }}"
                                                                    name="namear" value="{{ $product->namear }}">

                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="editphone-{{ $product->descriptionar }}">Description
                                                                    Arabic</label>
                                                                <textarea class="form-control" id="editphone-{{ $product->descriptionar }}" name="descriptionar">{{ $product->descriptionar }}</textarea>

                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="editphone-{{ $product->price }}">Price</label>
                                                                <input type="number" class="form-control"
                                                                    id="editphone-{{ $product->price }}" name="price"
                                                                    value="{{ $product->price }}">

                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="editphone-{{ $product->discount }}">Discount</label>
                                                                <input type="number" class="form-control"
                                                                    id="editphone-{{ $product->discount }}"
                                                                    name="discount" value="{{ $product->discount }}">

                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="editphone-{{ $product->quantity }}">Quantity</label>
                                                                <input type="number" class="form-control"
                                                                    id="editphone-{{ $product->quantity }}"
                                                                    name="quantity" value="{{ $product->quantity }}">

                                                            </div>




                                                            <div class="form-group">
                                                                <label
                                                                    for="editphone-{{ $product->type }}">Type</label>
                                                                <select class="form-control" id="type"
                                                                    name="type">
                                                                    @foreach (App\Models\typegames::orderBy('id')->get() as $type)
                                                                        <option value="{{ $type->id }}"
                                                                            {{ $product->type == $type->id ? 'selected' : '' }}>
                                                                            {{ $type->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label
                                                                    for="editphone-{{ $product->filter }}">Filter</label>
                                                                <select class="form-control" id="filter"
                                                                    name="filter">
                                                                    @foreach (App\Models\filter::orderBy('id')->get() as $filters)
                                                                        <option value="{{ $filters->id }}"
                                                                            {{ $product->filter == $filters->id ? 'selected' : '' }}>
                                                                            {{ $filters->data_filter }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="image">Image:</label>
                                                                <input type="file" id="image" name="image">
                                                            </div>


                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="updateProduct({{ $product->id }})">
                                                            Save Changes
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                                        <script>
                                            function updateProduct(productId) {
                                                var form = $('#editProductForm-' + productId);
                                                var formData = new FormData(form[0]);

                                                $.ajax({
                                                    type: 'POST',
                                                    url: form.attr('action'),
                                                    data: formData,
                                                    contentType: false,
                                                    processData: false,
                                                    success: function(response) {
                                                        // Check if the response has a 'success' property
                                                        var successMessage = '<div class="success-message">' + response
                                                            .success + '</div>';
                                                        form.after(successMessage);

                                                        setTimeout(function() {
                                                            $('.success-message').remove();
                                                        }, 3000);

                                                    },
                                                    error: function(xhr, textStatus, errorThrown) {
                                                        // Handle error, if needed
                                                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                                                            // Display validation errors
                                                            var errors = xhr.responseJSON.errors;
                                                            var errorMessages = '<div class="success-error">';

                                                            for (var field in errors) {
                                                                if (errors.hasOwnProperty(field)) {
                                                                    errorMessages += errors[field][0] + '<br>';
                                                                }
                                                            }

                                                            errorMessages += '</div>';
                                                            form.after(errorMessages);
                                                        } else {
                                                            // Display a generic error message
                                                            var errorMessage = '<div class="success-error">' + xhr.responseText + '</div>';
                                                            form.after(errorMessage);
                                                        }

                                                        setTimeout(function() {
                                                            $('.success-error').remove();
                                                        }, 3000);
                                                    }
                                                });
                                            }
                                        </script>
