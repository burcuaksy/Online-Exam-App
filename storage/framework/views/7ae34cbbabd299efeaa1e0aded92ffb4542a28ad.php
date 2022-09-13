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
        <?php if(Auth::user()->roles == 0): ?>
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
        <?php else: ?>
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
        <?php endif; ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(Auth::user()->roles == 0): ?>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                        <?php echo e($item->quizname); ?>

                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                        <?php echo e($item->userName); ?>

                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                                        <?php echo e($item->status); ?>

                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12 text-center text-danger">
                                        <?php echo e($item->point); ?>

                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12 d-flex align-items-center justify-content-end">
                                        <button class="btn btn-success mr-2 control-exam" data-id="<?php echo e($item->id); ?>">Kontrol Et</button>
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
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <?php echo e($item->quizname); ?>

                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                                    <?php echo e($item->status); ?>

                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center text-danger">
                                    <?php echo e($item->point); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
let edit = document.querySelectorAll('.control-exam');

edit.forEach(element => {
    element.addEventListener('click', function () {
        window.location.href = window.route('examResultwith', {
            id: element.getAttribute('data-id'),
        });
    });
});

</script><?php /**PATH /home/cengizhan/Masaüstü/example-app/resources/views/system/examresult.blade.php ENDPATH**/ ?>