<!DOCTYPE html>
<html>
<head>
<style>
#parkir {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#parkir td, #parkir th {
  border: 1px solid #ddd;
  padding: 8px;
}

#parkir tr:nth-child(even){background-color: #f2f2f2;}

#parkir tr:hover {background-color: #ddd;}

#parkir th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Report Parkir</h1>

<table id="parkir">
    <tr>
        <th>Nomor Polisi</th>
        <th>Tanggal Masuk</th>
        <th>Jam Masuk</th>
        <th>Tanggal Keluar</th>
        <th>Jam Keluar</th>
        <th>Jenis Kendaraan</th>
        <th>Biaya Parkir</th>
    </tr>
    @foreach ($parkirs as $item)
    <tr>
        <td>{{ $item->no_polisi }}</td>
        <td>{{ date('d/m/Y', strtotime($item->waktu_masuk)) }}</td>
        <td>{{ date('H:i A', strtotime($item->waktu_masuk)) }}</td>
        <td>{{ $item->waktu_keluar ? date('d/m/Y', strtotime($item->waktu_keluar)) : "-" }}</td>
        <td>{{ $item->waktu_keluar ? date('H:i A', strtotime($item->waktu_keluar)) : "-" }}</td>
        <td>{{ $item->jenis_kendaraan }}</td>
        <td>{{ $item->biaya ? "Rp. " . number_format($item->biaya) : "-" }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>


