function phpSessionCheck()
{
	$.ajax({
		          	url: 'http://localhost/Freelancer/OurWorks/PHP_API/MARK_1/php/sessionCheck.php',
		          	type: 'post',
		   			success:function(response) {
						phpSessionExist(response);
			          }
			});
}
