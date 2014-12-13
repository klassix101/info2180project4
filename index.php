<!--DOCTYPE html -->
<!--
	author(s) details : Herbert McNeil(620031539), Amoy Patterson(620058941)
-->

<?php 
	include ( 'data/modules/php/_module.php.header.php' );
	
	include ( 'data/modules/php/_module.entry.initialization.php' );
	include ( 'data/modules/php/_module.entry.validation.php' );
	include ( 'data/modules/php/_module.cheapo.user.adder.php' );
	include ( 'data/modules/php/_module.cheapo.messenger.php' );
	$_SESSION [ 'CURRENT_USER_NAME' ] = "";
?>


<html id = "cheapoBackgroundArea">
	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" href="data/css/template.css" />
		<script src="data/js/jquery.js" type="text/javascript"></script>
		<script src="data/js/jquery.audiotag.js" type="text/javascript"></script>
		<script src="data/js/template.js" type="text/javascript"></script> 
		<link rel="icon" type="image/png" href="data/images/cheapo.favicon.png">
		<!-- <script src="data/js/jquery.audiotag.js" type="text/javascript"></script> -->
	</head>
	
	
	<body>
		
		<div id = "cheapoContentComponentEntity0">
		
			<table>
				<tbody>
					<tr>
						<td class="name" id = "cheapoSignInArea">
							<table id = "cheapoSignInArea">
								<tbody id = "cheapoSignInArea">
									<tr id = "cheapoSignInTitleSegment" >
										<td class = "NormalModernFontClassification" id = "cheapoSignInTitleArea"> 
											SIGN.IN
										</td> 
									</tr>
									
									<form method = "post" >
										<tr id = "cheapoSignInUsernameRetrievalSegment" >
											<td id = "cheapoSignInUsernameRetrievalArea"> 
												<label class ="NormalModernFontClassification" for="name">username?</label> 
											</td> 
											<td id = "cheapoSignInUsernameRetrievalAreaComponent"> 
												<input class = "regularInput" type="text" id="cheapoSignInUsernameRetrievalAreaComponentInput" name = "cheapoSignInUsernameRetrievalAreaComponentName" /> 
											</td> 
										</tr>
										
										<tr id = "cheapoSignInPasswordRetrievalSegment" >
											<td id = "cheapoSignInPasswordRetrievalArea"> 
												<label class ="NormalModernFontClassification" for="name">password?</label> 
											</td> 
											<td id = "cheapoSignInPasswordRetrievalAreaComponent"> 
												<input class = "regularInput" type="password" id="cheapoSignInPasswordRetrievalAreaComponentInput" name = "cheapoSignInPasswordRetrievalAreaComponentName" /> 
											</td> 
										</tr>
										
										<tr id = "cheapoSignInConfirmationButtonSegment" >
											<td class="submit" id = "cheapoSignInConfirmationButtonArea"> 
												<input class = "regularInput" type="submit" value="enter" id="cheapoSignInConfirmationButtonAreaButton" name = "cheapoSignInConfirmationButtonAreaButtonName" />
											</td>
										</tr>
									</form>
								</tbody>
							</table>
						</td>
						

					</tr>
				</tbody>
			</table>
		</div>	

		<div id = "cheapoHomeArea">
			<?php
				$userLoginUsername = $_POST [ 'cheapoSignInUsernameRetrievalAreaComponentName' ];
				$derivedFullUsername = "";
				$userCount = 0;
				
				//generate text cheapo data based on valid login username
				foreach ( $_SESSION [ 'USER_RESULTS' ] as $databaseRecordCollectionItem ) 
				{
					$segmentedDatabaseRecordCollection = explode ( "::", $databaseRecordCollectionItem );
					
					if ( $segmentedDatabaseRecordCollection[4] == $userLoginUsername )
					{
						//establish  current user id/sign in cookie data
							$currentUserId = $segmentedDatabaseRecordCollection[0];
							echo "<script> createCookie ( 'currentCheapoUserId', ".$currentUserId.", 2 ); </script>";  
					
						//establish current user name
							$_SESSION [ 'CURRENT_USER_NAME' ] = $segmentedDatabaseRecordCollection[4];
							
						//show cheapo user title
						echo "<label class ='MediumModernFontClassification' name = 'cheapoWelcomeLabelName' id = 'cheapoWelcomeLabelNameArea' > Welcome : </label> ";
						echo "<label class ='LargeModernFontClassification' name = 'cheapoWelcomeLabelName' id = 'cheapoWelcomeLabelNameArea' > ".$segmentedDatabaseRecordCollection[1]."-".$segmentedDatabaseRecordCollection[2]." </label> ";
						echo  "<input class = 'regularInput' type='submit' value='sign out' id='cheapoSignOutConfirmationButtonAreaButton' name = 'cheapoSignOutConfirmationButtonAreaButtonName' onclick = 'generateSignOutSuccessData ( ); return false;' />";
						
						
						//show cheapo user list tool
						echo "<div id = 'cheapoUserListArea'>";
							echo "<label > ALL CHEAPO MAIL USERS </label>";
							foreach ( $_SESSION [ 'USER_RESULTS' ] as $databaseRecordCollectionItem ) 
							{
								$segmentedDatabaseRecordCollection = explode ( "::", $databaseRecordCollectionItem );
								
								echo "<table>  
										<tbody>
										
											<tr> <td> <label class ='SmallModernFontClassification' name = 'cheapoWelcomeLabelName' id = 'cheapoWelcomeLabelNameArea' > ".$userCount.") </label>  

											<label class ='SmallModernFontClassification' name = 'cheapoWelcomeLabelName' id = 'cheapoWelcomeLabelNameArea' > ".$segmentedDatabaseRecordCollection[1]."-".$segmentedDatabaseRecordCollection[2]."------>(".$segmentedDatabaseRecordCollection[4].") </label> </td> </tr>
										</tbody>
									  </table>";
								
								$userCount ++;
							}
						echo "</div>";
						
						
						//show cheapo user message composition  tool
						echo "<table id = 'cheapoComposeMessageArea'>
								<tbody id = 'cheapoComposeMessageArea'>
									<tr id = 'cheapoComposeMessageTitleSegment' >
										<td class = 'NormalModernFontClassification' id = 'cheapoComposeMessageTitleArea'> 
											<strong> MESSAGE COMPOSER TOOL </strong>
										</td> 
									</tr>
									
									<form method = 'post' >
										<tr id = 'cheapoComposeMessageSubjectRetrievalSegment' >
											<td id = 'cheapoComposeMessageSubjectRetrievalArea'>
												<label class ='NormalModernFontClassification' name = 'cheapoComposeMessageSubjectRetrievalAreaName' id = 'cheapoComposeMessageSubjectRetrievalAreaLabel' >subject? </label> 
											</td> 
											
											<td id='cheapoComposeMessageSubjectRetrievalAreaComponent'> 
												<input class = 'regularInput' type='text' name='cheapoComposeMessageSubjectRetrievalAreaComponentName' id='cheapoComposeMessageSubjectRetrievalAreaComponent' /> 
											</td> 
										</tr>
										
										<tr id = 'cheapoComposeMessageRecipientsRetrievalSegment' >
											<td id = 'cheapoComposeMessageRecipientsRetrievalArea'>
												<label class ='NormalModernFontClassification' name = 'cheapoComposeMessageRecipientsRetrievalAreaName' id = 'cheapoComposeMessageRecipientsRetrievalAreaLabel' >recipients? </label> 
											</td> 
											
											<td id='cheapoComposeMessageRecipientsRetrievalAreaComponent'> 
												<input class = 'regularInput' type='text' name='cheapoComposeMessageRecipientsRetrievalAreaComponentName' id='cheapoComposeMessageRecipientsRetrievalAreaComponent' /> 
											</td> 
										</tr>
										
										<tr>
											<td> <label class ='NormalModernFontClassification' >body?</label>  </td>
											<td> <textarea class = 'regularInput' name = 'cheapoComposeMessageBodyRetrievalAreaComponentName' type = 'text'> </textarea> </td>
										</tr>	
										
										<tr id = 'cheapoComposeMessageConfirmationButtonSegment' >
											<td class='submit' id = 'cheapoComposeMessageConfirmationButtonArea'> 
												<input class = 'regularInput' type='submit' value='enter' name = 'cheapoComposeMessageConfirmationButtonAreaName' id = 'cheapoComposeMessageConfirmationButtonAreaButton' >
											</td>
										</tr>
									</form>
									
								</tbody>
							</table>";
						
						function getUsernameAtId ( $searchId )
						{
							$returnValue = "";
							//generate text cheapo data based on valid login username
							foreach ( $_SESSION [ 'USER_RESULTS' ] as $databaseRecordCollectionItem ) 
							{
								$segmentedDatabaseRecordCollection = explode ( "::", $databaseRecordCollectionItem );
								
								if ( $segmentedDatabaseRecordCollection[0] == $searchId )
									$returnValue = $segmentedDatabaseRecordCollection[4];
							}	
							return $returnValue;
						}

						
						//show cheapo user inbox messages
						$currentUsername = $_SESSION [ 'CURRENT_USER_NAME' ];
						$messageCount = 0;
						$messageCountIndex = 0;
						
						//determine message count before hand
						foreach ( $_SESSION [ 'MESSAGE_RESULTS' ] as $databaseRecordCollectionItem ) 
						{
							$segmentedDatabaseRecordCollection = explode ( "::", $databaseRecordCollectionItem );
							$recipientListString = $segmentedDatabaseRecordCollection [ 6 ];
							
							//if current user name is found in recipient string line
							if ( strpos ( $recipientListString, $currentUsername ) !== false )
							{
								$messageCountIndex ++;
							}
						}
						
						echo "<div id = 'cheapoMessageListArea'>";
							echo "<label > INBOX </label>";
							echo "".$messageCountIndex." message (s)....";
							
							foreach ( $_SESSION [ 'MESSAGE_RESULTS' ] as $databaseRecordCollectionItem ) 
							{
								$segmentedDatabaseRecordCollection = explode ( "::", $databaseRecordCollectionItem );
								$recipientListString = $segmentedDatabaseRecordCollection [ 6 ];
								
								//if current user name is found in recipient string line
								if ( strpos ( $recipientListString, $currentUsername ) !== false )
								{
									$messageCount ++;
									
									echo "<script>
											   generateMessageBodyDisplayerFunction".$messageCount."=function ( )
											   {
												   toggleContent ( 'messageId".$messageCount."', 'block' );
											   }
										  </script>
										  ";
										  
									echo "<script>
											   generateMessageBodyHiderFunction".$messageCount."=function ( )
											   {
												   toggleContent ( 'messageId".$messageCount."', 'none' );
											   }
										  </script>
										  ";
										  
									echo "<table>  
											<tbody>
											
												<tr> <td> <label class ='SmallModernFontClassification' name = 'cheapoWelcomeLabelName' id = 'cheapoMessageTitleIndexArea' > ".$messageCount.") </label>  

												<label class ='SmallModernFontClassification' name = 'cheapoWelcomeLabelName' id = 'cheapoMessageTitleArea' onclick = 'generateMessageBodyDisplayerFunction".$messageCount."( );' > ".$segmentedDatabaseRecordCollection [5]." ..from : ".getUsernameAtId ( $segmentedDatabaseRecordCollection [ 3 ] )."</label> </td> </tr>
											</tbody>
										  </table>";
										  
									echo "<div id = 'messageId".$messageCount."' style = 'display:none; padding-bottom:30px;' onclick = 'generateMessageBodyHiderFunction".$messageCount."( );' >";
										echo "<table>  
												<tbody>
													
														<tr> <td> <label' class ='SmallModernFontClassification' name = 'cheapoWelcomeLabelName' id = 'cheapoMesssageBodyArea' > message : ".$segmentedDatabaseRecordCollection [4]." </label> </td> </tr>
													
														<tr> <td> <label' class ='SmallModernFontClassification' name = 'cheapoWelcomeLabelName' id = 'cheapoMesssageBodyArea' > date : ".$segmentedDatabaseRecordCollection [2]." </label> </td> </tr>
														
												</tbody>
											  </table>";
									echo "</div>";
								}
							}
							
							if ( $messageCount < 0 )
								echo "you have 0 messages";
							else 
								echo "you have ".$messageCount." message (s)";				
								
						echo "</div>";
						
						//add cheapo user
						if ( $userLoginUsername == 'admin' )
						{
							echo "<table id = 'cheapoSignUpArea'>
									<tbody id = 'cheapoSignUpArea'>
										<tr id = 'cheapoSignUpTitleSegment' >
											<td class = 'NormalModernFontClassification' id = 'cheapoSignUpTitleArea'> 
												ADD.USER 
											</td> 
										</tr>
										
										<form method = 'post' >
											<tr id = 'cheapoSignUpFirstNameRetrievalSegment' >
												<td id = 'cheapoSignUpFirstNameRetrievalArea'>
													<label class ='NormalModernFontClassification' name = 'cheapoSignUpFirstNameRetrievalAreaName' id = 'cheapoSignUpFirstNameRetrievalAreaLabel' >firstname? </label> 
												</td> 
												
												<td id='cheapoSignUpFirstNameRetrievalAreaComponent'> 
													<input class = 'regularInput' type='text' name='cheapoSignUpFirstNameRetrievalAreaComponentName' id='cheapoSignUpFirstNameRetrievalAreaComponent' /> 
												</td> 
											</tr>
											
											<tr id = 'cheapoSignUpLastNameRetrievalSegment' >
												<td id = 'cheapoSignUpLastNameRetrievalArea'>
													<label class ='NormalModernFontClassification' name = 'cheapoSignUpLastNameRetrievalAreaName' id = 'cheapoSignUpLastNameRetrievalAreaLabel' >lastname? </label> 
												</td> 
												
												<td id='cheapoSignUpLastNameRetrievalAreaComponent'> 
													<input class = 'regularInput' type='text' name='cheapoSignUpLastNameRetrievalAreaComponentName' id='cheapoSignUpLastNameRetrievalAreaComponent' /> 
												</td> 
											</tr>
											
											<tr id = 'cheapoSignUpUserNameRetrievalSegment' >
												<td id = 'cheapoSignUpUserNameRetrievalArea'>
													<label class ='NormalModernFontClassification' name = 'cheapoSignUpUserNameRetrievalAreaName' id = 'cheapoSignUpUserNameRetrievalAreaLabel' >username? </label> 
												</td> 
												
												<td id='cheapoSignUpUserNameRetrievalAreaComponent'> 
													<input class = 'regularInput' type='text' name='cheapoSignUpUserNameRetrievalAreaComponentName' id='cheapoSignUpUserNameRetrievalAreaComponent' /> 
												</td> 
											</tr>
											
											<tr id = 'cheapoSignUpUserPasswordRetrievalSegment' >
												<td id = 'cheapoSignUpUserPasswordRetrievalArea'>
													<label class ='NormalModernFontClassification' name = 'cheapoSignUpUserPasswordRetrievalAreaName' id = 'cheapoSignUpUserPasswordRetrievalAreaLabel'>password?</label> 
												</td> 
												
												<td id='cheapoSignUpUserPasswordRetrievalAreaComponent'> 
													<input class = 'regularInput' type='password' name='cheapoSignUpUserPasswordRetrievalAreaComponentName' id='cheapoSignUpUserPasswordRetrievalAreaComponentInput' /> 
												</td> 
											</tr>
											
											<tr id = 'cheapoSignUpConfirmationButtonSegment' >
												<td class='submit' id = 'cheapoSignUpConfirmationButtonArea'> 
													<input class = 'regularInput' type='submit' value='enter' name = 'cheapoSignUpConfirmationButtonAreaName' id = 'cheapoSignUpConfirmationButtonAreaButton' >
												</td>
											</tr>
										</form>
										
									</tbody>
								</table>";
						}
					}
				}
			?>
		</div>

		
		<script type="text/javascript">	
			function generateSignInSuccessData ( )
			{
				toggleContent ( 'cheapoSignInArea', 'none' );
				toggleContent ( 'cheapoHomeArea', 'block' );
			}
			function generateSignOutSuccessData ( )
			{
				toggleContent ( 'cheapoSignInArea', 'block' );
				toggleContent ( 'cheapoHomeArea', 'none' );
			}
			function generateGenericResponse ( genericValue )
			{
				alert ( "generic value >> " + genericValue );
			}
			
			<?php	
				generateCheapoEntryValidationProcess ( );
				generateCheapoUserAdditionProcess ( );
				generateCheapoUserMessagingProcess ( );
			?>
		</script>
	</body>
</html>