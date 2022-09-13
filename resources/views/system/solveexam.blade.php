<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <div class="mt-2 mb-2 d-flex justify-content-end w-100">
                        <span class="text-danger font-weight-bold second-in">0</span>
                    </div>
                    <h2 class="font-weight-bold">{{ $examData->name }} sınavı</h2>
                    <form action="{{ route('examGetsolve', ['id' => $examData->id, 'user' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @for ($i = 1; $i < (count($questions) + 1); $i++)
                            <div class="quest-areas d-none">
                                <div class="text-left mt-4">
                                    <span class="font-weight-bold text-success">SORU {{$i}}</span>
                                </div>
                                <div class="question-area mt-3 mb-3">
                                    <span class="mb-3 font-weight-bold text-danger" style="font-size: 20px">{{ $questions[$i-1]->question }}</span>
                                </div>
                                <div class="row">
                                    @php
                                        $rand = rand ( 1 , 4 );
                                    @endphp
                                    @if($questions[$i-1]->istext == 0)
                                        @if($rand == 1)
                                        <div class="col-12 d-flex justify-content-start align-items-center mb-3">
                                            <input type="radio" name="cevap{{$i}}" value="{{ $questions[$i-1]->answer1 }}">
                                            <span class="ml-3">{{ $questions[$i-1]->answer1 }}</span>
                                        </div>
                                        <div class="col-12 d-flex justify-content-start align-items-center mb-3">
                                            <input type="radio" name="cevap{{$i}}" value="{{ $questions[$i-1]->answer2 }}">
                                            <span class="ml-3">{{ $questions[$i-1]->answer2 }}</span>
                                        </div>
                                        <div class="col-12 d-flex justify-content-start align-items-center mb-3">
                                            <input type="radio" name="cevap{{$i}}" value="{{ $questions[$i-1]->answer3 }}">
                                            <span class="ml-3">{{ $questions[$i-1]->answer3 }}</span>
                                        </div>
                                        <div class="col-12 d-flex justify-content-start align-items-center mb-3">
                                            <input type="radio" name="cevap{{$i}}" value="{{ $questions[$i-1]->answer4 }}">
                                            <span class="ml-3">{{ $questions[$i-1]->answer4 }}</span>
                                        </div>
                                        @elseif($rand == 2)
                                        <div class="col-12 d-flex justify-content-start align-items-center mb-3">
                                            <input type="radio" name="cevap{{$i}}" value="{{ $questions[$i-1]->answer2 }}">
                                            <span class="ml-3">{{ $questions[$i-1]->answer2 }}</span>
                                        </div>
                                        <div class="col-12 d-flex justify-content-start align-items-center mb-3">
                                            <input type="radio" name="cevap{{$i}}" value="{{ $questions[$i-1]->answer1 }}">
                                            <span class="ml-3">{{ $questions[$i-1]->answer1 }}</span>
                                        </div>
                                        <div class="col-12 d-flex justify-content-start align-items-center mb-3">
                                            <input type="radio" name="cevap{{$i}}" value="{{ $questions[$i-1]->answer4 }}">
                                            <span class="ml-3">{{ $questions[$i-1]->answer4 }}</span>
                                        </div>
                                        <div class="col-12 d-flex justify-content-start align-items-center mb-3">
                                            <input type="radio" name="cevap{{$i}}" value="{{ $questions[$i-1]->answer3 }}">
                                            <span class="ml-3">{{ $questions[$i-1]->answer3 }}</span>
                                        </div>
                                        @elseif($rand == 3)
                                        <div class="col-12 d-flex justify-content-start align-items-center mb-3">
                                            <input type="radio" name="cevap{{$i}}" value="{{ $questions[$i-1]->answer3 }}">
                                            <span class="ml-3">{{ $questions[$i-1]->answer3 }}</span>
                                        </div>
                                        <div class="col-12 d-flex justify-content-start align-items-center mb-3">
                                            <input type="radio" name="cevap{{$i}}" value="{{ $questions[$i-1]->answer1 }}">
                                            <span class="ml-3">{{ $questions[$i-1]->answer1 }}</span>
                                        </div>
                                        <div class="col-12 d-flex justify-content-start align-items-center mb-3">
                                            <input type="radio" name="cevap{{$i}}" value="{{ $questions[$i-1]->answer4 }}">
                                            <span class="ml-3">{{ $questions[$i-1]->answer4 }}</span>
                                        </div>
                                        <div class="col-12 d-flex justify-content-start align-items-center mb-3">
                                            <input type="radio" name="cevap{{$i}}" value="{{ $questions[$i-1]->answer2 }}">
                                            <span class="ml-3">{{ $questions[$i-1]->answer2 }}</span>
                                        </div>
                                        @else
                                        <div class="col-12 d-flex justify-content-start align-items-center mb-3">
                                            <input type="radio" name="cevap{{$i}}" value="{{ $questions[$i-1]->answer3 }}">
                                            <span class="ml-3">{{ $questions[$i-1]->answer3 }}</span>
                                        </div>
                                        <div class="col-12 d-flex justify-content-start align-items-center mb-3">
                                            <input type="radio" name="cevap{{$i}}" value="{{ $questions[$i-1]->answer4 }}">
                                            <span class="ml-3">{{ $questions[$i-1]->answer4 }}</span>
                                        </div>
                                        <div class="col-12 d-flex justify-content-start align-items-center mb-3">
                                            <input type="radio" name="cevap{{$i}}" value="{{ $questions[$i-1]->answer2 }}">
                                            <span class="ml-3">{{ $questions[$i-1]->answer2 }}</span>
                                        </div>
                                        <div class="col-12 d-flex justify-content-start align-items-center mb-3">
                                            <input type="radio" name="cevap{{$i}}" value="{{ $questions[$i-1]->answer1 }}">
                                            <span class="ml-3">{{ $questions[$i-1]->answer1 }}</span>
                                        </div>
                                        @endif
                                    @else
                                        <div class="mt-3 d-flex justify-content-center w-100">
                                            <textarea name="cevap{{$i}}" id="" cols="60" rows="10"></textarea>
                                        </div>
                                    @endif
                                </div>
                                <div class="mt-2">
                                    <input type="hidden" placeholder="Soru cevaplama süresi" value="{{ $questions[$i-1]->second }}">
                                </div>
                                <div class="d-flex mt-4 justify-content-end">
                                    <button type="button" class="btn btn-success next-question">Sonraki Soru</button>
                                    <button type="button" class="btn btn-danger ml-3 go-out">Sınavı Bitir</button>
                                </div>
                            </div>
                        @endfor
                        <div class="is-done d-none">
                            <h2 class="font-weight-bold info-area">{{ $examData->name }} sınavını tamamladınız.</h2>
                            <div class="d-flex mt-4 align-items-center justify-content-center">
                                <input type="submit" class="btn btn-danger complete-btn" id="">
                                <button type="button" class="go-back d-none btn btn-success ml-4">Sınava Geri Dön</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    let areas = document.querySelectorAll('.quest-areas');
    let next = document.querySelectorAll('.next-question');
    let count = areas.length;
    let done = document.querySelector('.is-done');
    let goOut = document.querySelectorAll('.go-out');
    let goBack = document.querySelector('.go-back');
    let info = document.querySelector('.info-area');
    let lastQuest = 0;
    let second = document.querySelector('.second-in');
    let sec = {{$second}};

    setInterval(() => {
        if(sec > 0){
            sec--;

            second.innerHTML = sec;
        }else {
            areas.forEach(element => {
                element.classList.add('d-none');
            });
            done.classList.remove('d-none');
            info.innerHTML = "Süreniz Doldu Gönder Butonuna Basarak Sınavdan Çıkış Yapabilirsiniz.";
            setTimeout(() => {
                document.querySelector('.complete-btn').click();
            }, 3000);
        }
    }, 1000);

    goOut.forEach(element => {
        element.addEventListener('click', function () {
            areas.forEach(element => {
                element.classList.add('d-none');
            });
            done.classList.remove('d-none');
            goBack.classList.remove('d-none');
            info.innerHTML = "Sınavdan Ayrılmak istiyorsanız gönder butonuna basın, Geri dönmek için 'Sınava Geri Dön' butonunu kullanabilirsiniz.";
        });
    });

    goBack.addEventListener('click', function () {
        goBack.classList.add('d-none');
        done.classList.add('d-none');
        info.innerHTML = "{{ $examData->name }} sınavını tamamladınız.";
        areas[lastQuest].classList.remove('d-none');
    });

    areas[0].classList.remove('d-none');

    next.forEach(function(element, index) {
        element.addEventListener('click', function () {
            if(index < count - 1) {
                areas[index].classList.add('d-none');
                areas[index+1].classList.remove('d-none');
                lastQuest = index + 1;
            }else {
                areas[index].classList.add('d-none');
                done.classList.remove('d-none');
            }
        });
    });
</script>