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

<h3>Check In</h3>

<div>
    <form action="{{ route('parkir.check-in.store') }}" method="POST">
        @csrf
        <label for="no_polisi">Nomor Polisi<span class="text-danger"> *</span></label>
        <input type="text" id="no_polisi" name="no_polisi" placeholder="Nomor Polisi" required>

        <label for="waktu_masuk">Tanggal & Jam Masuk<span class="text-danger"> *</span></label>
        <input type="datetime-local" id="waktu_masuk" name="waktu_masuk" placeholder="Tanggal & Jam" required>

        <label for="jenis_kendaraan">Jenis Kendaraan<span class="text-danger"> *</span></label>
        <select id="jenis_kendaraan" name="jenis_kendaraan" required>
            <option value="mobil">Mobil</option>
            <option value="motor">Motor</option>
        </select>

        <input type="submit" value="Check In">
    </form>
</div>

</body>
</html>


