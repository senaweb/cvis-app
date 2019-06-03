@if (session('success'))
    <div class="center">
        <div class="alert alert-success">
            <div class="alert-heading">Success 
                <button onclick=" $(this).parent().parent().hide(); " type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <hr>
            </div>
            <div class="alert-body">
                {{ session('success') }}
            </div>
        </div>
    </div>

@elseif (session('error'))
    <div class="center">
            <div class="alert alert-danger">
                <div class="alert-heading">Error 
                    <button onclick=" $(this).parent().parent().hide(); " type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <hr>
                </div>
                <div class="alert-body">
                    <span class="text-danger">{{ session('error') }}</span>
                </div>
        </div>
    </div>

@elseif (session('info'))
    <div class="center">
            <div class="alert alert-info">
                <div class="alert-heading">Info 
                    <button onclick=" $(this).parent().parent().hide(); " type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <hr>
                </div>
                <div class="alert-body">
                    <span class="text-info">{{ session('info') }}</span>
                </div>
        </div>
    </div>
@endif

@if($errors->any()) 
    <div class="center">
            <div class="alert alert-danger">
                <div class="alert-heading">Error 
                    <button onclick=" $(this).parent().parent().hide(); " type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <hr>
                </div>
                <div class="alert-body">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><strong class="text-danger">{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                </div>
        </div>
    </div>
@endif