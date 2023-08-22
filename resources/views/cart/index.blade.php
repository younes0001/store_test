@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center">
        <div class="w-full max-w-lg p-4 bg-white rounded-lg shadow">
            <h4 class="text-gray-800 text-lg font-semibold mb-4">Your cart</h4>
            <table class="w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Qty</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Total</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td class="px-4 py-2">
                                <img src="{{ asset($item->associatedModel->image) }}"
                                    alt="{{ $item->title }}"
                                    width="50"
                                    height="50"
                                    class="rounded"
                                >
                            </td>
                            <td class="px-4 py-2">
                                {{ $item->name }}
                            </td>
                            <td class="px-4 py-2">
                                <form class="flex items-center" action="{{ route("update.cart",$item->associatedModel->slug) }}" method="post">
                                    @csrf
                                    @method("PUT")
                                    <div class="mr-2">
                                        <input type="number" name="qty" id="qty"
                                            value="{{ $item->quantity }}"
                                            placeholder="Quantité"
                                            max="{{ $item->associatedModel->inStock }}"
                                            min="1"
                                            class="w-16 px-2 py-1 border rounded-lg">
                                    </div>
                                    <div class="mr-2">
                                        <button type="submit" class="text-red-500 bg-blue-700">
                                        <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                            <td class="px-4 py-2">
                                {{ $item->price }} $
                            </td>
                            <td class="px-4 py-2">
                                {{ $item->price * $item->quantity}} $
                            </td>
                            <td class="px-4 py-2">
                                <form class="flex items-center" action="{{ route("remove.cart",$item->associatedModel->slug) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <div class="mr-2">
                                        <button type="submit" class="text-red-600">
                                            <i class="fa fa-trash  "></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="text-gray-800 font-semibold">
                        <td colspan="3" class="border border-success px-4 py-2">
                            Total
                        </td>
                        <td colspan="3" class="border border-success px-4 py-2">
                            {{ Cart::getSubtotal() }} $
                        </td>
                    </tr>
                </tbody>
            </table>
            @if(Cart::getSubtotal() > 0)
                <div class="form-group mt-3">
                    <a href="#" class="btn btn-primary">
                        Pay {{ Cart::getSubtotal() }} $ via PayPal
                    </a>
                </div>
            @endif
        </div>
    </div>
    @endsection
