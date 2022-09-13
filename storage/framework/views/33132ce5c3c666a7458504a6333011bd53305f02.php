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
                    <h2 class="font-weight-bold"><?php echo e($examData->name); ?> sınavını düzenle</h2>
                    <?php if($questions != null): ?>
                    <form action="<?php echo e(route('examGetsave', ['id' => $examData->id])); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php for($i = 1; $i < (count($questions) + 1); $i++): ?>
                            <div class="text-left mt-4">
                                <span class="font-weight-bold text-success">SORU <?php echo e($i); ?></span>
                            </div>
                            <div class="question-area mt-3">
                                <input type="text" name="question<?php echo e($i); ?>" class="mb-2 w-100" id="" placeholder="Soruyu Girin" value="<?php echo e($questions[$i-1]->question); ?>">
                            </div>
                            <input type="text" name="cevap1<?php echo e($i); ?>" placeholder="cevap 1" value="<?php echo e($questions[$i-1]->answer1); ?>">
                            <input type="text" name="cevap2<?php echo e($i); ?>" placeholder="cevap 2" value="<?php echo e($questions[$i-1]->answer2); ?>">
                            <input type="text" name="cevap3<?php echo e($i); ?>" placeholder="cevap 3" value="<?php echo e($questions[$i-1]->answer3); ?>">
                            <input type="text" name="cevap4<?php echo e($i); ?>" placeholder="cevap 4" value="<?php echo e($questions[$i-1]->answer4); ?>">
                            <div>
                                <?php if($questions[$i-1]->istext == 1): ?>
                                    <span class="text-danger">Soru yazarak cevaplanacak</span>
                                <?php endif; ?>
                            </div>
                            <div class="mt-2">
                                <input type="text" name="second<?php echo e($i); ?>" placeholder="Soru cevaplama süresi" value="<?php echo e($questions[$i-1]->second); ?>">
                            </div>
                        <?php endfor; ?>
                        <input type="submit" class="btn btn-success mt-4" id="">
                    </form>
                    <?php else: ?>
                    <form action="<?php echo e(route('examGetsave', ['id' => $examData->id])); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php for($i = 1; $i < $examData->question + 1; $i++): ?>
                            <div class="text-left mt-4">
                                <span class="font-weight-bold text-success">SORU <?php echo e($i); ?></span>
                            </div>
                            <div class="question-area mt-3">
                                <input type="text" name="question<?php echo e($i); ?>" class="mb-2 w-100" id="" placeholder="Soruyu Girin">
                            </div>
                            <input type="text" name="cevap1<?php echo e($i); ?>" placeholder="cevap 1">
                            <input type="text" name="cevap2<?php echo e($i); ?>" placeholder="cevap 2">
                            <input type="text" name="cevap3<?php echo e($i); ?>" placeholder="cevap 3">
                            <input type="text" name="cevap4<?php echo e($i); ?>" placeholder="cevap 4">
                            <div class="mt-2">
                                <input type="text" name="second<?php echo e($i); ?>" placeholder="Soru cevaplama süresi">
                            </div>
                        <?php endfor; ?>
                        <input type="submit" class="btn btn-success mt-4" id="">
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /home/cengizhan/Masaüstü/example-app/resources/views/system/editexam.blade.php ENDPATH**/ ?>