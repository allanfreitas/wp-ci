<h3>Simple Stuff</h3>

<p>
	<?php
		$code = "link_to('action');";
		dump_code($code);
		eval($code);
	?>
</p>

<p>
	<?php
		$code = "link_to('controller/action');";
		dump_code($code);
		eval($code);
	?>
</p>

<p>
	<?php
		$code = "link_to('application/controller/action');";
		dump_code($code);
		eval($code);
	?>
</p>

<p>
	<?php
		$code = "link_to('application/controller/action/param1');";
		dump_code($code);
		eval($code);
	?>
</p>

<p>
	<?php
		$code = "link_to('application/controller/action/param1/value with spaces');";
		dump_code($code);
		eval($code);
	?>
</p>

<h3>Protocols and Relative Notation</h3>

<p>
	<?php
		$code = "link_to('front://application/controller/action');";
		dump_code($code);
		eval($code);
	?>
</p>

<p>
	<?php
		$code = "link_to('back://application/controller/action');";
		dump_code($code);
		eval($code);
	?>
</p>

<p>
	<?php
		$code = "link_to('secure://application/controller/action');";
		dump_code($code);
		eval($code);
	?>
</p>

<p>
	<?php
		$code = "link_to('front+secure://application/controller/action');";
		dump_code($code);
		eval($code);
	?>
</p>

<p>
	<?php
		$code = "link_to('back+secure://application/controller/action');";
		dump_code($code);
		eval($code);
	?>
</p>

<p>
	<?php
		$code = "link_to('../application/controller/action');";
		dump_code($code);
		eval($code);
	?>
</p>

<p>
	<?php
		$code = "link_to('front://../application/controller/action');";
		dump_code($code);
		eval($code);
	?>
</p>

<p>
	<?php
		$code = "link_to('back://../application/controller/action');";
		dump_code($code);
		eval($code);
	?>
</p>

<p>
	<?php
		$code = "link_to('front+secure://../application/controller/action');";
		dump_code($code);
		eval($code);
	?>
</p>

<p>
	<?php
		$code = "link_to('back+secure://../application/controller/action');";
		dump_code($code);
		eval($code);
	?>
</p>

<h3>Forms</h3>

<h4>action</h4>
<p>
	<?php
		$code = "return form_open('action').'</form>';";
		dump_code($code);
		dump_code(eval($code));
	?>
<p>
	
	

<h4>action with id attribute</h4>
<p>
	<?php
		$code = "return form_open('action', 'id=\"myform\"').'</form>';";
		dump_code($code);
		dump_code(eval($code));
	?>
<p>
	
<h4>action with hidden parameters</h4>
<p>
	<?php
		$code = "return form_open('action', '', array('foo' => 'bar')).'</form>';";
		dump_code($code);
		dump_code(eval($code));
	?>
<p>

<h4>controller/action</h4>
<p>
	<?php
		$code = "return form_open('controller/action').'</form>';";
		dump_code($code);
		dump_code(eval($code));
	?>
<p>
	
<h4>secure controller/action</h4>
<p>
	<?php
		$code = "return form_open('+secure://controller/action').'</form>';";
		dump_code($code);
		dump_code(eval($code));
	?>
<p>

	
<h4>application/controller/action</h4>
<p>
	<?php
		$code = "return form_open('application/controller/action').'</form>';";
		dump_code($code);
		dump_code(eval($code));
	?>
<p>

<h4>application/controller/action/param1</h4>
<p>
	<?php
		$code = "return form_open('application/controller/action/param1').'</form>';";
		dump_code($code);
		dump_code(eval($code));
	?>
<p>
	
<h4>back-end</h4>
<p>
	<?php
		$code = "return form_open('back://application/controller/action/param1').'</form>';";
		dump_code($code);
		dump_code(eval($code));
	?>
<p>
	
<h4>back-end, method=get</h4>
<p>
	<?php
		$code = "return form_open('back://application/controller/action/param1', 'method=\"get\"').'</form>';";
		dump_code($code);
		dump_code(eval($code));
	?>
<p>