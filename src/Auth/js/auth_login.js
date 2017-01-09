function login()
{
  var result     = document.getElementById('login_result');
  var username   = document.getElementById('login_username');
  var password   = document.getElementById('login_password');
  var u          = username.value;
  var p          = password.value;
  username.value = null;
  password.value = null;
  var xhr        = new XMLHttpRequest();
  xhr.open('POST', 'utils/View.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload     = function()
  {
    if(this.readyState == 4)
    {
      if(this.responseText == 'true')
      {
        result.innerHTML = '<b>logged in.</b>';
        /*do stuff*/
      }
      else
      {
        result.innerHTML = '<b>the account is not registered or you have entered invalid credentials.</b>';
        /*do other stuffZ*/
      }
    }
  };
  xhr.send('action=login&username=' + u + '&password=' + p);
}
