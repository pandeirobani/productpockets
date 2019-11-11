@if(count($products) > 0)
                <table class="table table-bordered" style="table-layout:fixed;">
                    <thead>
                        <tr>
                            <th scope="col" style="width:200px;" class="text-center">品名</th>
                            <th scope="col" style="width:180px;" class="text-center">状態</th>
                            <th scope="col" style="width:100px;" class="text-center">納期</th>
                            <th scope="col" style="width:100px;" class="text-center">責任者</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ link_to_route('products.show',$product->name,['id' => $product->id]) }}</td>
                            <td>{{ $product->status }}</td>
                            <td>{{ $product->deadline }}</td>
                            <td>{{ $product->leader_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links('pagination::bootstrap-4') }}
            @endif