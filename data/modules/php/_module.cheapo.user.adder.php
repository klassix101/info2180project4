<!--DOCTYPE html -->
<!--
	author(s) details : Herbert McNeil, Amoy Patterson
--->
<?php
	//session_start(); 
			
	function generateCheapoUserAdditionProcess ( )
	{
			////////////////////////////////////////////////////////////////////////////////////////////////
			//BEGIN SQL CONNECTION PROCESSS
			////////////////////////////////////////////////////////////////////////////////////////////////
			//establish database connection requirements
				//estabish database connection requirements
				$_SESSION [ 'dbHost' ] = 'localhost';
				$_SESSION [ 'dbUsername' ] = 'root';
				$_SESSION [ 'dbPassword' ] = '';
				$_SESSION [ 'dbName' ] = 'cheapomail';

			//establish database connection
				//connection to the database
				$connection = mysqli_connect ( $_SESSION [ 'dbHost' ], $_SESSION [ 'dbUsername' ], $_SESSION [ 'dbPassword' ], $_SESSION [ 'dbName' ] );
				//establish connection verification
				if ( mysqli_connect_errno ( ) )
				{
					//echo "Failed to connect to MySQL: " . mysqli_connect_error ( );
				}
				
			if ( !empty ( $_POST [ 'cheapoSignUpConfirmationButtonAreaName' ] ) )
			{	
				//establish html sign in input components, with respect to php 
				$newUserFirstName = $_POST [ 'cheapoSignUpFirstNameRetrievalAreaComponentName' ];
				$newUserLastName = $_POST [ 'cheapoSignUpLastNameRetrievalAreaComponentName' ];
				$newUserUserName = $_POST [ 'cheapoSignUpUserNameRetrievalAreaComponentName' ];
				$newUserPassword = $_POST [ 'cheapoSignUpUserPasswordRetrievalAreaComponentName' ];

				
				//establish results from database
				$connection -> query ("insert into user(id, firstname, lastname, password, username) values ('', '$newUserFirstName', '$newUserLastName', '$newUserPassword', '$newUserUserName')");
				
				echo "generateSignInSuccessData ( );";
				echo 'generateGenericResponse ( "new user added successsfully!" );';
			}
			////////////////////////////////////////////////////////////////////////////////////////////////
			//END ADD NEW USER TEXT BASED DETAILS PROCESSS - COMPONENT.1
			
			
			
			////////////////////////////////////////////////////////////////////////////////////////////////
			//BEGIN SQL CONNECTION TERMINATION PROCESS
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//establish connection termination
			mysqli_close ( $connection );
			////////////////////////////////////////////////////////////////////////////////////////////////
			//END SQL CONNECTION TERMINATION PROCESS
			////////////////////////////////////////////////////////////////////////////////////////////////
	}
?>