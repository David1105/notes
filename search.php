<?php
    require_once('main.html');
	$mysqli = mysqli_connect("127.0.0.1", "root", "", "webtech");
	$mysqli->set_charset("utf8");
	$mid = 0;
	$result = $mysqli->query("SELECT *
		FROM notes
		WHERE uid = '1' AND note LIKE '%".$_POST['search']."%'
		ORDER BY date DESC;");
	echo '
	<div class="scrollable-content" ui-scroll-bottom="bottomReached()">
		<div class="list-group">
			<ul id="menu-items">';
	$k = 0;
	while ($row = $result->fetch_assoc()) {
		$location = "";
		if ($row["mid"] != 0) {
			$nmid = $row["mid"];
			$s = 0;
			while ($nmid > 0 AND $s < 3) {
				$fres = $mysqli->query("SELECT *
				FROM notes
				WHERE uid = '1' AND id = '".$nmid."';");
				$folder = $fres->fetch_assoc();
				if ($nmid == $row["mid"])
					$location = ' <a href="/editorf/?id='.$folder["id"].'"><img width="2%" src="/img/next.gif"> <u>'.mb_strimwidth($folder["note"], 0, 12, "...").'</u></a>'.$location;
				else 
					$location = ' <a href="/?mid='.$folder["id"].'"><img width="2%" src="/img/next.gif"> '.mb_strimwidth($folder["note"], 0, 12, "...").'</a>'.$location;
				$nmid = $folder["mid"];
				$s = $s + 1;
			}
			if ($nmid > 0)
				$location = '...'.$location;
			echo '<li><div style="background:#E9E9E9;">'.$location.'</div></li>';
		}
		if ($row["folder"] == 0) {
			echo '<li><a class="list-group-item" href="/editor/?mid='.$row["mid"].'&id='.$row["id"].'"><img width="15%" src="/img/listNote.gif">'.mb_strimwidth($row["note"], 0, 30, "...").'</a></li>';
		} else {
			echo '<li><a class="list-group-item" href="/?mid='.$row["id"].'"><img width="15%" src="/img/listFolder.gif">'.mb_strimwidth($row["note"], 0, 30, "...").'</a></li>';		
		}
		$k = 1;
	}
	if ($k == 0)
		echo '<li><a class="list-group-item" href="">Ничего не найдено по данному запросу</a></li>';		
	echo '
			</ul>
		</div>
	</div>
	</div>
        </div>
			</div>
			<!-- ~ .app -->
			<div ui-yield-to="modals"></div>
				<div class="modal" ui-if="modal1" ui-shared-state="modal1">
				<div class="modal-backdrop in"></div>
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button class="close" 
								ui-turn-off="modal1">&times;</button>
						</div>
						<div class="modal-body">
	';
	echo '<a href="/editorf/?mid='.$mid.'&id=0"><img width=50% src="/img/folder.gif" alt="создать папку"></a><a href="/editor/?mid='.$mid.'&id=0"><img width=50% src="/img/note.gif" alt="создать заметку"></a>';
    require_once('bottom.html');
	$mysqli->close();
?>