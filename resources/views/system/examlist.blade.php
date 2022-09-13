<x-app-layout>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <span class="text-success status-text mt-3 font-weight-bold"></span>
            </div>
        </div>
    </div>
    <div class="py-12">
        @foreach ($data as $item)
            @if($item->deleted == 0)
                @if(Auth::user()->roles == 0)
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                            {{$item->name}}
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                            Soru Sayısı : {{$item->question}}
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                            @if($item->passive == 1)
                                                Aktif
                                            @else
                                                Pasif
                                            @endif
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 d-flex align-items-center">
                                            <button class="btn btn-success mr-2 edit-exam" data-id="{{$item->id}}">Düzenle</button>
                                            <button class="btn btn-dark mr-2 delete-button" data-use="0" data-id="{{$item->id}}">Sil</button>
                                            @if($item->passive == 1)
                                            <button class="btn btn-primary passive-button" data-use="1" data-id="{{$item->id}}">Pasif Yap</button>
                                            @else
                                            <button class="btn btn-secondary passive-button active-button" data-ques="{{ $item->body == NULL ? '1' : '0' }}" data-use="1" data-id="{{$item->id}}">Aktif Yap</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else 
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                            {{$item->name}}
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                            Soru Sayısı : {{$item->question}}
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                            @if($item->passive == 1)
                                                Aktif
                                            @else
                                                Pasif
                                            @endif
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 d-flex align-items-center justify-content-end">
                                            @if(in_array($item->id, $statusdata, true))
                                                <button class="btn btn-danger mr-2 solve-exam" data-id="{{$item->id}}" disabled>Sınava Katıldın</button>
                                            @else
                                                <button class="btn btn-success mr-2 solve-exam" data-id="{{$item->id}}">Sınava Katıl</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        @endforeach
    </div>
</x-app-layout>
<script>
    let buttons = document.querySelectorAll('.delete-button');
    let passive = document.querySelectorAll('.passive-button');
    let active  = document.querySelectorAll('.active-button');
    let edit = document.querySelectorAll('.edit-exam');
    let solve = document.querySelectorAll('.solve-exam');

    edit.forEach(element => {
        element.addEventListener('click', function () {
            window.location.href = window.route('examEdit', {
                id: element.getAttribute('data-id'),
            });
        });
    });

    solve.forEach(element => {
        element.addEventListener('click', function () {
            window.location.href = window.route('examSolve', {
                id: element.getAttribute('data-id'),
            });
        });
    });

    active.forEach(element => {
        element.addEventListener('click', function () {
            if(element.getAttribute('data-ques') == 1) {
                element.innerHTML = 'Soru Yok!';
            }
        });
    });

    passive.forEach(element => {
        element.addEventListener('click', function () {
            if(element.getAttribute('data-ques') != 1) {
            window.http.get(window.route('examDelete', {
            id: element.getAttribute('data-id'), 
            use: element.getAttribute('data-use')
                })).then(response => {
                    response.json().then(data => {
                        if(data.status == true) {
                            document.querySelector('.status-text').innerHTML = data.data;
                            setTimeout(() => {
                                window.location.href = window.route('examlist');
                            }, 1000);
                        }
                    });
                });
            };
        });
    });

    buttons.forEach(element => {
        element.addEventListener('click', function () {
        window.http.get(window.route('examDelete', {
        id: element.getAttribute('data-id'), 
        use: element.getAttribute('data-use')
            })).then(response => {
                response.json().then(data => {
                    if(data.status == true) {
                        document.querySelector('.status-text').innerHTML = data.data;
                        setTimeout(() => {
                            window.location.href = window.route('examlist');
                        }, 1000);
                    }
                });
            });
        });
    });
</script>