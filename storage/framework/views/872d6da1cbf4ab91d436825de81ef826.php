<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['type', 'name', 'value' => '']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['type', 'name', 'value' => '']); ?>
<?php foreach (array_filter((['type', 'name', 'value' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<input type="<?php echo e($type); ?>" name="<?php echo e($name); ?>" value="<?php echo e(old($name, $value)); ?>"
    <?php echo e($attributes->class(['form-control'])); ?> />
<?php /**PATH C:\xampp\htdocs\clothesEcommerce\resources\views/components/input.blade.php ENDPATH**/ ?>