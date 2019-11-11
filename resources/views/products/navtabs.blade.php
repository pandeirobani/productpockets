<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="{{ route('products.show', ['id' => $product->id]) }}" class="nav-link {{ Request::is('products/*' . $product->id) ? 'active' : '' }}">製品詳細</a></li>
    <li class="nav-item"><a href="{{ route('product.participants', ['id' => $product->id]) }}" class="nav-link {{ Request::is('product/*/participants') ? 'active' : '' }}">参加メンバー</a></li>
</ul>