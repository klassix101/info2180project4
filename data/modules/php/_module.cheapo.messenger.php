<!--DOCTYPE html -->
<!--
	author(s) details :Herbert McNeil, Amoy Patterson
--->
<?php
	//session_start(); 
	
	function generateCheapoUserMessagingProcess ( )
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
				
			if ( !empty ( $_POST [ 'cheapoComposeMessageConfirmationButtonAreaName' ] ) )
			{	
				//establish html sign in input components, with respect to php 
				$newMessageReadStatus = "no";
				$newMessageDateStamp = date('Y-m-d H:i:s');
				$senderId = $_COOKIE [ 'currentCheapoUserId' ];
				$newMessageBody = $_POST [ 'cheapoComposeMessageBodyRetrievalAreaComponentName' ];
				$newMessageSubject = $_POST [ 'cheapoComposeMessageSubjectRetrievalAreaComponentName' ];
				$newMessageRecipientIds = $_POST [ 'cheapoComposeMessageRecipientsRetrievalAreaComponentName' ];
				
				//establish results from database
				$connection -> query ("insert into message(id, read_status, date_stamp, user_id, body, subject, recipient_ids) values ('', '$newMessageReadStatus', '$newMessageDateStamp', '$senderId', '$newMessageBody', '$newMessageSubject', '$newMessageRecipientIds')");
				
				echo "generateSignInSuccessData ( );";
				echo 'generateGenericResponse ( "cheapo mailed!" )';
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