<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Pelanggan Baru</title>
</head>
<body>
    <p>Pelanggan baru bernama <b>{{$data['nama']}}</b> :</p>
    <table>
      <tr>
        <td>Phone</td>
        <td>:</td>
        <td>{{$data['phone']}}</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td>{{$data['email']}}</td>
      </tr>
      <tr>
        <td>Komentar</td>
        <td>:</td>
        <td>{{$data['message']}}</td>
      </tr>
    </table>
</body>
</html>