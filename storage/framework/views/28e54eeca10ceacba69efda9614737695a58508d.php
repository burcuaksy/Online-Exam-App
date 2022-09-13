<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <span class="text-success status-text mt-3 font-weight-bold"></span>
            </div>
        </div>
    </div>
    <div class="py-12">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item->deleted == 0): ?>
                <?php if(Auth::user()->roles == 0): ?>
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                            <?php echo e($item->name); ?>

                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                            Soru Sayısı : <?php echo e($item->question); ?>

                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                            <?php if($item->passive == 1): ?>
                                                Aktif
                                            <?php else: ?>
                                                Pasif
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 d-flex align-items-center">
                                            <button class="btn btn-success mr-2 edit-exam" data-id="<?php echo e($item->id); ?>">Düzenle</button>
                                            <button class="btn btn-dark mr-2 delete-button" data-use="0" data-id="<?php echo e($item->id); ?>">Sil</button>
                                            <?php if($item->passive == 1): ?>
                                            <button class="btn btn-primary passive-button" data-use="1" data-id="<?php echo e($item->id); ?>">Pasif Yap</button>
                                            <?php else: ?>
                                            <button class="btn btn-secondary passive-button active-button" data-ques="<?php echo e($item->body == NULL ? '1' : '0'); ?>" data-use="1" data-id="<?php echo e($item->id); ?>">Aktif Yap</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?> 
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                            <?php echo e($item->name); ?>

                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                            Soru Sayısı : <?php echo e($item->question); ?>

                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                            <?php if($item->passive == 1): ?>
                                                Aktif
                                            <?php else: ?>
                                                Pasif
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 d-flex align-items-center justify-content-end">
                                            <?php if(in_array($item->id, $statusdata, true)): ?>
                                                <button class="btn btn-danger mr-2 solve-exam" data-id="<?php echo e($item->id); ?>" disabled>Sınava Katıldın</button>
                                            <?php else: ?>
                                                <button class="btn btn-success mr-2 solve-exam" data-id="<?php echo e($item->id); ?>">Sınava Katıl</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
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
</script><?php /**PATH /home/cengizhan/Masaüstü/example-app/resources/views/system/examlist.blade.php ENDPATH**/ ?>