<div id="">
	<div class="col-md-12">
		
		<div class="tabbable-panel">
			<div class="tabbable-line">
				<ul class="nav nav-tabs ">
<!--					<li class="active">-->
<!--						<a href="#tab_default_1" data-toggle="tab">-->
<!--						اطلاعات صفحه </a>-->
<!--					</li>-->
<!--					<li>-->
<!--						<a href="#tab_default_2" data-toggle="tab">-->
<!--						تصویر صفحه </a>-->
<!--					</li>-->
					<li>
						<a href="#tab_default_3" data-toggle="tab">
						شبکه های اجتماعی </a>
					</li>
					<li>
						<a href="#tab_default_4" data-toggle="tab">
						لغو عضویت </a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab_default_1">
						<? include "new_dynamics/default/profile/information_page.php4" ?>
					</div>
					<div class="tab-pane" id="tab_default_2">
						<? include "new_dynamics/default/profile/image_page.php4" ?>
					</div>
					<div class="tab-pane" id="tab_default_3">
						<? include "new_dynamics/default/profile/social_networks.php4" ?>
					</div>
					<div class="tab-pane" id="tab_default_4">
						<? include "new_dynamics/default/profile/cancel_register.php4" ?>
					</div>
					<div class="tab-pane" id="tab_default_5">
						<? include "new_dynamics/default/profile/change_email.php4" ?>
					</div>
					
				</div>
			</div>
		</div>

	</div>
</div>

<style>

/* Default mode */
.tabbable-line > .nav-tabs {
  border: none;
  margin: 0px;
  padding-right: 0px;
}
.tabbable-line > .nav-tabs > li {
  margin-right: 2px;
  width: initial;
}
.tabbable-line > .nav-tabs > li > a {
  border: 0;
  margin-right: 0;
  color: #737373 !important;
}
.tabbable-line > .nav-tabs > li > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open > a, .tabbable-line > .nav-tabs > li:hover > a {
  border: 0;
  background: none !important;
  color: #000 !important;
}
.tabbable-line > .nav-tabs > li.open > a > i, .tabbable-line > .nav-tabs > li:hover > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open .dropdown-menu, .tabbable-line > .nav-tabs > li:hover .dropdown-menu {
  margin-top: 0px;
}
.tabbable-line > .nav-tabs > li.active {
  border-bottom: 2px solid #E53935;
  position: relative;
}
.tabbable-line > .nav-tabs > li.active > a {
  border: 0;
  color: #E53935 !important;
}
.tabbable-line > .nav-tabs > li.active > a > i {
  color: #404040;
}
.tabbable-line > .tab-content {
  margin-top: -1px;
  /*background-color: #fff;*/
  border: 0;
  border-top: 2px solid #eee;
  padding: 15px 0;
}
.portlet .tabbable-line > .tab-content {
  padding-bottom: 0;
}

</style>
