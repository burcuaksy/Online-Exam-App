<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <h2 class="font-weight-bold"><?php echo e($exam->name); ?> sınavını değerlendir</h2>
                    <form action="<?php echo e(route('examGetpoint', ['id' => $exam->id, 'user' => $result->student])); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php for($i = 1; $i < (count($questions) + 1); $i++): ?>
                            <div class="text-left mt-4">
                                <span class="font-weight-bold text-success">SORU <?php echo e($i); ?></span>
                            </div>
                            <div class="question-area mt-3 mb-4">
                                <span class="mb-4"><?php echo e($questions[$i-1]->question); ?></span>
                            </div>
                            <div class="answer-area mt-3 mb-3">
                                <span>Öğrencinin Cevabı : <strong><?php echo e($answer['cevap'.strval($i)]); ?></strong></span>
                            </div>
                            <div class="mt-2">
                                <div class="d-flex align-items-center justify-content-center">
                                    <input type="radio" name="point<?php echo e($i); ?>" placeholder="Doğru" value="1">
                                    <span class="ml-2">Doğru</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <input type="radio" name="point<?php echo e($i); ?>" placeholder="Yanlış" value="0">
                                    <span class="ml-2">Yanlış</span>
                                </div>
                            </div>
                        <?php endfor; ?>
                        <input type="submit" class="btn btn-success mt-4" id="">
                    </form>
                </div>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /home/cengizhan/Masaüstü/example-app/resources/views/system/resultexam.blade.php ENDPATH**/ ?>