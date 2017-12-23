<div class="x_panel">
 <div class="x_content">
    <div class="x_title">
  
 <!--------- end input customer--------------->     
     
 <form action="http://localhost/mamuju/C_fpps/simpan_fpps" method="post" enctype="multipart/formdata">
    <h2>Form Anamnesa</h2>
        <ul class="nav navbar-right panel_toolbox">
           <li><input class="form-control"  readonly="" name="record_number" placeholder="record number" type="text">
                </li>
                    </ul>              
<div class="clearfix"></div>
 </form>
     
    </div> 
            <form class="form-horizontal form-label-left">
           
   <div class="col-md-6">
       
     <div class="form-group">
         <label>Nama Customer</label>
            <input type="text" class="form-control" placeholder="Nama customer">
     </div>
     <div class="form-group">
         <label>Jenis Sample</label>
            <input type="text" class="form-control" placeholder="Jenis Sample">
     </div>
       <div class="col-md-6">   
     <div class="form-group">
         <label>Kode Contoh Uji</label>
            <input type="text" class="form-control" placeholder="Jenis Sample">
     </div></div>
       <div class="col-md-6"> 
      <div class="form-group">
         <label>Nomor urut</label>
            <input type="text" class="form-control" placeholder="Nomor urut">
     </div>     
       </div>
        </div>
    <div class="col-md-6">
        <label>Kode Jenis Contoh uji : </label><br>
         
                <label>
                    <input value="Klinis" name="jenis_penyakit[]" type="checkbox"> Bakteri<br>
                </label>
                 <label>
                    <input value="TSV" name="jenis_penyakit[]" type="checkbox"> Parasit<br>
                </label>
                <label>
                    <input value="IMNV" name="jenis_penyakit[]" type="checkbox"> Jamur<br>
                </label>
                <label>
                    <input value="KHV" name="jenis_penyakit[]" type="checkbox"> Virus<br>
                </label>
                <label>
                    <input value="VNN" name="jenis_penyakit[]" type="checkbox"> KUalitas air<br>
                </label>
               <label>
                   <input value="VNN" name="jenis_penyakit[]" type="checkbox"> Logam berat<br>
                </label>
        <label>
            <input type="text" class="form-control" placeholder="Lainnya"></label>
     </div>
    </div>    
       
 </div>