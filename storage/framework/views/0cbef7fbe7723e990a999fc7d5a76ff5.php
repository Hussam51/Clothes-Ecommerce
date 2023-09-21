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
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-create')): ?>
                    <a class="btn btn-success" href="<?php echo e(route('admin.products.create')); ?>"> Create New Product</a>
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
            <th>price</th>
            <th>QY</th>
            <th>Category</th>
            <th>Image</th>
            <th width="240px">Tags</th>
            <th width="240px">Description</th>
            <th width="240px">Action</th>
        </tr>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <?php
                    $i = 0;
                ?>
                <td><?php echo e(++$i); ?></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->price); ?></td>
                <td><?php echo e($product->quantity); ?></td>
                <td><?php echo e($product->category->name); ?></td>
                <td><img width="100" height="100" src="<?php echo e(Storage::url($product->image)); ?>"/></td>
                <td>
                    <?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($tag->name); ?>

                        <?php if($product->tags->count() > 1): ?>
                            <?php echo e('-'); ?>

                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </td>
                <td><?php echo e($product->description); ?></td>
                <td >

                        <a class="btn btn-info sm" href="<?php echo e(route('admin.products.show', $product->id)); ?>" >Show</a>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-edit')): ?>
                            <a class="btn btn-primary sm" href="<?php echo e(route('admin.products.edit', $product->id)); ?>" >Edit</a>
                        <?php endif; ?>
                        <form style="display: inline-block" action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-delete')): ?>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        <?php endif; ?>
                    </form>
                     <a style="display: inline-block" class="btn btn-success sm" href="<?php echo e(route('admin.products.sizes.index', $product->id)); ?>" >Sizes</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>



 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $component = $__componentOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\clothesEcommerce\resources\views/admin/products/index.blade.php ENDPATH**/ ?>