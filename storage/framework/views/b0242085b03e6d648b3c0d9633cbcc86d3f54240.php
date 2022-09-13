<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
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
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

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
                    window.location.href = '<?php echo e(config('app')['url']); ?>' + 'exam/' + data.id;
                });
            });
        });
    });
</script><?php /**PATH /home/cengizhan/Masaüstü/example-app/resources/views/system/createexam.blade.php ENDPATH**/ ?>