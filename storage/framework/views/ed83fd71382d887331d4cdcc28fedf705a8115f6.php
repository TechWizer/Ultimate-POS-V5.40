<div class="row">
	<div class="col-md-12">
		<h4><?php echo app('translator')->get('product.variations'); ?>:</h4>
	</div>
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table bg-gray">
				<tr class="bg-green">
					<th><?php echo app('translator')->get('product.variations'); ?></th>
					<th><?php echo app('translator')->get('product.sku'); ?></th>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_purchase_price')): ?>
						<th><?php echo app('translator')->get('product.default_purchase_price'); ?> (<?php echo app('translator')->get('product.exc_of_tax'); ?>)</th>
						<th><?php echo app('translator')->get('product.default_purchase_price'); ?> (<?php echo app('translator')->get('product.inc_of_tax'); ?>)</th>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_default_selling_price')): ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_purchase_price')): ?>
				        	<th><?php echo app('translator')->get('product.profit_percent'); ?></th>
				        <?php endif; ?>
				        <th><?php echo app('translator')->get('product.default_selling_price'); ?> (<?php echo app('translator')->get('product.exc_of_tax'); ?>)</th>
				        <th><?php echo app('translator')->get('product.default_selling_price'); ?> (<?php echo app('translator')->get('product.inc_of_tax'); ?>)</th>
			        <?php endif; ?>
			        <?php if(!empty($allowed_group_prices)): ?>
			        	<th><?php echo app('translator')->get('lang_v1.group_prices'); ?></th>
			        <?php endif; ?>
			        <th><?php echo app('translator')->get('lang_v1.variation_images'); ?></th>
				</tr>
				<?php $__currentLoopData = $product->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td>
						<?php echo e($variation->product_variation->name, false); ?> - <?php echo e($variation->name, false); ?>

					</td>
					<td>
						<?php echo e($variation->sub_sku, false); ?>

					</td>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_purchase_price')): ?>
					<td>
						<span class="display_currency" data-currency_symbol="true"><?php echo e($variation->default_purchase_price, false); ?></span>
					</td>
					<td>
						<span class="display_currency" data-currency_symbol="true"><?php echo e($variation->dpp_inc_tax, false); ?></span>
					</td>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_default_selling_price')): ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_purchase_price')): ?>
						<td>
							<?php echo e(number_format($variation->profit_percent, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>

						</td>
						<?php endif; ?>
						<td>
							<span class="display_currency" data-currency_symbol="true"><?php echo e($variation->default_sell_price, false); ?></span>
						</td>
						<td>
							<span class="display_currency" data-currency_symbol="true"><?php echo e($variation->sell_price_inc_tax, false); ?></span>
						</td>
					<?php endif; ?>
					<?php if(!empty($allowed_group_prices)): ?>
			        	<td class="td-full-width">
			        		<?php $__currentLoopData = $allowed_group_prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        			<strong><?php echo e($value, false); ?></strong> - 
                                
                                <?php if(!empty($group_price_details[$variation->id][$key])): ?>
                                    <?php if($group_price_details[$variation->id][$key]['price_type'] == 'fixed'): ?>
			        				    <span class="display_currency" data-currency_symbol="true"><?php echo e($group_price_details[$variation->id][$key]['price'], false); ?></span>
                                    <?php elseif($group_price_details[$variation->id][$key]['price_type'] == 'percentage'): ?>
                                        <?php echo e($group_price_details[$variation->id][$key]['price'], false); ?> %
                                    <?php endif; ?>
			        			<?php else: ?>
			        				0
			        			<?php endif; ?>
			        			<br>
			        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        	</td>
			        <?php endif; ?>
			        <td>
			        	<?php $__currentLoopData = $variation->media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        		<?php echo $media->thumbnail([60, 60], 'img-thumbnail'); ?>

			        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        </td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>
	</div>
</div><?php /**PATH E:\Shakya IT\Projects\pos-v5-base\resources\views/product/partials/variable_product_details.blade.php ENDPATH**/ ?>