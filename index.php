


<!DOCTYPE html>
<html>
<head>
	<title>Pencarian Nomor Kartu</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="col-lg-8" style="float: none;margin: 0 auto;margin-top:5%;">
	<div class="card">
		<div class="card-body">
			<div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Masukan Nomor Kartu</label>
                        <input type="text" class="form-control noka"/>
                        <br/>
                        <button type="button" class="btn btn-primary btn-cari">Cari</button>
                    </div>
                </div>
                <div class="col-lg-6 datane" style="display:none;">
                <table class="table table-striped">
                    <tr>
                    <td>Nama</td><td><span id="nama"></span></td>
                    </tr>
                    <tr>
                    <td>Nomor Kartu</td><td><span id="noka"></span></td>
                    </tr>
                    <tr>
                    <td>Tanggal Lahir</td><td><span id="tgl"></span></td>
                    </tr>
                    <tr>
                    <td>Umur Sekarang</td><td><span id="umur1"></span></td>
                    </tr>
                    <tr>
                    <td>Umur Saat Pelayanan</td><td><span id="umur2"></span></td>
                    </tr>
                    <tr>
                    <td>Faskes TK.1</td><td><span id="faskes"></span></td>
                    </tr>
                </table>
                </div>
            </div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
$(document).on("click",".btn-cari",function(){
    // alert("XXX");
    $.ajax({
        url: "response.php",
        data: {
            q: $(".noka").val()
        },
        method: "POST",
        dataType: "JSON",
        success:function(res){
            console.log(res)
            if(res.status==1){
                var code = res.data.metaData.code;
            console.log(code);
            if(code=="200"){
                $(".datane").show();
                var response = res.data.response.peserta;
                $("#nama").text(response.nama);
                $("#noka").text(response.noKartu);
                $("#tgl").text(response.tglLahir);
                $("#umur1").text(response.umur.umurSekarang);
                $("#umur2").text(response.umur.umurSaatPelayanan);
                $("#faskes").text(response.provUmum.nmProvider);
                
            }else{
                $(".datane").hide();

                alert("Data Not Found");
            }
            }
            else{

                alert("Data Not Found");
            }
     
        }
    })
});
</script>
</body>
</html>