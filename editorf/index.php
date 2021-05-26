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
	echo '								<input type="hidden" name="id" value='.$id.'>
										<input type="hidden" name="mid" value='.$mid.'>
										<textarea rows="15" width=100% name="text" placeholder="Введите текст заметки">'.$text.'</textarea>
										<div class="navbar-absolute-bottom">
											<center><button type="submit"
													ui-turn-on="modal1"
													class="btn btn-default">Вернуться</button>
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
