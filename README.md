# LOGIN_API
Simple user login and signup API using PHP and JS with keepme signin option and session table, automatic mail for verification and 
forgot password.

<h2>For Signing in</h2>
 
		function login()
		{
			 var user=new User(<username>,<password>);
			 var keepme='FALSE';//For keepme signed in.
				  if($('#keepMeLogin').is(":checked"))
				  {
					  keepme='TRUE';
				  }
			 user.logIn(keepme,loginAction);
		}
    
<h2>For Signing Up</h2>
		function logup()
		{
			 var record=new Record(<firstname>,<lastname>,<email>,<password>,true);
			 record.register(signUpAction);
		}
		

<h2>Licence</h2>

<h4>MIT Licence</h4>

Enjoy :)
