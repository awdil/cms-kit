                                                
													<i class="feather feather-bell header-icon"></i>
													<!-- Counter - Alerts -->
													<?php $badgecount = auth()->user()->unreadNotifications->count() ?>
													<?php if($badgecount == '0'): ?>

													<span class="badge badge-gray">0</span>
													<?php else: ?>
													<span class="badge badge-success badge-counter pulse-success side-badge"><?php echo e($badgecount); ?></span>
													<?php endif; ?><?php /**PATH D:\xampp\htdocs\cms-kit\resources\views/includes/admin/badgecount.blade.php ENDPATH**/ ?>