<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="navbar-brand">
            <h3 class=" small mb-0">製品進捗管理システム</h3>
            <h3 class="mb-1">Product Pockets</h3>
        </div>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if(Auth::check()) 
                    <li class="nav-item">{!! link_to_route('index.get','製品一覧',[],['class'=>'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('products.create','新規製品登録',[],['class'=>'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('users.index','メンバー一覧',[],['class'=>'nav-link']) !!}</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item">{!! link_to_route('users.show','参加中のプロジェクト',['id' => Auth::id()]) !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>
                @else
                    <li>{!! link_to_route('signup.get','新規メンバー登録',[],['class'=>'nav-link']) !!}</li>
                    <li>{!! link_to_route('index.get','ログイン',[],['class'=>'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>