@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 card p-3">
            <h4 class="text-dark">Votre panier</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Quantité</th>
                        <th>prix</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td><img src="/storage/{{ $item->model->image }}" alt="{{ $item->name }}" class="img-fluid rounded" width="50" height="50"></td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <form action="{{ route('update.cart', $item->rowId)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group mb-3">
                                    <input type="number" name="qty" id="qty" value="{{ $item->qty }}" class="form-control" max="{{ $item->model->in_stock }}" min="1">
                                </div>
                                <div class="form-group mb-2">
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-edit"></i></button>
                                </div>
                            </form>
                        </td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->price * $item->qty }}</td>
                        <td>
                            <form action="{{ route('remove.cart', $item->rowId)}}" method="post">
                                @csrf
                                @method('delete')
                                <div class="form-group mb-2">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i></button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
                <tr class="text-dark font-weight-bold">
                    <td colspan="3" class="border border-success">Total</td>
                    <td colspan="3" class="border border-success">{{ Cart::subtotal() }} DH </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection


