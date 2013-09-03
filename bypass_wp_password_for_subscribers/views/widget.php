<?php if (!(current_user_can('level_0'))){ ?>
<form id="login" class="pure-form pure-form-stacked" action="<?php echo network_site_url('/wp-content/plugins/ondesign-login/login.php'); ?>" method="post">
    <h1>Log In</h1>
    <fieldset>
        <input id="username" name="username" type="text" placeholder="Username">
        <input type="submit" id="submit" class="pure-button pure-button-primary" value="Log in">
    </fieldset>
</form>
<?php } else { ?>
<div id="login">
	<h1>Logout</h1>
	<?php global $current_user;
	      get_currentuserinfo();
	      echo '<p>Howdy, ' . $current_user->display_name . "</p>";
	?>

	<a id="#logout" class="pure-button" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>

	<br>

	<a id="#my_profile" class="pure-button" href="<?php echo home_url( '/wp-admin/profile.php' ) ?>">My Profile</a>
</div>
<?php }?>