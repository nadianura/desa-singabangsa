<!-- tampilkan komentar -->
	
 <div class="panel-body">
      <ul class="list-group">
		<?php
		
		$skomentar = "SELECT * from komentar where id='$id' and flag='1'";
		$selectkmt = mysql_query($skomentar);
		while($select_result = mysql_fetch_array($selectkmt))
		{
		$idk					= $select_result['idk'] ;
		$nama					= $select_result['nama'] ;
		$web					= $select_result['web'] ;
		$komentar				= $select_result['komentar'] ;
		$judulk					= $select_result['judulk'] ;
		$tglk					= $select_result['tglk'] ;
        $avatar					= $select_result['avatar'] ;
		echo"

                    <li class='list-group-item'>
                        <div class='row'>
                            <div class='col-xs-2 col-md-1'>
                                <img src='$avatar' class='img-circle img-responsive' alt='avatar user' /></div>
                            <div class='col-xs-10 col-md-11'>
                                <div>
                                    <div><span class='label label-info'>$judulk</span></div>
                                    <div class='mic-info'>
                                        oleh: <a href='$web'>$nama</a> tanggal: $tglk
                                    </div>
                                </div>
                                <div class='comment-text'>
                                    $komentar
                                </div>               
							
                            </div>
                        </div>
                    </li>
            ";}  ?>      
                </ul>                
            </div>
        </div>
    </div>
	<!-- komentar selesai -->