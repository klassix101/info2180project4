<?php
	//session_start(); 
	/* author(s) details : Herbert McNeil, Amoy Patterson */

	//1.this function must be encapsulated in a <script> block in html destination, therein subsequenting a generic function 'generateGenericResponse' accepting one param, for generating
	//1...generic responses based on input value, ( such as a custom message )
	//2.this function must subsequent also, a generateSignInHtmlTemplateInformation , which accepts <\d+> params, contained in the same prior block as 'generateGenericResponse' function. 
	//2...this function is what generates the template based on user information via database established in _module.entry.validation.php.
	//3.this function must include email and password tags from the html destination consisting of email and password and submit button.
	
	function generateCheapoEntryValidationProcess ( )
	{
		//establish global user variables
		$userLoginSuccessEnquiry = false;
		$UserName = ""; 
		$UserPassword = ""; 
		
		////////////////////////////////////////////////////////
		//BEGIN: entry (sign in) validation/detail submission //
		////////////////////////////////////////////////////////
		if ( !empty ( $_POST [ 'cheapoSignInConfirmationButtonAreaButtonName' ] ) )
		{	
			//establish html sign in input components, with respect to php 
			$userLoginUsername = $_POST [ 'cheapoSignInUsernameRetrievalAreaComponentName' ];
			$userLoginPassword = $_POST [ 'cheapoSignInPasswordRetrievalAreaComponentName' ];

			//establish validation login success test process
			foreach ( $_SESSION [ 'USER_RESULTS' ] as $databaseRecordCollectionItem ) 
			{
				$segmentedDatabaseRecordCollection = explode ( "::", $databaseRecordCollectionItem );
				
				if ( ( $userLoginUsername == $segmentedDatabaseRecordCollection[4]) && ( $userLoginPassword == $segmentedDatabaseRecordCollection[3] ) )
				{
					echo 'generateSignInSuccessData ( )';
					
					$userLoginSuccessEnquiry = true;
				}
			}	
			
			//establish validation login failure process
			if ( !$userLoginSuccessEnquiry )
			{
				echo 'generateGenericResponse ( "login failed, incorrect login details!" );';
			}
		}
		
	}
?>