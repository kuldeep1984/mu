<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo Configure::read('app_name') ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->script('jquery');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');		
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<table>
				<tr>
				  <td width="20%"><img src="/marketunitplanning/img/logo.png" /></td> 
				  <td><h2><?php echo $this->fetch('title'); ?></h2></td>
				</tr>
			  </table>			
		</div>
		<div id="content">
			
			<table>
				<tr>
					<td width="20%">
						<ul>
							<li>
								<?php echo $this->Html->link("Planning Configuration", array("controller"=> "planConfigs", "action" => "index")) ?>
							</li>
						</ul>
					</td>
					<td width="80%">						
						<?php echo $this->Session->flash(); ?>
						<?php echo $this->fetch('content'); ?>
					</td>
				</tr>				
			</table>

		</div>
		
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
