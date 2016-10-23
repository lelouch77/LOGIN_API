function Record(firstname,lastname,email,password,sendemail)
 {
	 this.email=email;
	 this.firstname=firstname;
	 this.lastname=lastname;
	 this.password=password;
   this.sendemail=sendemail;
 }
 Record.prototype.register=function(successFunction)
 {
	 $.ajax({
		          	url: 'http://localhost/Freelancer/OurWorks/PHP_API/MARK_1/php/userSignUp.php',
		          	data: 'email='+this.email+'&password='+this.password+'&firstname='+this.firstname+'&lastname='+this.lastname,
		          	type: 'post',
		   			success:function(response) {
                       successFunction(response);
			          }
			});
      if(this.sendemail)
      {
        var name=this.firstname+' '+this.lastname;
        sendVerificationEmail(this.email,name);
      }
 }
 function sendVerificationEmail(email,name)
 {
   $.ajax({
                url: 'http://localhost/Freelancer/OurWorks/PHP_API/MARK_1/php/sendVerificationEmail.php',
                data: 'email='+email+'&name='+name,
                type: 'post',
            success:function(response) {
                         alert(response);
                }
      });
 }
