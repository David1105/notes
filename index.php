<?php
    require_once('main.html');
	$mysqli = mysqli_connect("127.0.0.1", "root", "", "webtech");
	$mysqli->set_charset("utf8");
	$mid = $_GET["mid"];
	$result = $mysqli->query("SELECT *
		FROM notes
		WHERE uid = '1' AND mid = '".$mid."'
		ORDER BY date DESC;");
	$mysqli->close();
	echo '
	<div class="scrollable-content" ui-scroll-bottom="bottomReached()">
		<div class="list-group">
			<ul id="menu-items">';
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
	';
	echo '<a href="/editorf/?mid='.$mid.'&id=0"><img width=50% src="/img/folder.gif" alt="создать папку"></a><a href="/editor/?mid='.$mid.'&id=0"><img width=50% src="/img/note.gif" alt="создать заметку"></a>';
    require_once('bottom.html');
?>