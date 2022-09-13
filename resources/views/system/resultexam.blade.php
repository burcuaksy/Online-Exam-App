<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <h2 class="font-weight-bold">{{ $exam->name }} sınavını değerlendir</h2>
                    <form action="{{ route('examGetpoint', ['id' => $exam->id, 'user' => $result->student]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @for ($i = 1; $i < (count($questions) + 1); $i++)
                            <div class="text-left mt-4">
                                <span class="font-weight-bold text-success">SORU {{$i}}</span>
                            </div>
                            <div class="question-area mt-3 mb-4">
                                <span class="mb-4">{{ $questions[$i-1]->question }}</span>
                            </div>
                            <div class="answer-area mt-3 mb-3">
                                <span>Öğrencinin Cevabı : <strong>{{ $answer['cevap'.strval($i)] }}</strong></span>
                            </div>
                            <div class="mt-2">
                                <div class="d-flex align-items-center justify-content-center">
                                    <input type="radio" name="point{{$i}}" placeholder="Doğru" value="1">
                                    <span class="ml-2">Doğru</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <input type="radio" name="point{{$i}}" placeholder="Yanlış" value="0">
                                    <span class="ml-2">Yanlış</span>
                                </div>
                            </div>
                        @endfor
                        <input type="submit" class="btn btn-success mt-4" id="">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>