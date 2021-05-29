<?php
    require_once('main.html');
	$mid = $_GET["mid"];
	$id = $_GET["id"];
	$mysqli = mysqli_connect("127.0.0.1", "root", "", "webtech");
	$mysqli->set_charset("utf8");
	$result = $mysqli->query("SELECT * 
    FROM notes
	WHERE uid = '1' AND id = '".$id."';");
	$row = $result->fetch_assoc();
	$text = $row['note'];
	$mysqli->close();
	echo '						<li><form action="delete.php" method="post">
								<input type="hidden" name="id" value="'.$id.'">
								<button class="menu-item">Удалить</button>
							</form></li>
						</ul>
				</div>
				</h3>
			</div>
		</div>';
    require_once('app.html');
	echo '<!-- App Body -->
            <div class="app-body" ng-class="{loading: loading}">
                <div ng-show="loading" class="app-content-loading">
                    <i class="fa fa-spinner fa-spin loading-spinner"></i>
                </div>
                <div class="app-content">
                    <div class="scrollable">
                        <div class="scrollable-content">
                            <div class="section">
                                <div class="panel-body">
									<form method="post" action="save.php">								<input type="hidden" name="id" value='.$id.'>
										<input type="hidden" name="mid" value='.$mid.'>
										<textarea rows="15" width=10% name="text" placeholder="Введите текст заметки" style="overflow-x:hidden;">'.$text.'</textarea>
										<div class="navbar-absolute-bottom">
											<center><button type="submit"
													ui-turn-on="modal1"
													class="btn btn-default">Сохранить</button>
													<div onclick="history.back(-1)"
													class="btn btn-default">Вернуться</div>
											</center>
										</div>
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ~ .app -->
        <div ui-yield-to="modals"></div>
    </body>
</html>';
?>