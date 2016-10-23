function sendVerificationCode(email,successFunction)
{
  $.ajax({
              url: 'http://localhost/Freelancer/OurWorks/PHP_API/MARK_1/php/sendVerificationCode.php',
              data: 'email='+email,
              type: 'post',
          success:function(response) {
                   successFunction(response);
              }
    });
}
function verifyCode(code,successFunction)
{
  $.ajax({
              url: 'http://localhost/Freelancer/OurWorks/PHP_API/MARK_1/php/verifyCode.php',
              data: 'code='+code,
              type: 'post',
          success:function(response) {
                   successFunction(response);
              }
    });
}
function resetPass(password,successFunction)
{
  $.ajax({
              url: 'http://localhost/Freelancer/OurWorks/PHP_API/MARK_1/php/resetPassword.php',
              data: 'password='+password,
              type: 'post',
          success:function(response) {
                   successFunction(response);
              }
    });
}
