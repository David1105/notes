<?php
    require_once('top.html');
	$mysqli = mysqli_connect("127.0.0.1", "root", "", "webtech");
	$mysqli->set_charset("utf8");
	if (isset($_GET["mid"]))
		$mid = $_GET["mid"];
	else
		$mid = 0;
	$result = $mysqli->query("SELECT *
		FROM notes
		WHERE uid = '1' AND mid = '".$mid."'
		ORDER BY date DESC;");
	echo '
	<div class="scrollable-content" ui-scroll-bottom="bottomReached()">
		<div class="list-group">
			<ul id="menu-items">';
	if ($mid != 0) {
		$back = ' <a href="/"><img width="2%" src="/img/next.gif"> Главная</a>';
		$nmid = $mid;
		$location = "";
		$s = 0;
		while ($nmid > 0 AND $s < 2) {
			$fres = $mysqli->query("SELECT *
			FROM notes
			WHERE uid = '1' AND id = '".$nmid."';");
			$folder = $fres->fetch_assoc();
			if ($nmid == $mid)
				$location = ' <a href="/editorf/?id='.$folder["id"].'"><img width="2%" src="/img/next.gif"> <u>'.mb_strimwidth($folder["note"], 0, 12, "...").'</u></a>'.$location;
			else 
				$location = ' <a href="/?mid='.$folder["id"].'"><img width="2%" src="/img/next.gif"> '.mb_strimwidth($folder["note"], 0, 12, "...").'</a>'.$location;
			$nmid = $folder["mid"];
			$s = $s + 1;
		}
		if ($nmid > 0)
			$location = '<img width="2%" src="/img/next.gif">..'.$location;
		$location = $back.$location;
		echo '<li><div style="background:#E9E9E9;" href="">'.$location.'</div></li>';
	}
	$mysqli->close();
	while ($row = $result->fetch_assoc()) {
		if ($row["folder"] == 0) {
			echo '<li><a class="list-group-item" href="/editor/?mid='.$row["mid"].'&id='.$row["id"].'"><img width="15%" src="/img/listNote.gif">'.mb_strimwidth($row["note"], 0, 30, "...").'</a></li>';
		} else {
			echo '<li><a class="list-group-item" href="/?mid='.$row["id"].'"><img width="15%" src="/img/listFolder.gif">'.mb_strimwidth($row["note"], 0, 30, "...").'</a></li>';		
		}
	}
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
							<a href="/editorf/create.php?mid='.$mid.'&id=0"><img width=50% src="/img/folder.gif" alt="создать папку"></a>
							<a href="/editor/?mid='.$mid.'&id=0"><img width=50% src="/img/note.gif" alt="создать заметку"></a>
							<p align="left" style="color:grey;">создать папку</p><p align="right" style="color:grey;">создать заметку</p>
						</div>
					</div>
				</div>
			</div>
		</body>
	</html>';
?>