<!-- Create Product Modal -->
<div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="createProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProductModalLabel">Create Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Create Product Form -->
                <form id="createProductForm" action="{{ route('admin.product.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name English</label>
                        <input type="text" value="{{ old('name') }}" class="form-control" name="name">

                    </div>
                    <div class="form-group">
                        <label>Description English</label>
                        <textarea value="{{ old('description') }}" name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Name Arabic</label>
                        <input type="text" value="{{ old('namear') }}" class="form-control" name="namear">

                    </div>
                    <div class="form-group">
                        <label>Description Arabic</label>
                        <textarea value="{{ old('descriptionar') }}" name="descriptionar" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" value="{{ old('price') }}" class="form-control" name="price">

                    </div>
                    <div class="form-group">
                        <label>Discount</label>
                        <input type="number" value="{{ old('discount') }}" class="form-control" name="discount">
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" value="{{ old('quantity') }}" class="form-control" name="quantity">
                    </div>


                    <div class="form-group">
                        <label>Type</label>
                        <div class="form-group">
                            <select class="form-control" id="type" name="type">
                                @foreach (App\Models\typegames::orderBy('id')->get() as $type)
                                    <option value="{{ $type->id }}">
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Filter</label>
                        <select class="form-control" id="filter" name="filter">
                            @foreach (App\Models\filter::orderBy('id')->get() as $filters)
                                <option value="{{ $filters->id }}">
                                    {{ $filters->data_filter }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" value="{{ old('image') }}" id="image" name="image">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="createProduct()">
                    Create Product
                </button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function createProduct() {
        var form = $('#createProductForm');
        var formData = new FormData(form[0]);

        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var successMessage = '<div class="success-message">' + response.success + '</div>';
                form.after(successMessage);

                // Reset the form fields
                form[0].reset();

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
