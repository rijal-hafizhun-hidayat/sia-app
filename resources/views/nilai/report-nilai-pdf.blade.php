<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, th, td {
          border:1px solid black;
          border-collapse: collapse;
        }
    </style>
</head>
<body>
    @foreach ($mapels as $mapel)
        <p>Kelas: {{ $mapel->kelas->nama }}</p>
        <p>Tahun Ajaran: {{ $mapel->kelas->tahun_ajaran }}</p>
        <p>Mata Pelajaran: {{ $mapel->nama }}</p>
        <p>Hari: {{ $mapel->hari }} ({{ $mapel->schedule_start_at }} - {{ $mapel->schedule_end_at }})</p>

        <table style="width:100%">
            <tr>
                <th>Nama Siswa</th>
                <th>Nilai UTS</th> 
                <th>Nilai UAS</th>
            </tr>
            @foreach ($mapel->nilai as $nilai)
                <tr>
                    <td>{{ $nilai->user->nama }}</td>
                    <td>{{ $nilai->nilai_uts }}</td>
                    <td>{{ $nilai->nilai_uas }}</td>
                </tr>
            @endforeach
        </table>
    @endforeach
</body>
</html>