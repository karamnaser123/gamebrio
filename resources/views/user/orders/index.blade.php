<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/headlogo.png') }}">
    <title>GameBrio to sell Games</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .product-list {
            list-style: none;
            padding: 0;
        }

        .product-list li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .product-name {
            font-weight: bold;
            margin-right: 10px;
        }

        .product-image {
            max-width: 60px;
            max-height: 60px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }


        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-wrapper .btn {
            float: right;
            color: #333;
            background-color: #fff;
            border-radius: 3px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-wrapper .btn:hover {
            color: #333;
            background: #f2f2f2;
        }

        .table-wrapper .btn.btn-primary {
            color: #fff;
            background: #03A9F4;
        }

        .table-wrapper .btn.btn-primary:hover {
            background: #03a3e7;
        }

        .table-title .btn {
            font-size: 13px;
            border: none;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        .table-title {
            color: #fff;
            background: #4b5366;
            padding: 16px 25px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .show-entries select.form-control {
            width: 60px;
            margin: 0 5px;
        }

        .table-filter .filter-group {
            float: right;
            margin-left: 15px;
        }

        .table-filter input,
        .table-filter select {
            height: 34px;
            border-radius: 3px;
            border-color: #ddd;
            box-shadow: none;
        }

        .table-filter {
            padding: 5px 0 15px;
            border-bottom: 1px solid #e9e9e9;
            margin-bottom: 5px;
        }

        .table-filter .btn {
            height: 34px;
        }

        .table-filter label {
            font-weight: normal;
            margin-left: 10px;
        }

        .table-filter select,
        .table-filter input {
            display: inline-block;
            margin-left: 5px;
        }

        .table-filter input {
            width: 200px;
            display: inline-block;
        }

        .filter-group select.form-control {
            width: 110px;
        }

        .filter-icon {
            float: right;
            margin-top: 7px;
        }

        .filter-icon i {
            font-size: 18px;
            opacity: 0.7;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 80px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.view {
            width: 30px;
            height: 30px;
            color: #2196F3;
            border: 2px solid;
            border-radius: 30px;
            text-align: center;
        }

        table.table td a.view i {
            font-size: 22px;
            margin: 2px 0 0 1px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .status {
            font-size: 30px;
            margin: 2px 2px 0 0;
            display: inline-block;
            vertical-align: middle;
            line-height: 10px;
        }

        .text-success {
            color: #10c469;
        }

        .text-info {
            color: #62c9e8;
        }

        .text-warning {
            color: #FFC107;
        }

        .text-danger {
            color: #ff5b5b;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

@if (session('success'))
    <div class="success-message" id="successMessage">
        <span>{{ session('success') }}</span>
        <button class="close-button">Close</button>
    </div>
@endif
@if (session('error'))
    <div class="error-message" id="successMessage">
        <span>{{ session('error') }}</span>
        <button class="close-button">Close</button>
    </div>
@endif

@if ($errors->any())
    <div class="error-message" id="successMessage">
        <span>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </span>
        <button class="close-button">Close</button>
    </div>
@endif



<style>
    .success-message {
        position: fixed;
        bottom: 10px;
        left: 10px;
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border-radius: 5px;
        z-index: 999;
        opacity: 0;
        animation: slideIn 0.5s forwards;
    }

    .error-message {
        position: fixed;
        bottom: 10px;
        left: 10px;
        background-color: red;
        color: white;
        padding: 10px;
        border-radius: 5px;
        z-index: 999;
        opacity: 0;
        animation: slideIn 0.5s forwards;
    }

    .close-button {
        background: none;
        border: none;
        color: white;
        cursor: pointer;
        margin-left: 10px;
    }

    /* Define the opening animation */
    @keyframes slideIn {
        from {
            bottom: -50px;
            opacity: 0;
        }

        to {
            bottom: 10px;
            opacity: 1;
        }
    }
</style>
<script>
    const successMessage = document.getElementById('successMessage');
    const closeButton = successMessage.querySelector('.close-button');

    // Function to close the success message
    function closeSuccessMessage() {
        successMessage.style.animation = 'slideOut 0.5s';
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 10000); // Delay hiding for the duration of the slideOut animation
    }

    closeButton.addEventListener('click', closeSuccessMessage);

    // // Automatically close the message after a few seconds (optional)
    // setTimeout(closeSuccessMessage, 10000); // Close after 5 seconds (adjust as needed)
</script>


<body>

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">


                        <div class="col-sm-4">
                            <h2>{{ trans('messages.orderdetails') }}</h2>
                        </div>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/tableexport/5.2.0/js/tableexport.min.js"></script>

                        <div class="col-sm-8">
                            <a id="refreshButton" class="btn btn-primary"><i class="material-icons">&#xE863;</i>
                                <span>{{ trans('messages.refreshlist') }}</span></a>
                            <a id="export-pdf" onclick ="printPage()" class="btn btn-secondary"><i
                                    class="material-icons">&#xE24D;</i>
                                <span>{{ trans('messages.printpage') }}</span></a>
                            <a href="{{ route('home') }}" class="btn btn-secondary"><i class="material-icons"></i>
                                <span style="font-weight: bold">{{ trans('messages.home') }}</span></a>

                            <script>
                                function printPage() {
                                    window.print();
                                }
                                document.getElementById('refreshButton').addEventListener('click', function() {
                                    location.reload(); // This will refresh the page
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="table-filter">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="show-entries">
                                <div class="show-entries">
                                    <span>{{ trans('messages.show') }}</span>
                                    <select class="form-control" id="entries-select" style="width: 70px">
                                        <option value="0" @if ($orders->perPage() === 0) selected @endif>
                                            {{ trans('messages.showall') }}
                                        </option>
                                        <option value="1" @if ($orders->perPage() == 1) selected @endif>1
                                        </option>
                                        <option value="5" @if ($orders->perPage() == 5) selected @endif>5
                                        </option>
                                        <option value="10" @if ($orders->perPage() == 10) selected @endif>10
                                        </option>
                                        <option value="15" @if ($orders->perPage() == 15) selected @endif>15
                                        </option>
                                        <option value="20" @if ($orders->perPage() == 20) selected @endif>20
                                        </option>
                                    </select>
                                    <span>{{ trans('messages.entries') }}</span>
                                    <script>
                                        document.getElementById('entries-select').addEventListener('change', function() {
                                            var newPerPage = this.value;
                                            var url = '{{ route('my-orders', ['entries' => '__per_page__']) }}'.replace('__per_page__',
                                                newPerPage);
                                            window.location.href = url;
                                        });
                                    </script>

                                </div>

                            </div>

                        </div>
                        <div class="col-sm-9">
                            <form action="{{ route('my-orders') }}" method="GET">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>
                                    {{ trans('messages.searchnow') }}</button>
                                <div class="filter-group">
                                    {{-- <label>Order ID</label> --}}
                                    <input placeholder="{{ trans('messages.orderid') }}" type="text" name="name"
                                        class="form-control" value="{{ request('name') }}">
                                </div>
                            </form>
                            {{-- <div class="filter-group">
                                <label>Location</label>
                                <select class="form-control">
                                    <option>All</option>
                                    <option>Berlin</option>
                                    <option>London</option>
                                    <option>Madrid</option>
                                    <option>New York</option>
                                    <option>Paris</option>
                                </select>
                            </div> --}}
                            <div class="filter-group">
                                <label>{{ trans('messages.status') }}</label>
                                <select class="form-control" id="status-filter">
                                    <option value="">{{ trans('messages.any') }}</option>
                                    <option value="1" @if (request('status') == '1') selected @endif>
                                        {{ trans('messages.pending') }}
                                    </option>
                                    <option value="2" @if (request('status') == '2') selected @endif>
                                        {{ trans('messages.received') }}
                                    </option>
                                    <option value="3" @if (request('status') == '3') selected @endif>
                                        {{ trans('messages.delivery') }}
                                    </option>
                                    <option value="4" @if (request('status') == '4') selected @endif>
                                        {{ trans('messages.cancelled') }}
                                    </option>
                                </select>
                                <script>
                                    document.getElementById('status-filter').addEventListener('change', function() {
                                        var selectedStatus = this.value;
                                        var url = '{{ route('my-orders') }}';
                                        var params = {
                                            status: selectedStatus
                                        };
                                        url += '?' + $.param(params);
                                        window.location.href = url;
                                    });
                                </script>
                            </div>

                            <span class="filter-icon"><i class="fa fa-filter"></i></span>
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#{{ trans('messages.orderid') }}</th>
                            <th>{{ trans('messages.name') }}</th>
                            <th>{{ trans('messages.email') }}</th>
                            <th>{{ trans('messages.phone') }}</th>
                            <th>{{ trans('messages.note') }}</th>
                            <th>{{ trans('messages.status') }}</th>
                            <th>{{ trans('messages.thedateofpurchase') }}</th>
                            <th>{{ trans('messages.totalprice') }}</th>
                            <th>{{ trans('messages.addrating') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($orders) > 0)
                            @foreach ($orders as $order)
                                <tr>
                                    <td>#{{ $order->order_id }}</td>
                                    <td><a href="#"> {{ $userName }}</a></td>
                                    <td>{{ $order->informationOrder->email }}</td>
                                    <td>{{ $order->informationOrder->phone }}</td>
                                    <td>{{ $order->informationOrder->note }}</td>
                                    <td>
                                        @if ($order->status == 1)
                                            <span class="status text-warning">&bull;</span>
                                            {{ trans('messages.pending') }}
                                        @elseif ($order->status == 2)
                                            <span class="status text-info">&bull;</span>
                                            {{ trans('messages.received') }}
                                        @elseif ($order->status == 3)
                                            <span class="status text-success">&bull;</span>
                                            {{ trans('messages.delivery') }}
                                        @elseif ($order->status == 4)
                                            <span class="status text-danger">&bull;</span>
                                            {{ trans('messages.cancelled') }}
                                        @endif
                                    </td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>${{ $order->total_amount }}</td>
                                    <td>
                                        @if (!$order->hasReview())
                                            <button type="button" class="btn btn-primary add-rating"
                                                data-bs-toggle="modal" data-order-id="{{ $order->id }}"
                                                data-bs-target="#exampleModal">
                                                {{ trans('messages.addrating') }}
                                            </button>
                                        @else
                                            <p>{{ trans('messages.alreadyreviewed') }}</p>
                                        @endif
                                        <script>
                                            $(document).ready(function() {
                                                $('.add-rating').on('click', function() {
                                                    const orderID = $(this).data('order-id');
                                                    $('#order_id_input').val(orderID);
                                                });
                                            });
                                        </script>


                                    </td>
                                    <!-- Button trigger modal -->

                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                                        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
                                        < link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
                                        rel = "stylesheet"
                                        integrity = "sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                                        crossorigin = "anonymous" >
                                    </script>
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        {{ trans('messages.addrating') }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @include('user.orders.order-review')
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    {{-- <td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i
                                                class="material-icons">&#xE5C8;</i></a></td> --}}
                                </tr>
                                <tr>


                                    <td colspan="7">
                                        <ul class="product-list">
                                            @foreach ($order->products as $product)
                                                <li>
                                                    <span class="product-name">Product Name:
                                                        {{ $product->pivot->name }}

                                                    </span>
                                                    <span class="product-name">Product Quantity:
                                                        {{ $product->pivot->quantity }}</span>
                                                    <img class="product-image" style="width: 60px"
                                                        src="products/images/{{ $product->pivot->image }} "
                                                        alt="Product Image" loading="lazy">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">
                                    <p style="font-size: 30px">No orders found.</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                @if (count($orders) > 0)
                    <div class="text-right">
                        <strong>Total Amount: ${{ $totalOrdersPrice }}</strong>
                    </div>
                @endif

                {{-- <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">

                            </a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                        <li class="page-item active"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">6</a></li>
                        <li class="page-item"><a href="#" class="page-link">7</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
</body>

</html>
