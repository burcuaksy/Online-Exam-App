<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="d-flex justify-content-center mb-2">
                        <input type="text" name="" id="" class="exam-name" placeholder="Sınav adı" value="">
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <select name="" id="" class="exam-question">
                            <option value="" selected>Soru Sayısı</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <button class="btn btn-dark create-exam">Sınav oluştur</button>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <span class="isTrue"></span>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <button class="gotoexam d-none btn btn-success">Sınav sorularını oluştur</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.querySelector('.create-exam').addEventListener('click', function (e) {
        let $question;
        document.querySelector('.exam-question').querySelectorAll('option').forEach(element => {
            if(element.selected == true) {
                $question = element.value;
            }
        });
        
        window.http.get(window.route('examGetlist', {
            name: document.querySelector('.exam-name').value, 
            question: $question,
        })).then(response => {
            response.json().then(data => {
                document.querySelector('.isTrue').innerHTML = data.data;
                let button = document.querySelector('.gotoexam');
                if(data.status == true) {
                    button.classList.remove('d-none');
                }
                button.addEventListener('click', function () {
                    window.location.href = '{{ config('app')['url'] }}' + 'exam/' + data.id;
                });
            });
        });
    });
</script>