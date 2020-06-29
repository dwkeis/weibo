<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Sign Up Confirmation Page</title>
</head>
<body>
  <h1>Thanks for register in WeiBo App !</h1>

  <p>
    Click the link below to finish register :
    <a href="{{ route('confirm_email', $user->activation_token) }}">
      {{ route('confirm_email', $user->activation_token) }}
    </a>
  </p>

  <p>
    Ignore it if you didn't do this.
  </p>
</body>
</html>