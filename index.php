<!DOCTYPE html>
<html lang="en">
<?php
		include("include/head.php");
	?>
<body>
<!-- header -->
	<header>
		<?php
			include("include/header.php");
		?>
	</header>
<!-- header -->

<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">
			<div class="col-md-6 w3layouts_banner_bottom_left">
				<h3>real estate investing, even on a very small scale, remains a tried and true 
					means of building an individual's cash flow and wealth</h3>
			</div>
			
		</div>
	</div>
<!-- //banner-bottom -->
<!-- services -->
	<div class="services">
		<div class="container">
			<div class="w3layouts_header">
				<p><span><i class="fa fa-building-o" aria-hidden="true"></i></span></p>
				<h5>Latest <span>Properties</span></h5>
			</div>
					<?php
						//outputs the html for the propertiies
						function displayProperties($index, $count, $props){
							echo '<div class="w3_services_grids">';
							$x;
							for($x = $index; $x < $index + 3; $x++){
								if($x + 1 > $count){
									break;
								}
								$thisprop = $props[$x];								
								if(true){
									echo '
										
										<div class="col-md-4 w3l_services_grid" 
												data-id="'.$thisprop["pid"].'"
													>
											<div class="w3ls_services_grid agileits_services_grid" id="proppic'.$thisprop["pid"].'">
												<style>
													#proppic'.$thisprop["pid"].' {
														background: url("images/previews/'.$thisprop["preview"].'") no-repeat 0px 0px !important;
														background-size: 100% !important;
														-webkit-background-size: 100% !important;
														-moz-background-size: 100% !important;
														-o-background-size: 100% !important;
														-ms-background-size: 100% !important;
														border-bottom: 3px solid #10b5fb;
													}
												</style>
												<div class="agile_services_grid1_sub">
													<label style="padding: 1mm !important; background-color: #10b5fb; color: white;">$'.$thisprop["price"].'</label>
												</div>
												<div class="agileinfo_services_grid_pos">
													<i class="fa fa-home" aria-hidden="true"></i>
												</div>
											</div>
											<div class="wthree_service_text">
												<h3><a style="color: rgb(93, 204, 216)" href="property.php?id='.$thisprop["pid"].'">'.$thisprop["prop_name"].'</a>
												
												</h3>
												<label>'.$thisprop["city"].', </label>&nbsp<label>'.$thisprop["parish"].'</label>
											</div>
										</div>
									';
								}
							}
							echo "</div>";
							return $x;
						}

						//checks if the properties should be ordered or not
						include("model/getproperties.php");
						for($x = 0; $x < $count; $x++){
							if($count < 5){
								if($x % 3 == 0){
									$x = displayProperties($x, $count, $PROPS) - 1;
								}
							}else{
								if($x % 3 == 0){
									$x = displayProperties($x, 5, $PROPS) - 1;
								}
							}
								
						}
						
					?>
			
				<!--<div class="col-md-4 w3l_services_grid">
					<div class="w3ls_services_grid agileits_services_grid7">
						<div class="agile_services_grid1_sub agileits_w3layouts_ser_sub">
							<p>$ 45,000</p>
						</div>
						<div class="agileinfo_services_grid_pos agile_services_grid_pos">
							<i class="fa fa-home" aria-hidden="true"></i>
						</div>
					</div>
					<div class="wthree_service_text">
						<h3>Big luxury house for rent</h3>
						<h4 class="w3_agileits_service1">Reality Agency</h4>
						<ul>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
							<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
							<li>(854)</li>
						</ul>
					</div>
				</div>-->
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //services -->
<!-- skills -->
	<div class="skills">
		<div class="container">
			<div class="w3layouts_header w3_agile_head">
				<p><span><i class="fa fa-bullseye" aria-hidden="true"></i></span></p>
				<h5>Our <span>Skills</span></h5>
			</div>
			<div class="w3layouts_skills_grids">
				<div class="col-md-3 w3ls_about_guage">
					<h4>Make Money</h4>
					<canvas id="gauge1" width="200" height="100"></canvas>
				</div>
				<div class="col-md-3 w3ls_about_guage">
					<h4>Matching Buyer</h4>
					<canvas id="gauge2" width="200" height="100"></canvas>
				</div>
				<div class="col-md-3 w3ls_about_guage">
					<h4>Market Appraisals</h4>
					<canvas id="gauge3" width="200" height="100"></canvas>
				</div>
				<div class="col-md-3 w3ls_about_guage">
					<h4>Support</h4>
					<canvas id="gauge4" width="200" height="100"></canvas>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //skills -->
<!-- featured-services -->
	<div class="services">
		<div class="container">
			<div class="w3layouts_header">
				<p><span><i class="fa fa-building-o" aria-hidden="true"></i></span></p>
				<h5>Our <span>Featured</span> Services</h5>
			</div>
			<div class="w3layouts_skills_grids w3layouts_featured_services_grids">
				<div class="col-md-6 w3_featured_services_left">
					<div class="w3_featured_services_left_grid">
						<div class="col-xs-4 w3_featured_services_left_gridl">
							<div class="hi-icon-wrap hi-icon-effect-9 hi-icon-effect-9a">
								<i class="hi-icon fa-cubes"> </i>
							</div>
						</div>
						<div class="col-xs-8 w3_featured_services_left_gridr">
							<h4>lacinia vehicula ac aliquam</h4>
							<p>Maecenas bibendum nisi purus, in ullamcorper nisl aliquam id.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3_featured_services_left_grid">
						<div class="col-xs-4 w3_featured_services_left_gridl">
							<div class="hi-icon-wrap hi-icon-effect-9 hi-icon-effect-9a">
								<i class="hi-icon fa-handshake-o"> </i>
							</div>
						</div>
						<div class="col-xs-8 w3_featured_services_left_gridr">
							<h4>eget blandit leo tempor nisi</h4>
							<p>Maecenas bibendum nisi purus, in ullamcorper nisl aliquam id.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3_featured_services_left_grid">
						<div class="col-xs-4 w3_featured_services_left_gridl">
							<div class="hi-icon-wrap hi-icon-effect-9 hi-icon-effect-9a">
								<i class="hi-icon fa-globe"> </i>
							</div>
						</div>
						<div class="col-xs-8 w3_featured_services_left_gridr">
							<h4>tincidunt urna egestas non</h4>
							<p>Maecenas bibendum nisi purus, in ullamcorper nisl aliquam id.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3_featured_services_left_grid">
						<div class="col-xs-4 w3_featured_services_left_gridl">
							<div class="hi-icon-wrap hi-icon-effect-9 hi-icon-effect-9a">
								<i class="hi-icon fa-gear"> </i>
							</div>
						</div>
						<div class="col-xs-8 w3_featured_services_left_gridr">
							<h4>nullam elementum blandit dui</h4>
							<p>Maecenas bibendum nisi purus, in ullamcorper nisl aliquam id.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3_featured_services_left_grid">
						<div class="col-xs-4 w3_featured_services_left_gridl">
							<div class="hi-icon-wrap hi-icon-effect-9 hi-icon-effect-9a">
								<i class="hi-icon fa-hotel"> </i>
							</div>
						</div>
						<div class="col-xs-8 w3_featured_services_left_gridr">
							<h4>ullamcorper nisl aliquam</h4>
							<p>Maecenas bibendum nisi purus, in ullamcorper nisl aliquam id.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-6 w3_featured_services_right">
					<img src="images/7.jpg" alt=" " class="img-responsive" />
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //featured-services -->
<?php
	include("include/footer.php");
?>
</body>
</html>