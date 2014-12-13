<?php
	session_start(); 
	/* author(s) details : Herbert McNeil, Amoy Patterson*/
	
	//establish database connection requirements
		//estabish database connection requirements
		$_SESSION [ 'dbHost' ] = 'localhost';
		$_SESSION [ 'dbUsername' ] = 'root';
		$_SESSION [ 'dbPassword' ] = '';
		$_SESSION [ 'dbName' ] = 'cheapomail';
		
		
	//establish validation requriements
		//establish php array of database content
		$userDerivedDatabaseRecordCollection = array ( );
		$userDerivedMessageDatabaseRecordCollection = array ( );
		
	//establish processes
		//establish database connection
		//connection to the database
		$connection = mysqli_connect ( $_SESSION [ 'dbHost' ], $_SESSION [ 'dbUsername' ], $_SESSION [ 'dbPassword' ], $_SESSION [ 'dbName' ] );

		//establish connection verification
		if ( mysqli_connect_errno ( ) )
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error ( );
		}

		//establish results from database
		$userResults = mysqli_query ( $connection,"select * from user" );
		$messageResults = mysqli_query ( $connection,"select * from message" );
		
		while ( $userRow = mysqli_fetch_array ( $userResults ) )
			array_push ( $userDerivedDatabaseRecordCollection, $userRow [ 'id' ].'::'.$userRow [ 'firstname' ].'::'.$userRow [ 'lastname' ].'::'.$userRow [ 'password' ].'::'.$userRow [ 'username' ] );

		while ( $messageRow = mysqli_fetch_array ( $messageResults ) )
			array_push ( $userDerivedMessageDatabaseRecordCollection, $messageRow [ 'id' ].'::'.$messageRow [ 'read_status' ].'::'.$messageRow [ 'date_stamp' ].'::'.$messageRow [ 'user_id' ].'::'.$messageRow [ 'body' ].'::'.$messageRow [ 'subject' ].'::'.$messageRow [ 'recipient_ids' ] );
	
		//establish session variables as accumilation of records from database
		$_SESSION [ 'USER_RESULTS' ] = $userDerivedDatabaseRecordCollection;
		$_SESSION [ 'MESSAGE_RESULTS' ] = $userDerivedMessageDatabaseRecordCollection;
		
		/*
		//establish user specific session variables to hold derived data
		foreach ( $_SESSION [ 'USER_RESULTS' ] as $databaseRecordCollectionItem ) 
		{
			$segmentedDatabaseRecordCollection = explode ( "::", $databaseRecordCollectionItem ); 
			echo '{'.$segmentedDatabaseRecordCollection[1].'}  |  ';
		}
		*/
		
		
		//establish connection termination
		mysqli_close ( $connection );
?>