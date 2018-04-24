<?php

class htmlHelper
{
	public function FormBegin($method = "post", $action = "", $attribute= "")
	{
		print '<form method="'.$method.'" action="'.$action.'" '.$attribute.' enctype="multipart/form-data">';
	}
	
	
	public function FormEnd()
	{
		print '</form>';
	}
	
	public function Text($name, $value = "", $error = "")
	{
		print '<div class="form-group">
			<label>'.ucwords(str_replace("[]", "", $name)).'</label>
			<input type="text" class="form-control" name="'.$name.'" value="'.$value.'"/>
			<span class="error" id="e'.$name.'">'.$error.'</span>
		</div>';
	}
	
	public function File($name, $error = "")
	{
		print '<div class="form-group">
			<label>'.ucwords(str_replace("[]", "", $name)).'</label>
			<input type="file" class="form-control" name="'.$name.'"/>
			<span class="error" id="e'.$name.'">'.$error.'</span>
		</div>';
	}
	
	public function Password($name, $value = "", $error = "")
	{
		print '<div class="form-group">
			<label>'.ucwords($name).'</label>
			<input type="password" class="form-control" name="'.$name.'" value="'.$value.'"/>
			<span class="error" id="e'.$name.'">'.$error.'</span>
		</div>';
	}
	
	public function Date($name, $value = "", $error = "")
	{
		print '<div class="form-group">
			<label>'.ucwords($name).'</label>
			<input type="date" class="form-control" name="'.$name.'" value="'.$value.'"/>
			<span class="error" id="e'.$name.'">'.$error.'</span>
		</div>';
	}
	
	public function TextArea($name, $value = "", $error = "")
	{
		print '<div class="form-group">
			<label>'.ucwords($name).'</label>
			<textarea class="form-control" name="'.$name.'">'.$value.'</textarea>
			<span class="error" id="e'.$name.'">'.$error.'</span>
		</div>';
	}
	
	public function Select($name, $table, $value = "", $error = "")
	{
		print '<div class="form-group">
			<label>'.ucwords(str_replace("id", "", strtolower($name))).'</label>
			<select class="form-control" name="'.$name.'">
				<option value="0">Select</option>';
		
		foreach($table as $row)
		{
			if($row["id"] == $value)
			{
				print '<option value="'.$row["id"].'" selected>'.$row["name"].'</option>';
			}
			else{
				print '<option value="'.$row["id"].'">'.$row["name"].'</option>';
			}
		}
		
		print '</select>
			<span class="error" id="e'.$name.'">'.$error.'</span>
		</div>';
	}
	
	
	public function Submit($name = "submit", $value = "Submit")
	{
		print '<input type="submit" name="'.$name.'" class="btn btn-primary mb-2" value="'.$value.'"/>';
	}
	
	public function Table($table, $controller, $replaceColumn = "", $replaceValue = "")
	{
		print "<table>";
		$i = 0;
		foreach($table as $row)
		{
			if($i <= 0)
			{
				print "<tr>";
				foreach($row as $k=>$v)
				{
					if(strtolower($k) != "id")
						print "<th>".ucwords($k)."</th>";
				}
				print "<th>#</th></tr>";
			}
			
			print "<tr>";
			
			foreach($row as $k=>$v)
			{
				if(strtolower($k) != "id")
				{
					if($k == $replaceColumn)
					{
						print "<td>".str_replace("#replace#", $v, $replaceValue)."</td>";
					}
					else
					{
						print "<td>".$v."</td>";
					}
				}
			}
			
			print "<td>
				<a href=\"?controller=".$controller."&view=edit&id=".$row["id"]."\">Edit</a>
				<a href=\"?controller=".$controller."&id=".$row["id"]."\">Delete</a>
			</td>";
			print "</tr>";
			$i++;
		}
		print "</table>";
	}
	
	
	public function Error($message)
	{
		print '<span class="error">'.$message.'</span>';
	}
	
	public function ErrorBlock($message)
	{
		print '<div class="error">'.$message.'</div>';
	}
	
	public function Success($message)
	{
		print '<span class="success">'.$message.'</span>';
	}
	
	public function SuccessBlock($message)
	{
		print '<div class="success">'.$message.'</div>';
	}
	
	public function BlockLink($link, $text)
	{
		print '<a href="'.$link.'" class="blockLink">'.$text."</a>\n";
	}
	
}


?>


