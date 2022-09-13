<x-app-layout>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <span class="text-success status-text mt-3 font-weight-bold"></span>
            </div>
        </div>
    </div>
    <div class="py-12">
        @if(Auth::user()->roles == 0)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                Sınav Adı
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                Öğrenci
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                                Durum
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12 text-center text-danger">
                                Sınav Sonucu
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12 d-flex align-items-center justify-content-end">
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
                                Sınav Adı
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                                Durum
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center text-danger">
                                Sınav Sonucu
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12 d-flex align-items-center justify-content-end">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @foreach ($data as $item)
            @if(Auth::user()->roles == 0)
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                        {{$item->quizname}}
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                        {{$item->userName}}
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                                        {{ $item->status }}
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12 text-center text-danger">
                                        {{ $item->point }}
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12 d-flex align-items-center justify-content-end">
                                        <button class="btn btn-success mr-2 control-exam" data-id="{{$item->id}}">Kontrol Et</button>
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
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    {{$item->quizname}}
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                                    {{ $item->status }}
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center text-danger">
                                    {{ $item->point }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</x-app-layout>
<script>
let edit = document.querySelectorAll('.control-exam');

edit.forEach(element => {
    element.addEventListener('click', function () {
        window.location.href = window.route('examResultwith', {
            id: element.getAttribute('data-id'),
        });
    });
});

</script>