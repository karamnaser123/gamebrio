<!-- Create Product Modal -->
<div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="createProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProductModalLabel">Create Games</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Create Product Form -->
                <form id="createProductForm" action="{{ route('admin.games.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Name Games</label>
                        <select class="form-control" name="namegames" style="padding-right: 30px">
                            @foreach (App\Models\products::orderBy('id')->get() as $games)
                                <option value="{{ $games->id }}">
                                    {{ $games->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Account
                        </label>
                        <input type="text" class="form-control" value="{{ old('account') }}" name="account">

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
