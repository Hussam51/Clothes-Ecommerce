<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Categories Management</h2>
            </div>
            <div class="pull-right">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-create')): ?>
                    <a class="btn btn-success" href="<?php echo e(route('admin.categories.create')); ?>"> Create New Category</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
    <table class="table table-bordered">

        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Image</th>
            <th width="280px">Description</th>
            <th width="280px">Action</th>
        </tr>

        <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <?php
                        $i = 0;
                    ?>
                    <td>
                        <?php echo e(++$i); ?>

                    </td>
                    <td>
                        <?php echo e($category->name); ?>

                    </td>
                    <td>
                        <img width="120" height="120" src="<?php echo e(Storage::url($category->image)); ?>" />

                    </td>
                    <td>
                        <?php echo e($category->description); ?>

                    </td>
                    <td>
                        <a  class="btn btn-info" href="<?php echo e(route('admin.categories.sizes.index', $category->id)); ?>">Sizes</a>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-edit')): ?>
                            <a class="btn btn-primary" href="<?php echo e(route('admin.categories.edit', $category->id)); ?>">Edit</a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-delete')): ?>
                            <form  style="display:inline-block" action="<?php echo e(route('admin.categories.destroy', $category->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button  type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        <?php endif; ?>

                        
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

    <?php echo e($categories->links()); ?>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $component = $__componentOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\clothesEcommerce\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>