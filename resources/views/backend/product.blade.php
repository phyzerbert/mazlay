@extends('backend.layouts.dashboard')


@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i>&nbsp;Product Management</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-shopping-cart fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Product Management</a></li>
    </ul>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-header clearfix">
                    <button class="btn btn-primary btn-sm float-right mb-2" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add New</button>
                </div>
                <div class="tile-body">
                    <table class="table table-hover table-bordered text-center" id="salesTable">
                        <thead>
                            <tr>
                                <th style="width:50px">No</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                {{-- <th>Quantity</th> --}}
                                <th>Sales</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="name" data-value="{{$item->name}}"><span>{{$item->name}}</span></td>
                                <td class="price" data-value="{{$item->price}}"><span>${{$item->price}}</span></td>
                                {{-- <td class="quantity" data-value="{{$item->quantity}}">{{$item->quantity}}</td> --}}
                                <td>{{$item->sales()->sum('quantity')}}</td>
                                <td class="action py-2">
                                    <button type="button" class="btn btn-primary btn-sm btn-edit" data-id="{{$item->id}}" data-value="{{$item->description}}"><i class="fa fa-edit"></i> Edit</button>
                                    <a href="{{route('product.delete', $item->id)}}" class="btn btn-danger btn-sm" onclick="return window.confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="text-center">No Data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="addModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('product.create')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control name" required />
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" step="0.01" class="form-control price" required />
                    </div>
                    {{-- <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" min="0" class="form-control quantity" required />
                    </div> --}}
                    <div class="form-group">
                        <label for="">Image</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="customFile" accept=".jpg, .png, .jpeg, .gif" required />
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Banner Image (This image should be PNG file.)</label>
                        <div class="custom-file">
                            <input type="file" name="image2" class="custom-file-input" id="customFile" accept=".png"
                                required />
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control description" rows="3" required required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-2">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('product.edit')}}" method="post" id="edit_form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" class="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control name" required />
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" step="0.01" class="form-control price" required />
                    </div>
                    {{-- <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" min="0" class="form-control quantity" required />
                    </div> --}}
                    <div class="form-group">
                        <label for="">Image</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="customFile" accept=".jpg, .png, .jpeg, .gif" />
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Banner Image (This image should be PNG file.)</label>
                        <div class="custom-file">
                            <input type="file" name="image2" class="custom-file-input" id="customFile" accept=".png" />
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control description" rows="3" required required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-2">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

            $(".btn-edit").click(function () {
                let id = $(this).data('id');
                let description = $(this).data('value');
                let name = $(this).parents('tr').find('.name').data('value');
                let price = $(this).parents('tr').find('.price').data('value');
                // let quantity = $(this).parents('tr').find('.quantity').data('value');

                $("#edit_form .id").val(id);
                $("#edit_form .name").val(name);
                $("#edit_form .price").val(price);
                // $("#edit_form .quantity").val(quantity);
                $("#edit_form .description").val(description);

                $("#editModal").modal();
            });
        });
    </script>
@endsection
