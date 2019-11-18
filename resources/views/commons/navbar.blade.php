<header class="mb-4 sticky-top">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="navbar-brand">
            
            <h3 class="mb-1">Product Pockets</h3>
        </div>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if(Auth::check()) 
                    <li class="nav-item ">{!! link_to_route('index.get','全製品一覧・検索',[],['class'=>'nav-link']) !!}</li>
                    <li class="nav-item ml-1">{!! link_to_route('products.create','新規製品登録',[],['class'=>'nav-link']) !!}</li>
                    <li class="nav-item ml-1">{!! link_to_route('users.index','メンバー一覧',[],['class'=>'nav-link']) !!}</li>
                    <li class="nav-item dropdown ml-1">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item">{!! link_to_route('users.show','参加中のプロジェクト',['id' => Auth::id()]) !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">{!! link_to_route('index.get','全製品一覧・検索',[],['class'=>'nav-link']) !!}</li>
                    <li class="nav-item ml-1">{!! link_to_route('users.index','メンバー一覧',[],['class'=>'nav-link']) !!}</li>
                    <li class="nav-item ml-1">{!! link_to_route('signup.get','新規メンバー登録',[],['class'=>'nav-link']) !!}</li>
                    <li class="nav-item ml-1">{!! link_to_route('login','ログイン',[],['class'=>'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>