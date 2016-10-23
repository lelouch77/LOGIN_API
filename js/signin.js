function User(email,password)
 {
	 this.email=email;
	 this.password=password;
 }
 User.prototype.logIn =function(keepme,successFunction)
 {
	 $.ajax({
		          	url: 'http://localhost/Freelancer/OurWorks/PHP_API/MARK_1/php/userSignIn.php',
		          	data: 'email='+this.email+'&password='+this.password+'&needsession='+keepme,
		          	type: 'post',
		   			success:function(response) {
                       successFunction(response);
			          }
			});
 }
 function sessionLogin()
{
  if ($.cookie('USSID')!=null) {
	if($.cookie('USSID').length > 11)
	{
		$.ajax({
		          	url: 'http://localhost/Freelancer/OurWorks/PHP_API/MARK_1/php/sessionSignIn.php',
		          	data: 'sessionkey='+$.cookie('USSID'),
		          	type: 'post',
		   			success:function(response) {
                     loginAction(response);
			          }
			});
		//update login time
		$.ajax({
		          	url: 'http://localhost/Freelancer/OurWorks/PHP_API/MARK_1/php/sessionTimeUpdate.php',
		          	data: 'sessionkey='+$.cookie('USSID'),
		          	type: 'post',
		   			success:function(response) {
			          }
			});
	}
 }
}
function updateCookie(detail,time)
{
	var userDetail=JSON.parse(detail);
	$.cookie("firstName",userDetail.firstname,{expires:time,path:'/'});
	$.cookie("lastName",userDetail.lastname,{expires:time,path:'/'});
	$.cookie("email",userDetail.email,{expires:time,path:'/'});
	$.cookie("USSID",userDetail.sessionkey,{expires:time,path:'/'});
  $.cookie("verified",userDetail.verified,{expires:time,path:'/'});
}
function isEmailExist(email,successFunction)
{
  $.ajax({
              url: 'http://localhost/Freelancer/OurWorks/PHP_API/MARK_1/php/isEmailExist.php',
              data: 'email='+email,
              type: 'post',
          success:function(response) {
                   successFunction(response);
              }
    });
}
