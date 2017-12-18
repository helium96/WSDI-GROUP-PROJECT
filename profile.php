<!DOCTYPE html>
<html lang="en">
<?php 
	include("include/head.php"); 
	$USER;
	if(!$user->is_logged_in()){
		header("location: login.php");
	}else{
		$USER = $user->get_user($_SESSION["email"]);
	}
?>

<style>
	.centered-and-cropped { object-fit: cover }

	button:active{
		outline: none;
	}
	button:focus{
		outline: none;
	}

	.modal-title{
		font-size: 14px !important;
	}
</style>
<body>
    <header>
        <?php include("include/header.php"); ?>
    </header>

    <div class="container">
		<div  style="width: 200px !important; margin: 10mm auto 5mm auto !important; z-index: 2;">
			<div style="width: 160px !important; 
						height: 160px !important;
						border-radius: 100% !important;
						background-color: white;">
				<img class="centered-and-cropped"
				src="images/avatars/no_image.png" 
				style="	width: 160px !important; 
						height: 160px !important;
						border-radius: 100% !important;
						background: white !important;"/>			
			</div>
			
		</div>
        
        <hr style="margin-top: -70px !important; width: 70%; border-color: black; z-index: -10 !important;"/>
        <div class="w3layouts_header" style="margin-top: 100px !important;">
            <h5 style="margin-left: -12mm !important;" id="userName">
				<span style="cursor: pointer; color: rgb(93, 204, 216);">
                <?php 
                    echo $USER["fname"]." ".$USER["mname"]." ".$USER["lname"];
                ?>
				</span>
            </h5>
        </div>

		<div class="container" id="userInfo" hidden>
			<div class="w3layouts_header" style="margin-top: 10px !important;">
            <h5 style="margin-left: -20mm !important; font-size: 16px !important;">
                Your Info 
				<button style="
								width: 20px; 
								height: 20px; 
								border-radius: 100%; 
								border: none; 
								background: transparent;"
								data-toggle="modal" data-target="#updateUserModal">
					<span>
						<i style="color: rgb(93, 204, 216);" class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</span>
				</button>
            </h5>
        	</div >
			<?php
				$mname = "";
				if(isset($_SESSION["mname"])){
					$mname = $_SESSION["mname"];
				}

				$tel2 = "";
				
				echo '
					<div style="width: 300px !important; margin: 5mm auto !important; ">
					<ul class="list-group" style="margin-left: -18mm !important;">
					<li class="list-group-item">'.$USER["fname"].' '. $mname.' '. $USER["lname"].'</li>
					<li class="list-group-item">'.$USER["email"].'</li>
					<li class="list-group-item">'.$USER["tel1"].'</li>';
					if(!empty($USER["tel2"])){
						echo '
							<li class="list-group-item">'.$USER["tel2"].'</li>
							</ul>
							</div>		
						';
					}else{
						echo "
							</ul>
							</div>		
						";
					}
				/*echo "
					<div style=\"width: 300px !important; margin: 5mm auto !important; \">
					<ul class=\"list-group\" style=\"margin-left: -18mm !important;\">
					<li class=\"list-group-item\">John $mname Doe</li>
					<li class=\"list-group-item\">boebot13@gmail.com</li>
					<li class=\"list-group-item\">876-999-9999</li>";
					if(isset($_SESSION["tel2"])){
						echo '
							<li class=\"list-group-item\">$_SESSION["tel2"]</li>
							</ul>
							</div>		
						';
					}else{
						echo "
							</ul>
							</div>		
						";
					}*/
			?>
		</div>

		<div class="container" id="userPropertiesContainer">
			<div class="w3layouts_header" style="margin-top: 15px !important;">
				<h5 style="margin-left: -12mm !important; color: rgb(93, 204, 216)" id="userName">

					Your Properties
					<button style="
									width: 20px; 
									height: 20px; 
									border-radius: 100%; 
									border: none; 
									background: transparent;"
									data-toggle="modal" data-target="#addPropModal">
						<span>
							<i style="color: rgb(93, 204, 216);" class="fa fa-plus-square-o" aria-hidden="true"></i>
						</span>
					</button>
				</h5>
				<div style="margin-left: -11mm !important; margin-top: -10px !important;">
					<hr style="width: 300px !important; border-color: darkgrey">
				</div>

				<div class="container">
					<?php
						$user->set_properties($USER["email"]);

						function displayProperties($index, $user){
							echo '<div class="w3_services_grids">';
							$x;
							for($x = $index; $x < $index + 3; $x++){
								if($x + 1 > $user->property_count()){
									break;
								}
								$thisprop = $user->get_property($x);								
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
													<button style="
															width: 20px; 
															height: 20px; 
															border-radius: 100%; 
															border: none; 
															background: transparent;" class="upPropBtn" data-id="'.$thisprop["pid"].'">
														<span>
															<i style="color: rgb(93, 204, 216);" class="fa fa-pencil-square-o" aria-hidden="true"></i>
														</span>
													</button>
												</h3>
											</div>
										</div>
									';
								}
							}
							echo "</div>";

							return $x;
						}

						for($x = 0; $x < $user->property_count(); $x++){
							if($x % 3 == 0){
								$x = displayProperties($x, $user);
							}
						}
					?>
				</div>
				
        	</div>

		</div>
		<br><br><br><br>
		<button hidden id="upProp" data-toggle="modal" data-target="#updatePropModal"></button>
		<div class="modal fade" id="addPropModal" tabindex="-1" role="dialog" aria-labelledby="addPropModal" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" >Property</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container" style="width: 100% !important;">
						<?php
						include("include/addproperty.php");
						?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="updatePropModal" tabindex="-1" role="dialog" aria-labelledby="updatePropModal" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" >Property</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="upPropModBody">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="updateuserModal" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" >Your Info</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php
						include("include/updateUser.php");
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
				</div>
			</div>
		</div>


        
    </div>

<script src="js/classie.js"></script>
<script>
	(function() {
		// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
		if (!String.prototype.trim) {
			(function() {
				// Make sure we trim BOM and NBSP
				var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
				String.prototype.trim = function() {
					return this.replace(rtrim, '');
				};
			})();
		}

		[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
			// in case the input is already filled..
			if( inputEl.value.trim() !== '' ) {
				classie.add( inputEl.parentNode, 'input--filled' );
			}

			// events:
			inputEl.addEventListener( 'focus', onInputFocus );
			inputEl.addEventListener( 'blur', onInputBlur );
		} );

		function onInputFocus( ev ) {
			classie.add( ev.target.parentNode, 'input--filled' );
		}

		function onInputBlur( ev ) {
			if( ev.target.value.trim() === '' ) {
				classie.remove( ev.target.parentNode, 'input--filled' );
			}
		}
	})();
</script>

<script>
	$(document).ready(function(){
		$('#userName').click(() => {
			$("#userInfo").animate({height: 'toggle'});
		});

		$('.upPropBtn').click(function(e) {
			var here = $(this);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					//console.log(this.responseText);
						var response = JSON.parse(this.responseText);
						/*alert(JSON.stringify(response));
						$('#updatePropModal .propForm input[name=pid]').val(response[0]);
						$('#updatePropModal .propForm input[name=user_id]').val(response[1]);	
						$('#updatePropModal .propForm input[name=prop_name]').val(response[2]);	
						$('#updatePropModal .propForm select[name=prop_type] option').eq(0).text(response[3]);
						$('#updatePropModal .propForm select[name=prop_type] option').eq(0).val(response[3]);
						$('#updatePropModal .propForm input[name=size]').val(response[4]);	
						$('#updatePropModal .propForm select[name=build_type] option').eq(0).text(response[5]);
						$('#updatePropModal .propForm select[name=build_type] option').eq(0).val(response[5]);
						$('#updatePropModal .propForm select[name=bed_num] option').eq(0).text(response[6]);
						$('#updatePropModal .propForm select[name=bed_num] option').eq(0).val(response[6]);
						$('#updatePropModal .propForm select[name=bath_num] option').eq(0).text(response[7]);
						$('#updatePropModal .propForm select[name=bath_num] option').eq(0).val(response[7]);
						$('#updatePropModal .propForm select[name=list_type] option').eq(0).text(response[8]);
						$('#updatePropModal .propForm select[name=list_type] option').eq(0).val(response[8]);
						$('#updatePropModal .propForm input[name=price]').val(response[9]);
						$('#updatePropModal .propForm input[name=street1]').val(response[12]);
						$('#updatePropModal .propForm input[name=street2]').val(response[13]);
						$('#updatePropModal .propForm input[name=city]').val(response[14]);
						$('#updatePropModal .propForm input[name=parish]').val(response[15]);
						$('#updatePropModal .propForm input[name=country]').val(response[16]);*/
						$("#upPropModBody").load("include/updateproperty.php");				
						$('#upProp').click();
				}
			};
			xmlhttp.open("POST", "model/ajaxgetproperties.php?pid="+here.attr("data-id"));
			xmlhttp.send();			
		});
	});

	
</script>

    <?php include("include/footer.php"); ?>
</body>
</html>