<!-- Create Product Modal -->
<div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="createProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProductModalLabel">Create Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Create Product Form -->
                <form id="createProductForm" action="{{ route('admin.discount.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" class="form-control" value="{{ old('code') }}" name="code">

                    </div>
                    <div class="form-group">
                        <label>Discount Value</label>
                        <input type="number" class="form-control" value="{{ old('price') }}" name="price">

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"
                    onclick="document.getElementById('createProductForm').submit()">
                    Create Product
                </button>
            </div>
        </div>
    </div>
</div>
