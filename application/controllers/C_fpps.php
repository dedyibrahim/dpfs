<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_fpps extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
         $this->load->model('M_customer');
           
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('html');
        $this->load->helper('url');
        
        $this->load->library('datatables');
        $this->load->model('World_model');
        
    }

        public function index()
	{
           
            redirect('C_fpps/form_fpps');
           
	}
    public function form_fpps(){
        
        $query=$this->db->get('record_number');
       $record = $query->num_rows();
        
            $this->load->view('V_fpps/umum/V_header');
            $this->load->view('V_fpps/umum/V_sidebar');
            $this->load->view('V_fpps/umum/V_top_navigasi');
            $this->load->view('V_fpps/V_form',['record'=>$record]);
            $this->load->view('V_fpps/umum/V_footer');
        
        
        
    }
    public function simpan_customer(){
        
        if(isset($_POST['simpan_customer'])){
            
            $daftar = array(
            'nama_customer'      => $this->input->post('nama_customer'),
            'alamat'             => $this->input->post('alamat'),
            'telp'               => $this->input->post('telp'),
            'project_id'         => $this->input->post('project_id'),
            'contact_person'     => $this->input->post('contact_person'),
            'telp_fax'           => $this->input->post('telp_fax')
           );
            $this->db->insert('customer',$daftar);
            
            redirect('C_fpps/form_fpps');
        }else{
            redirect('C_fpps/form_fpps');
        }
        
    }
    public function get_allcustomer(){
   

        $kode = $this->input->post('customer',TRUE); //variabel kunci yang di bawa dari input text id kode
        $term =strtolower ($_GET['term']); // tambahan baris untuk filtering data
        $query =$this->M_customer->get_allcustomer($term); //query model
 
        $customer    =  array();
        foreach ($query as $d) {
            $json[]     = array(
                'label'                 => $d->nama_customer, //variabel array yg dibawa ke label ketikan kunci
                'id_customer'           => $d->id_customer , //variabel yg dibawa ke id nama
                'nama_customer'         => $d->nama_customer , //variabel yg dibawa ke id nama
                'contact_person'        => $d->contact_person , //variabel yg dibawa ke id nama
                'alamat'                => $d->alamat, //variabel yang dibawa ke id ibukota
                'telp'                  => $d->telp, //variabel yang dibawa ke id ibukota
                'project_id'            => $d->project_id, //variabel yang dibawa ke id ibukota
                'telp_fax'              => $d->telp_fax, //variabel yang dibawa ke id ibukota
            );
        }
        echo json_encode($json);      //data array yang telah kota deklarasikan dibawa menggunakan json
    }

   public function simpan_fpps(){
 if(isset($_POST['btn_fpps'])){
     
     $record_number = array(
            'project_id'    => $this->input->post('record_number'),
        );
         
        $this->db->insert('record_number',$record_number);
     
     $customer_fpps = array(
            'id_customer_fpps_customer'               => $this->input->post('id_customer'),
            'record_number_customer'    => $this->input->post('record_number'),
        );
         
        $this->db->insert('customer_fpps',$customer_fpps);
        
      $jenis_sample = array(
            'record_number_sample'  => $this->input->post('record_number'),
            'data_sample'           => $this->input->post('data_sample'),
            'jumlah_sample'         => $this->input->post('jumlah_sample'),
            'bentuk'                => $this->input->post('bentuk'),
            'deskripsi_sample'      => $this->input->post('deskripsi_sample'),
            'berat_isi'             => $this->input->post('berat_isi'),
            'tgl_penerimaan'        => $this->input->post('tgl_penerimaan'),
            'tgl_sampling'          => $this->input->post('tgl_sampling'),
            'wadah'                 => $this->input->post('wadah'),
        );
         
        $this->db->insert('jenis_sample',$jenis_sample); 
        
        $kaji_ulang_permintaan = array(
            'record_number_kaji_ulang'      => $this->input->post('record_number'),
            'kesiapan_personel'             => $this->input->post('kesiapan_personel'),
            'kondisi_akomodasi'             => $this->input->post('kondisi_akomodasi'),
            'beban_pekerjaan'               => $this->input->post('beban_pekerjaan'),
            'kondisi_peralatan'             => $this->input->post('kondisi_peralatan'),
            'kesesuaian_metode'             => $this->input->post('kesesuaian_metode'),
            
        );
         
        $this->db->insert('kaji_ulang_permintaan',$kaji_ulang_permintaan);
        
         
         
        
        $penjelasan_penerimaan_fpps = array(
            'record_number_penjelasan'             => $this->input->post('record_number'),
            'diberikan_oleh'                       => $this->input->post('diberikan_oleh'),
            'diterima_oleh'                         => $this->input->post('diterima_oleh'),
           
        );
         
        $this->db->insert('penjelasan_penerimaan_fpps',$penjelasan_penerimaan_fpps);
   
    $parameter_penyakit = array(
    'identifikasi_virus'          => !empty($this->input->post('identifikasi_virus'))?$this->input->post('identifikasi_virus'):'&nbsp;',
    'identifikasi_bakteri'        => !empty($this->input->post('identifikasi_bakteri'))?$this->input->post('identifikasi_bakteri'):'&nbsp;',
    'identifikasi_parasit'       =>  !empty($this->input->post('identifikasi_parasit'))?$this->input->post('identifikasi_parasit'):'&nbsp;',
    'identifikasi_logam'          => !empty($this->input->post('identifikasi_logam'))?$this->input->post('identifikasi_logam'):'&nbsp;',
    'record_number_parameter'     => $this->input->post('record_number'),
     );
         
        $this->db->insert('parameter_penyakit',$parameter_penyakit);
    
    /*$i =0;
    
    foreach ($jenis_penyakit as $jenis){
    
        $this->db->insert('parameter_penyakit', 
            array(
                'jenis_penyakit'=>$jenis,
                
                'record_number_parameter'=>($record_number_parameter),
                
                'identifikasi_bakteri'=>(
                !empty($bakteri[$i])? $bakteri[$i]:!NULL),
                
                'identifikasi_parasit'=>(
                !empty($identifikasi_parasit[$i])? $identifikasi_parasit[$i]:!NULL),
               
                'logam_berat'=>(
                !empty($logam_berat[$i])? $logam_berat[$i]:!NULL)
               
            
            
            ));
       $i++;
        
    }*/
     
    
      redirect('C_fpps/daftar_fpps');
      }
      
     
 }
 
 public function daftar_fpps(){
     
     
            $this->load->view('V_fpps/umum/V_header');
            $this->load->view('V_fpps/umum/V_sidebar');
            $this->load->view('V_fpps/umum/V_top_navigasi');
            $this->load->view('V_fpps/V_daftar_fpps');
            $this->load->view('V_fpps/umum/V_footer');
     
 }
 

 public function json() {
        header('Content-Type: application/json');
        echo $this->World_model->json();
    
}
public function hapus_fpps(){
     
     $hapus = $this->uri->segment(3);
   
     
   
    
    $this->db->delete('record_number',['project_id'=>$hapus]);
    $this->db->delete('customer_fpps',['record_number_customer'=>$hapus]);
    $this->db->delete('jenis_sample',['record_number_sample'=>$hapus]);
    $this->db->delete('kaji_ulang_permintaan',['record_number_kaji_ulang'=>$hapus]);
    $this->db->delete('penjelasan_penerimaan_fpps',['record_number_penjelasan'=>$hapus]);
    $this->db->delete('parameter_penyakit',['record_number_parameter'=>$hapus]);
    
    
    redirect('C_fpps/daftar_fpps');
       
      
   
     
     
 }
 
 public function cetak_fpps(){
                
$this->load->library('Mypdf');

$keluar= '/FPPS/SKIPM-MMJ/';

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);     
$pdf->SetCreator(PDF_CREATOR);

$pdf->SetTitle($keluar);
$pdf->SetFont('helvetica', 'B', 20);
        
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('times', '', 12);

$pdf->AddPage();

$html ='<hr>';
$pdf->writeHTML($html, true, false, true, false, '');

$html = '<span align="center">PERMINTAAN PENGUJIAN SAMPEL DAN KAJI ULANG PERMINTAAN'
        . '<br>No:{record_number_customer}/FPPS/SKIPM-MMJ/...../{tahun}</spam>';
$html.='<div style="text-align:left; line-height: 25px;">Nama Pelanggan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {nama_customer}<br>
Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {alamat}<br>
Telp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {telp}<br>
Jumlah Sample&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {jumlah_sample}<br>
Deskripsi Sample&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {deskripsi_sample}<br>
Dalam bentuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {bentuk}<br>
Wadah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {wadah}<br>
Tanggal penerimaan sample&nbsp;&nbsp;: {tgl_penerimaan}<br>
Tanggal sampling&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {tgl_sampling}<br>
Untuk dilakukan pengujian sebagai berikut : <br>

<table cellpadding="1"  style="clear: both; " nobr="true">
<tr style="background-color: #0073ea; ">
  <td colspan="4"  border="1px;" align="center">PARAMETER TERPILIH</td>
 </tr>
 <tr>
  <td border="1px;" align="center">{identifikasi_parasit}</td>
  <td border="1px;" align="center">{identifikasi_bakteri}</td>
  <td border="1px;" align="center">{identifikasi_logam}</td>
  <td border="1px;" align="center">{identifikasi_virus}</td>
 </tr>
   
</table>

</div>';

$html.= <<<EOD
<table cellpadding="2" class="table-striped" style="clear: both;
margin-top: 6px !important;
margin-bottom: 6px !important;
max-width: none !important;
border-collapse: separate !important;
border: 1px solid #ddd;" nobr="true">
 <tr style="background-color: #0073ea;
         box-sizing: border-box;
">
  <td colspan="3" border="1" align="center">KAJI ULANG PERMINTAAN</td>
 </tr>
 <tr>
  <td width="30" align="center">NO</td>
  <td width="390" align="center">UNSUR KAJI ULANG</td>
  <td align="center">HASIL KAJI ULANG</td>
 </tr>
 <tr>
  <td align="center">1</td>
  <td>Kemampuan Personel</td>
  <td>{kesiapan_personel}</td>
 </tr>
 <tr>
  <td align="center">2</td>
  <td>Kondisi Akomodasi</td>
  <td>{kondisi_akomodasi}</td>
 </tr>
<tr>
  <td align="center">3</td>
  <td>Beban Pekerjaan Laboratorium</td>
  <td>{beban_pekerjaan}</td>
 </tr>
<tr>
  <td align="center">4</td>
  <td>Kondisi Peralatan Laboratorium</td>
  <td>{kondisi_peralatan}</td>
 </tr>
  <tr>
  <td align="center">5</td>
  <td>Kesesuaian Metode</td>
  <td>{kesesuaian_metode}</td>
 </tr>
  

   </table>
        
EOD;

$html.='<div style="text-align:left; line-height: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Petugas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pelanggan,<br><br><br>';

$html.='<div style="text-align:left; line-height: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{diberikan_oleh}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{diterima_oleh},<br>';


$ambil = $this->uri->segment(3);    
$this->db->select('*');
$this->db->from('customer_fpps');
$this->db->where('record_number_customer',$ambil);
$this->db->join('jenis_sample','record_number_sample = record_number_customer');
$this->db->join('record_number','project_id = record_number_customer');
$this->db->join('kaji_ulang_permintaan','record_number_kaji_ulang = record_number_customer');
$this->db->join('parameter_penyakit','record_number_parameter = record_number_customer');
$this->db->join('penjelasan_penerimaan_fpps','record_number_penjelasan = record_number_customer');
    
$query = $this->db->get();
foreach($query->result_array() as $cetak);{
$id_customer = $cetak['id_customer_fpps_customer'];
}
$customer_id = $id_customer;
$data_customer = $this->db->get_where('customer',['id_customer'=>$customer_id]);
foreach($query->result_array() as $cetak);{
     $html = str_replace('{tahun}',date("Y"),$html);
     $html = str_replace('{data_sample}',$cetak['data_sample'],$html);
     $html = str_replace('{jumlah_sample}',$cetak['jumlah_sample'],$html);
     $html = str_replace('{record_number_customer}',$cetak['record_number_customer'],$html);
     $html = str_replace('{bentuk}',$cetak['bentuk'],$html);
     $html = str_replace('{tgl_penerimaan}',$cetak['tgl_penerimaan'],$html);
     $html = str_replace('{tgl_sampling}',$cetak['tgl_sampling'],$html);
     $html = str_replace('{deskripsi_sample}',$cetak['deskripsi_sample'],$html);
     $html = str_replace('{kesiapan_personel}',$cetak['kesiapan_personel'],$html);
     $html = str_replace('{kondisi_akomodasi}',$cetak['kondisi_akomodasi'],$html);
     $html = str_replace('{beban_pekerjaan}',$cetak['beban_pekerjaan'],$html);
     $html = str_replace('{kondisi_peralatan}',$cetak['kondisi_peralatan'],$html);
     $html = str_replace('{wadah}',$cetak['wadah'],$html);
     $html = str_replace('{kesesuaian_metode}',$cetak['kesesuaian_metode'],$html);
     $html = str_replace('{kesesuaian_biaya}',$cetak['kesesuaian_biaya'],$html);
     $html = str_replace('{diberikan_oleh}',$cetak['diberikan_oleh'],$html);
     $html = str_replace('{diterima_oleh}',$cetak['diterima_oleh'],$html);
     $html = str_replace('{identifikasi_bakteri}',$cetak['identifikasi_bakteri'],$html);
     $html = str_replace('{identifikasi_parasit}',$cetak['identifikasi_parasit'],$html);
     $html = str_replace('{identifikasi_virus}',$cetak['identifikasi_virus'],$html);
     $html = str_replace('{identifikasi_logam}',$cetak['identifikasi_logam'],$html);

     
}
foreach ($data_customer->result_array() as $data_cs){
     $html = str_replace('{nama_customer}',$data_cs['nama_customer'],$html);
     $html = str_replace('{alamat}',$data_cs['alamat'],$html);
      $html = str_replace('{telp}',$data_cs['telp'],$html);
     
   }
$pdf->writeHTML($html, true, false, true, false, '');
   
$pdf->Output($keluar.'.pdf', 'I');


 }
 
 
 public function edit(){
if(isset($_POST['btn_fpps'])){
     $id = $this->uri->segment(3);
     
           
     $record_number = array(
            'project_id'    => $this->input->post('record_number'),
        );
         
    $this->db->update('record_number', $record_number, array('project_id' => $id)); 
    
        
      $jenis_sample = array(
            'record_number_sample'  => $this->input->post('record_number'),
            'data_sample'           => $this->input->post('data_sample'),
            'jumlah_sample'         => $this->input->post('jumlah_sample'),
            'bentuk'                => $this->input->post('bentuk'),
            'deskripsi_sample'      => $this->input->post('deskripsi_sample'),
            'berat_isi'             => $this->input->post('berat_isi'),
            'tgl_penerimaan'        => $this->input->post('tgl_penerimaan'),
            'tgl_sampling'          => $this->input->post('tgl_sampling'),
            'wadah'                 => $this->input->post('wadah'),
        );
         
        $this->db->update('jenis_sample',$jenis_sample, array('record_number_sample' => $id)); 
        
        $kaji_ulang_permintaan = array(
            'record_number_kaji_ulang'      => $this->input->post('record_number'),
            'kesiapan_personel'             => $this->input->post('kesiapan_personel'),
            'kondisi_akomodasi'             => $this->input->post('kondisi_akomodasi'),
            'beban_pekerjaan'               => $this->input->post('beban_pekerjaan'),
            'kondisi_peralatan'             => $this->input->post('kondisi_peralatan'),
            'kesesuaian_metode'             => $this->input->post('kesesuaian_metode'),
            'kesesuaian_biaya'              => $this->input->post('kesesuaian_biaya'),
        );
         
        $this->db->update('kaji_ulang_permintaan',$kaji_ulang_permintaan, array('record_number_kaji_ulang' => $id));
        
        $penjelasan_penerimaan_fpps = array(
            'record_number_penjelasan'             => $this->input->post('record_number'),
            'diberikan_oleh'                       => $this->input->post('diberikan_oleh'),
            'diterima_oleh'                         => $this->input->post('diterima_oleh'),
           
        );
         
        $this->db->update('penjelasan_penerimaan_fpps',$penjelasan_penerimaan_fpps, array('record_number_penjelasan' => $id));
   
    $parameter_penyakit = array(
    'identifikasi_virus'          => !empty($this->input->post('identifikasi_virus'))?$this->input->post('identifikasi_virus'):'&nbsp;',
    'identifikasi_bakteri'        => !empty($this->input->post('identifikasi_bakteri'))?$this->input->post('identifikasi_bakteri'):'&nbsp;',
    'identifikasi_parasit'       =>  !empty($this->input->post('identifikasi_parasit'))?$this->input->post('identifikasi_parasit'):'&nbsp;',
    'identifikasi_logam'          => !empty($this->input->post('identifikasi_logam'))?$this->input->post('identifikasi_logam'):'&nbsp;',
    'record_number_parameter'     => $this->input->post('record_number'),
        );
         
        $this->db->update('parameter_penyakit',$parameter_penyakit ,array('record_number_parameter' => $id));
  
    
       redirect('C_fpps/edit/'.$this->uri->segment(3));
      }else{
      
$ambil = $this->uri->segment(3);    
$this->db->select('*');
$this->db->from('customer_fpps');
$this->db->where('record_number_customer',$ambil);
$this->db->join('jenis_sample','record_number_sample = record_number_customer');
$this->db->join('record_number','project_id = record_number_customer');
$this->db->join('kaji_ulang_permintaan','record_number_kaji_ulang = record_number_customer');
$this->db->join('penjelasan_penerimaan_fpps','record_number_penjelasan = record_number_customer');
$this->db->join('parameter_penyakit','record_number_parameter = record_number_customer');
$query = $this->db->get();

//ambil customer data//

foreach($query->result_array() as $cetak);{

    $id_customer = $cetak['id_customer_fpps_customer'];
}
$customer_id = $id_customer;
$data_customer = $this->db->get_where('customer',['id_customer'=>$customer_id]);


            $this->load->view('V_fpps/umum/V_header');
            $this->load->view('V_fpps/umum/V_sidebar');
            $this->load->view('V_fpps/umum/V_top_navigasi');
            $this->load->view('V_fpps/V_edit',['query'=>$query,'data_customer'=>$data_customer]);
            $this->load->view('V_fpps/umum/V_footer');
         
     
      } 
 }

}