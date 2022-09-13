<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                       Sistemde kayıtlı kullanıcılar;
                </div>
            </div>
            @foreach ($data as $item)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200" style="display: flex; align-items: center;">
                        @if ($item->roles == 0)
                        <div style="
                        margin-right: 10px;
                        padding: 5px;
                        background: #b00;
                        color: #fff;
                        border-radius: 20%;
                        width: 100px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        ">
                            Öğretmen
                        </div>
                        @endif 
                        <div>
                            {{$item->name}}
                        </div> 
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>