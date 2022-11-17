<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=datetime-local], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=number], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.text-danger {
    color: red;
}
</style>
<body>

<h3>Check Out</h3>

<div>
    @if ($parkir)
        <form method="POST" action="{{ route('parkir.check-out.update', $parkir->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="no_polisi">Nomor Polisi<span class="text-danger"> *</span></label>
            <input type="text" id="no_polisi" name="no_polisi" placeholder="Nomor Polisi" required value="{{ $parkir->no_polisi }}">

            <label for="waktu_masuk">Tanggal & Jam Masuk<span class="text-danger"> *</span></label>
            <input type="datetime-local" value="{{ $parkir->waktu_masuk }}" id="waktu_masuk" name="waktu_masuk" required>

            <label for="jenis_kendaraan">Jenis Kendaraan<span class="text-danger"> *</span></label>
            <select id="jenis_kendaraan" name="jenis_kendaraan" required>
                <option value="mobil" {{ $parkir->jenis_kendaraan == 'mobil' ? 'selected' : '' }}>Mobil</option>
                <option value="motor" {{ $parkir->jenis_kendaraan == 'motor' ? 'selected' : '' }}>Motor</option>
            </select>

            <label for="waktu_keluar">Tanggal & Jam Keluar<span class="text-danger"> *</span></label>
            <input type="datetime-local" id="waktu_keluar" name="waktu_keluar" required>

            <label for="biaya">Biaya Parkir<span class="text-danger"> *</span></label>
            <input type="number" id="biaya" name="biaya" placeholder="5000" required readonly>

            <input type="submit" value="Check Out">
        </form>
    @else
        <form action="{{ route('parkir.check-out.cari') }}" method="POST">
            @csrf
            <label for="no_polisi">Nomor Polisi<span class="text-danger"> *</span></label>
            <input type="text" id="no_polisi" name="no_polisi" placeholder="Nomor Polisi" required>

            <input type="submit" value="Cari">
        </form>
    @endif
</div>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $('input[name=waktu_keluar]').change(function() {
        var waktu_masuk = $('input[name=waktu_masuk]').val();
        var waktu_keluar = $('input[name=waktu_keluar]').val();
        waktu_masuk = waktu_masuk.split('T')[1];
        waktu_keluar = waktu_keluar.split('T')[1];
        var hours = waktu_keluar.split(':')[0] - waktu_masuk.split(':')[0];
        var minutes = waktu_keluar.split(':')[1] - waktu_masuk.split(':')[1];

        if (waktu_masuk <= "12:00:00" && waktu_keluar >= "13:00:00"){
            a = 1;
        }else {
            a = 0;
        }
        minutes = minutes.toString().length<2?'0'+minutes:minutes;
        if(minutes<0){
            hours--;
            minutes = 60 + minutes;
        }

        if(hours === 0){
            var biaya = 5000;
        }else if(hours >= 1){
            var biaya = 5000 + (hours * 4000);
        }

        $('#biaya').val(biaya);
     });

</script>


