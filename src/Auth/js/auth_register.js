function register()
{
  var result     = document.getElementById('register_result');
  var username   = document.getElementById('register_username');
  var password   = document.getElementById('register_password');
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
        result.innerHTML = '<b>registered.</b>';
        /*do stuff*/
      }
      else
      {
        result.innerHTML = '<b>the account is already registered.</b>';
        /*do other stuffZ*/
      }
    }
  };
  xhr.send('action=register&username=' + u + '&password=' + p);
}
