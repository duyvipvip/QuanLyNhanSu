<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right dev-page-sidebar mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar"
 id="cbp-spmenu-s1">
	<div class="scrollbar scrollbar1">
		<ul class="nav" id="side-menu">
			<li>
				<a href="<?php echo url::createLink('admin', 'quanlytrangchu', 'index'); ?>" class="active">
					<i class="fa fa-home nav_icon"></i>Trang chủ</a>
			</li>
			<li>
				<a href="<?php echo url::createLink('admin', 'quanlynguoidung', 'index'); ?>">
					<i class="fa fa-user nav_icon"></i>Người dùng
				</a>
			</li>
			
			<li>
				<a href="#">
					<i class="fa fa-book nav_icon"></i>Quản lý lương
					<span class="fa arrow"></span>
				</a>
				<ul class="nav nav-second-level collapse">
					<li>
						<a href="<?php echo url::createLink('admin', 'quanlyluong', 'thuongluong'); ?>">Thưởng lương</a>
					</li>
					<li>
						<a href="<?php echo url::createLink('admin', 'quanlyluong', 'phatluong'); ?>">Phạt lương</a>
					</li>
					<li>
						<a href="<?php echo url::createLink('admin', 'quanlyluong', 'tamung'); ?>">Tạm ứng</a>
					</li>
					<li>
						<a href="<?php echo url::createLink('admin', 'quanlyluong', 'chamcong'); ?>">Chấm công</a>
					</li>
					<li>
						<a href="<?php echo url::createLink('admin', 'quanlyluong', 'bangluong'); ?>">Bảng lương</a>
					</li>
					
				</ul>
				<!-- /nav-second-level -->
			</li>
			<li>
				<a href="#">
					<i class="fa fa-database nav_icon"></i>Quản lý dữ liệu
					<span class="fa arrow"></span>
				</a>
				<ul class="nav nav-second-level collapse">
					<li>
						<a href="<?php echo url::createLink('admin', 'quanlydulieu', 'dantoc'); ?>">Dân tộc</a>
					</li>
					<li>
						<a href="<?php echo url::createLink('admin', 'quanlydulieu', 'chucvu'); ?>">Chức vụ</a>
					</li>
					<li>
						<a href="<?php echo url::createLink('admin', 'quanlydulieu', 'hedaotao'); ?>">Hệ đào tạo</a>
					</li>
					<li>
						<a href="<?php echo url::createLink('admin', 'quanlydulieu', 'ngoaingu'); ?>">Ngoại ngữ</a>
					</li>
					<li>
						<a href="<?php echo url::createLink('admin', 'quanlydulieu', 'tinhthanh'); ?>">Tỉnh thành</a>
					</li>
				</ul>
				<!-- /nav-second-level -->
			</li>
			<li>
				<a href="#">
					<i class="fa fa fa-cog nav_icon"></i>Quản lý cài đặt
					<span class="fa arrow"></span>
				</a>
				<ul class="nav nav-second-level collapse">
					<li>
						<a href="<?php echo url::createLink('admin', 'quanlycaidat', 'caidatthongso'); ?>">Cài đặt thông số</a>
					</li>
				</ul>
				<!-- /nav-second-level -->
			</li>
		</ul>
	</div>
	<!-- //sidebar-collapse -->
</nav>