<?php
	
if (!defined("IndexLoaded"))
{	die("Acceso incorrecto");}
	function login($usuario, $password) 
	{
		$mysqli = DB::conectar();
		// Using prepared statements means that SQL injection is not possible. 
		if ($stmt = $mysqli->prepare("	SELECT idUsuario, password, nombreUsuario, idRol 
										FROM usuario
										WHERE nombreUsuario = ?
										LIMIT 1")) 
		{
			$stmt->bind_param('s', $usuario); 
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($user_id, $db_password, $usuario, $idRol);
			$stmt->fetch();
			if ($stmt->num_rows == 1) 
			{
				// Check if the password in the database matches
				// the password the user submitted.
				if ($db_password == $password) {
					// Password is correct!
					// Get the user-agent string of the user.
					$user_browser = $_SERVER['HTTP_USER_AGENT'];
					// XSS protection as we might print this value
					$user_id = preg_replace("/[^0-9]+/", "", $user_id);
					$_SESSION['user_id'] = $user_id;
					// XSS protection as we might print this value
					$usuario = preg_replace("/[^a-zA-Z0-9_\-]+/", 
																"", 
																$usuario);
					$_SESSION['usuario'] = $usuario;
					$_SESSION['login_string'] = hash('sha512', 
							  $password . $user_browser);
					// Login successful.
					return true;
				} else {
					// Password is not correct
					return false;
				}
			}
        } else {
            // No user exists.
            return false;
        }
		
		DB::desconectar($mysqli);
    }
	function sec_session_start() 
	{
		$session_name = 'sec_session_id';   // Set a custom session name
		$secure = false;
		// This stops JavaScript being able to access the session id.
		$httponly = true;
		// Forces sessions to only use cookies.
		if (ini_set('session.use_only_cookies', 1) === FALSE) {
			View::load("error.php",Array(error => "No se pudo iniciar una session segura"));
			exit();
		}
		// Gets current cookies params.
		$cookieParams = session_get_cookie_params();
		session_set_cookie_params($cookieParams["lifetime"],
			$cookieParams["path"], 
			$cookieParams["domain"], 
			$secure,
			$httponly);
		// Sets the session name to the one set above.
		session_name($session_name);
		session_start();            // Start the PHP session 
		session_regenerate_id();    // regenerated the session, delete the old one. 
	}
	function login_check($idRol = null) 
	{
		$mysqli = DB::conectar();
		// Check if all session variables are set 
		if (isset(	$_SESSION['user_id'], 
					$_SESSION['usuario'], 
					$_SESSION['login_string'])) {
	 
			$user_id = $_SESSION['user_id'];
			$login_string = $_SESSION['login_string'];
			$usuario = $_SESSION['usuario'];
	 
			// Get the user-agent string of the user.
			$user_browser = $_SERVER['HTTP_USER_AGENT'];
	 
			if ($stmt = $mysqli->prepare("SELECT password, idRol 
										  FROM usuario 
										  WHERE idUsuario = ? LIMIT 1")) {
				// Bind "$user_id" to parameter. 
				$stmt->bind_param('i', $user_id);
				$stmt->execute();   // Execute the prepared query.
				$stmt->store_result();
	 
				if ($stmt->num_rows == 1) {
					// If the user exists get variables from result.
					$stmt->bind_result($password,$db_idRol);
					$stmt->fetch();
					$login_check = hash('sha512', $password . $user_browser);
					if (!is_null($idRol) and $idRol < $db_idRol)
					{	return false;}//No alcanza el rol					
					elseif ($login_check == $login_string) {
						// Logged In!!!! 
						return true;
					} else {
						// Not logged in 
						return false;
					}
				} else {
					// Not logged in 
					return false;
				}
			} else {
				// Not logged in 
				return false;
			}
		} else {
			// Not logged in 
			return false;
		}
		DB::desconectar($mysqli);
	}
	
	?>