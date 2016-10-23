function signOut()
{
	$.ajax({
		          	url: 'http://localhost/Freelancer/OurWorks/PHP_API/MARK_1/php/userSignOut.php',
		          	data: 'sessionkey='+$.cookie('USSID'),
		          	type: 'post',
		   			success:function(response) {
			          }
			});

			$.removeCookie('USSID', { path: '/' });
			$.removeCookie('PHPSESSID', { path: '/' });
			  window.open('../','_self');
}
