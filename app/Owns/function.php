<?php 
	function selCate($data,$parent,$str)
	{
		foreach ($data as $item) {
			$id=$item['id'];
			if($item['parent'] == $parent){
				echo "<option value='".$item['id']."'>".$str.$item['name']."</option>";
				selCate($data,$id,$str."--");
			}
		}
	}

	function getCate($data,$parent,$str)
	{
		foreach ($data as $item) {
			if($item['parent'] == $parent){
				echo "<tr>
					<td>".$str.$item['name']."</td>
					<td>".$item['slug']."</td>";
					if($item['status'] == 0){
						echo "<td><i class='fa fa-check' style='color:green'></i> Enable</td>";
					}else{
						echo "<td><i class='fa fa-close' style='color:red'></i> Disable</td>";
					}
					if($item['parent'] != 0 ){
						echo "<td>
							<a class='btn btn-primary edit' data-click='edit' data-name='".$item['name']."' data-parent='".$item['parent']."' data-status='".$item['status']."' data-id='".$item['id']."' data-toggle='modal' href='#modal-id'><i class='fa fa-edit'></i></a>";
						if(Auth::user()->id == 1){
							echo	"<a class='btn btn-danger' href='".url('delete-danh-muc/'.$item['id'])."' onclick='return confirm(\"Are you sure ?\")'><i class='fa fa-trash'></i></a>
							</td>";
						}
						
					}
				
				echo "</tr>";
				getCate($data,$item['id'],$str."-- | ");
			}
			
		}
	}

	function getCong($data){
		$stt=0;
		foreach ($data as $item) {
			$stt++;
			echo "<tr><td>".$stt."</td>
			<td>".$item['name']."</td>
			<td><a target='_blank' href='https://www.youtube.com/watch?v=".$item['link']."'>Link</a></td>";
			if($item['status'] == 0){
				echo "<td><i class='fa fa-check' style='color:green'></i> Enable</td>";
			}else{
				echo "<td><i class='fa fa-close' style='color:red'></i> Disable</td>";
			}
			echo "<td>
						<a class='btn btn-primary edit' data-click='edit' data-user='".$item['user_id']."' data-name='".$item['name']."' data-status='".$item['status']."' data-id='".$item['id']."' data-mota='".$item['text']."' data-noidung='".$item['noidung']."' data-link='".$item['link']."' data-toggle='modal' href='#modal-id'><i class='fa fa-edit'></i></a>
						<a class='btn btn-danger' href='".url('delete-cong-trinh/'.$item['id'])."' onclick='return confirm(\"Are you sure ?\")'><i class='fa fa-trash'></i></a>
					</td>
				</tr>";
		}
	}

	function getTu($data)
	{
		$stt=0;
		foreach ($data as $item) {
			$stt++;
			echo "<tr>
				<td>".$stt."</td>
				<td>".$item['name']."</td>
				<td>
					<img src='".url('image/upload/'.$item['image'])."' style='width:80px;height:60px;border:1px solid #ccc;cursor:pointer'>
				</td>
				<td>".$item['cat']['name']."</td>";
			if($item['status'] == 0){
				echo "<td><i class='fa fa-check' style='color:green'></i> Enable</td>";
			}else{
				echo "<td><i class='fa fa-close' style='color:red'></i> Disable</td>";
			}	
			echo "<td>
						<a class='btn btn-primary edit' data-click='edit' data-name='".$item['name']."' data-status='".$item['status']."' data-id='".$item['id']."' data-user='".$item['user_id']."' data-mota='".$item['mota']."' data-noidung='".$item['noidung']."' data-img='".$item['image']."' data-toggle='modal' href='#modal-id'><i class='fa fa-edit'></i></a>
						<a class='btn btn-danger' href='".url('delete-tu-van/'.$item['id'])."' onclick='return confirm(\"Are you sure ?\")'><i class='fa fa-trash'></i></a>
					</td>
				</tr>";
		}
	}

	function getSan($data)
	{
		$stt=0;
		foreach ($data as $item) {
			$stt++;
			echo "<tr>
				<td>".$stt."</td>
				<td>".$item['name']."</td>
				<td>
					<a href='".url('image/'.$item['image'])."' class='fancybox' data-fancybox='group-anh1'><img src='".url('image/'.$item['image'])."' style='width:80px;height:60px;border:1px solid #ccc;cursor:pointer'></a>
				</td>
				<td>".$item['cat']['name']."</td>";
			if($item['status'] == 0){
				echo "<td><i class='fa fa-check' style='color:green'></i> Enable</td>";
			}else{
				echo "<td><i class='fa fa-close' style='color:red'></i> Disable</td>";
			}	
			echo "<td>
						<a class='btn btn-primary edit' data-click='edit' data-name='".$item['name']."' data-status='".$item['status']."' data-id='".$item['id']."' data-mota='".$item['mota']."' data-noidung='".$item['noidung']."' data-img='".$item['image']."' data-toggle='modal' href='#modal-id'><i class='fa fa-edit'></i></a>
						<a class='btn btn-danger' href='".url('delete-san-pham/'.$item['id'])."' onclick='return confirm(\"Are you sure ?\")'><i class='fa fa-trash'></i></a>
					</td>
				</tr>";
		}
	}

	function getGT($data)
	{
		foreach ($data as $item) {
			echo "<tr>
				<td><a href='https://www.youtube.com/watch?v=".$item['link']."' target='_blank'>Link</a></td>
				<td>".$item['noidung']."</td>
				<td>
						<a class='btn btn-primary edit' data-click='edit' data-id='".$item['id']."' data-link='".$item['link']."' data-noidung='".$item['noidung']."' data-toggle='modal' href='#modal-id'><i class='fa fa-edit'></i></a>
					</td>
				</tr>";
		}
	}

	function getSlide($data)
	{
		$stt=0;
		foreach ($data as $item) {
			$stt++;
			echo "<tr>
				<td>".$stt."</td>
				<td><a href='".url('image/slide/'.$item['image'])."' class='fancybox' data-fancybox='group-anh2' ><img src='".url('image/slide/'.$item['image'])."' style='width:250px;height:150px'></a></td>";
				if($item['status'] == 0){
					echo "<td><i class='fa fa-check' style='color:green'></i> Enable</td>";
				}else{
					echo "<td><i class='fa fa-close' style='color:red'></i> Disable</td>";
				}
				echo "<td>
						<a class='btn btn-primary edit' data-click='edit' data-id='".$item['id']."' data-name='".$item['name']."' data-noidung='".$item['noidung']."' data-status='".$item['status']."' data-img='".$item['image']."' data-toggle='modal' href='#modal-id'><i class='fa fa-edit'></i></a>
						<a class='btn btn-danger' href='".url('delete-slide/'.$item['id'])."' onclick='return confirm(\"Are you sure ?\")'><i class='fa fa-trash'></i></a>
					</td>
				</tr>";
		}
	}

	function getUser($data)
	{
		$stt=0;
		foreach ($data as $item) {
			$stt++;
			echo "<tr>
			<td>".$stt."</td>
			<td>".$item['name']."</td>
			<td>".$item['email']."</td>";
			echo 	"<td>";

					if(Auth::user()->id == $item['id']){
						echo "<a class='btn btn-primary edit' href='".url('win-edit-user/'.$item['id'])."'><i class='fa fa-edit'></i></a>";
					}
					else{
						if(Auth::user()->id == 1){
							echo "
							<a class='btn btn-danger' href='".url('delete-user/'.$item['id'])."' onclick='return confirm(\"Are you sure ?\")'><i class='fa fa-trash'></i></a>
							<a class='btn btn-info change' title='Change permission'><i class='fa fa-chain-broken'></i></a>"; 
						}
						
					}
					
					
			echo	"</td></tr>";
		}
	}

	function listUser($data)
	{
		foreach ($data as $item) {
			echo "<option value='".$item['id']."'>".$item['name']."</option>";
		}
	}
	function getLienhe($data)
	{
		foreach ($data as $item) {
			echo "<tr>
				<td>".$item['noidung']."</td>
				<td><img src='".url('image/logo/'.$item['logo'])."'></td>
				<td>".$item['face']."</td>";
			echo "<td>
					<a class='btn btn-primary edit' data-click='edit' data-id='".$item['id']."' data-noidung='".$item['noidung']."' data-img='".$item['logo']."' data-face='".$item['face']."' data-toggle='modal' href='#modal-id'><i class='fa fa-edit'></i></a>
				</td>
			</tr>";
		}
	}
	/*function website*/

	function menu($data,$parent)
	{
		foreach ($data as $item) {
			if($item['parent'] == $parent){
				echo "<li><a href='".url('page/'.$item['slug'])."'>".$item['name']."</a><ul>";
					menu($data, $item['id']);
				echo "</li></ul>";
			}
		}
	}

	function slide($data)
	{
		foreach ($data as $item) {
			if($item['status'] == 0){
				if($item['id'] == 1){
					echo "<div class='item active'>
	                    <a href=''><img alt='".$item['name']."' src='".url('image/slide/'.$item['image'])."'></a>
	                </div>";
				}else{
					echo "<div class='item '>
	                    <a href=''><img alt='".$item['name']."' src='".url('image/slide/'.$item['image'])."'></a>  
	                </div>";
				}
			}
		}
	}

 ?>