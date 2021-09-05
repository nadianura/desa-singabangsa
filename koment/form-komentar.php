
<li class='list-group-item'>
                        <div class='row'>
						<div class='col-xs-2 col-md-2'>
						</div>
						<div class='col-xs-5 col-md-4'>
<!-- form komentar -->
	<form role="form" method='POST' action='insert-komentar.php'> 
				 <div class="register-top-grid">					
                                       
					 <div class="form-group">
						<span>Subyek<label>*</label></span>
						<input id="titel komentar" name="judulk" class="form-control" placeholder="judul komentar anda" required="required" type="text">    						    
					 </div>
					 <div class="form-group">
						<span>Nama<label>*</label></span>
						<input id="nama" name="nama" placeholder="Nama" class="form-control" required="required" type="text">
					 </div>
					 <div class="form-group">
						 <span>Web / blog</span>
						 <input id="web" name="web" placeholder="url web atau blog anda..." class="form-control" type="text">    
					 </div>
					 <div class="form-group">
						 <span>Email</span>
						 <input id="email" name="email" placeholder="valid email" class="form-control" required="required" type="text">
						 <input id="id" name="id" value="<?php echo $id;?>" class="input-xlarge" type="hidden">
					 </div>
					 
						 <span>Komentar</span>
						 <textarea id="komentar" placeholder="komentar" name="komentar" class="form-control"></textarea><br/>                     						 
					   <input type="submit" class="btn btn-primary" value="submit">					 
					 </div>
				     
				</form>
	</div>
	</div>
	</li>
<!-- form komentar selesai -->