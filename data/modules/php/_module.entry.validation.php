<?php
	//session_start(); 
	/* author(s) details : Herbert McNeil, Amoy Patterson */

	
	
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