<?php
class Paging_New	
{
	function page_list($limit,$cnt,$url,$maxpages,$arr=array())
	{?>	<div class="paging_admin">
	<?php
		if(isset($_GET['page']))
		{
			$page=mysql_real_escape_string($_GET['page']);
		}
		else
		{
			$page=1;
		}
	    $max=ceil($cnt/$limit);
		if($max > 1){
		?>
<?php	if($page!=1 && $cnt!=0)
		{?>
        <a href="<?php echo $url;?>?page=1<?php if(count($arr)!=0){$this->var_array($arr);}?>" id="paging_first">First</a>
		<a href="<?php echo $url;?>?page=<?php echo ($page-1);if(count($arr)!=0){$this->var_array($arr);}?>">Prev</a>
<?php	}
		if($max<=ceil($maxpages/2))
		{		
			for($i=1;$i<=$max;$i++)
			{
				if($page==$i)
				{	
					?> 
					<a href="<?php echo $url;?>?page=<?php echo $i;if(count($arr)!=0){$this->var_array($arr);}?>" class="paging_admin_active"><b><?php echo $i;?></b></a>
		<?php	}
                else
                {?>
                	<a href="<?php echo $url;?>?page=<?php echo $i;if(count($arr)!=0){$this->var_array($arr);}?>"><?php echo $i;?></a>
		 <?php	}	
     		}
		}
		else
		{
			if(ceil($maxpages/2)<$page)
			{
				if($max<=($page+ceil($maxpages/2)))
				{
					for($i=$page-ceil($maxpages/2);$i<=$max;$i++)
					{
						if($page==$i)
						{	
							?> 
							<a href="<?php echo $url;?>?page=<?php echo $i;if(count($arr)!=0){$this->var_array($arr);}?>"><b><?php echo $i;?></b></a>
				<?php	}
						else
						{?>
							<a href="<?php echo $url;?>?page=<?php echo $i;if(count($arr)!=0){$this->var_array($arr);}?>"><?php echo $i;?></a>
				 <?php	}	
     				}
				}
				else
				{
				for($i=$page-ceil($maxpages/2);$i<=($page+ceil($maxpages/2));$i++)
					{
						if($page==$i)
						{	
							?> 
							<a href="<?php echo $url;?>?page=<?php echo $i;if(count($arr)!=0){$this->var_array($arr);}?>"><u><b><?php echo $i;?></b></u></a>
				<?php	}
						else
						{?>
							<a href="<?php echo $url;?>?page=<?php echo $i;if(count($arr)!=0){$this->var_array($arr);}?>"><?php echo $i;?></a>
				 <?php	}	
     		 		}
				}
			
			}
			else
			{
		
			for($i=1;$i<=($page-1+ceil($maxpages/2));$i++)
				{
					if($page==$i)
					{	
						?> 
						<a href="<?php echo $url;?>?page=<?php echo $i;if(count($arr)!=0){$this->var_array($arr);}?>"><u><b><?php echo $i;?></b></u></a>
			<?php	}
					else
					{?>
						<a href="<?php echo $url;?>?page=<?php echo $i;if(count($arr)!=0){$this->var_array($arr);}?>"><?php echo $i;?></a>
			 <?php	}	
     			}
			
			}
		} 
		if($page!=$max && $cnt!=0)
		{?>	
    	<a href="<?php echo $url;?>?page=<?php echo $page+1;if(count($arr)!=0){$this->var_array($arr);}?>">Next</a>
 		<a href="<?php echo $url;?>?page=<?php echo $max;if(count($arr)!=0){$this->var_array($arr);}?>">Last</a>
  <?php }
		}
  ?>
</div>
<div style="clear:both"></div>
	  <?php
  	}	
		
	function getOffset($limit)
	{
		if(isset($_GET['page']))
		{
			$page=$_GET['page'];
		}
		else
		{
			$page=1;
		}
		$offset=($page-1)*$limit;
	return ($offset);	
	}
	
	function var_array($vars=array())
	{
		foreach($vars as $key => $val)
			{
				echo "&".$key."=".$val;
			}
	}
	
}
?>