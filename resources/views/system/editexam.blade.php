<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <h2 class="font-weight-bold">{{ $examData->name }} sınavını düzenle</h2>
                    @if($questions != null)
                    <form action="{{ route('examGetsave', ['id' => $examData->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @for ($i = 1; $i < (count($questions) + 1); $i++)
                            <div class="text-left mt-4">
                                <span class="font-weight-bold text-success">SORU {{$i}}</span>
                            </div>
                            <div class="question-area mt-3">
                                <input type="text" name="question{{$i}}" class="mb-2 w-100" id="" placeholder="Soruyu Girin" value="{{ $questions[$i-1]->question }}">
                            </div>
                            <input type="text" name="cevap1{{$i}}" placeholder="cevap 1" value="{{ $questions[$i-1]->answer1 }}">
                            <input type="text" name="cevap2{{$i}}" placeholder="cevap 2" value="{{ $questions[$i-1]->answer2 }}">
                            <input type="text" name="cevap3{{$i}}" placeholder="cevap 3" value="{{ $questions[$i-1]->answer3 }}">
                            <input type="text" name="cevap4{{$i}}" placeholder="cevap 4" value="{{ $questions[$i-1]->answer4 }}">
                            <div>
                                @if ($questions[$i-1]->istext == 1)
                                    <span class="text-danger">Soru yazarak cevaplanacak</span>
                                @endif
                            </div>
                            <div class="mt-2">
                                <input type="text" name="second{{$i}}" placeholder="Soru cevaplama süresi" value="{{ $questions[$i-1]->second }}">
                            </div>
                        @endfor
                        <input type="submit" class="btn btn-success mt-4" id="">
                    </form>
                    @else
                    <form action="{{ route('examGetsave', ['id' => $examData->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @for ($i = 1; $i < $examData->question + 1; $i++)
                            <div class="text-left mt-4">
                                <span class="font-weight-bold text-success">SORU {{$i}}</span>
                            </div>
                            <div class="question-area mt-3">
                                <input type="text" name="question{{$i}}" class="mb-2 w-100" id="" placeholder="Soruyu Girin">
                            </div>
                            <input type="text" name="cevap1{{$i}}" placeholder="cevap 1">
                            <input type="text" name="cevap2{{$i}}" placeholder="cevap 2">
                            <input type="text" name="cevap3{{$i}}" placeholder="cevap 3">
                            <input type="text" name="cevap4{{$i}}" placeholder="cevap 4">
                            <div class="mt-2">
                                <input type="text" name="second{{$i}}" placeholder="Soru cevaplama süresi">
                            </div>
                        @endfor
                        <input type="submit" class="btn btn-success mt-4" id="">
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>