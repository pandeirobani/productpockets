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
                    <li class="nav-item"><a href="#" class="nav-link">製品一覧</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">新規製品登録</a></li>
                    <li class="nav-item">{!! link_to_route('users.index','メンバー',[],['class'=>'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('logout.get','ログアウト',[],['class'=>'nav-link']) !!}</li>
                @else
                    <li>{!! link_to_route('signup.get','新規メンバー登録',[],['class'=>'nav-link']) !!}</li>
                    <li>{!! link_to_route('index.get','ログイン',[],['class'=>'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>