<?php

	//if form has been submitted process it

	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		

			try {

				//insert into database
				$stmt = $db->prepare('INSERT INTO properties (pid, user_id, prop_name, prop_type, size, build_type, bed_num, bath_num, list_type, price, preview, rented, street1, street2, city, parish, country, time_stamp) VALUES (:pid, :user_id, :prop_name, :prop_type, :size, :build_type, :bed_num, :bath_num, :list_type, :price, :preview, :rented, :street1, :street2, :city, :parish, :country,:time_stamp )') ;
				$stmt->execute(array(
					':user_id' => $user_id,
					':prop_name' => $prop_name, 
					':prop_type' => $prop_type, 
					':size' => $size, 
					':build_type' => $build_type, 
					':bed_num' => $bed_num, 
					':bath_num' => $bath_num, 
					':list_type' => $list_type, 
					':price' => $price, 
					':preview' => $preview, 
					':rented' => $rented, 
					':street1' => $street1, 
					':street2' => $street2, 
					':city' => $city, 
					':parish' => $parish, 
					':country' => $country,
					':time_stamp' => date('Y-m-d H:i:s')
				));

				//redirect to index page
				header('Location: profile.php?action=added');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

	

	}

	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>