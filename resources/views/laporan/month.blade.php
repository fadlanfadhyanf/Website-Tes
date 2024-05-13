<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Print Data Penjualan</title>
</head>
<style type="text/css">
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
    }
    .subpage {
        padding: 1cm;
        border: 5px black solid;
        height: 257mm;
        outline: 2cm #FFEAEA solid;
    }
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
    table, td ,th{
        border: 1px solid;
    }
    table{
        text-align: center;
        width: 100%;
        border-collapse: collapse;
    }
    h4{
        float: right;
    }
</style>
<body>
@php
      function rupiah($angka){
	
        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
        return $hasil_rupiah;
      
      }
@endphp
<div class="book">
    <div class="page">
        <div class="subpage">
            <center>
                <h2>Laporan Penjualan</h2>
            <table>
                <tr>
                    <th>No</th>
                    <th>Total Penjualan</th>
                    <th>Uang Yang Diterima</th>
                    <th>Tanggal</th>
                </tr>
                @php
                $no = 0;
                @endphp
                @foreach ($transactions as $row)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{rupiah($row->total)}}</td>
                    <td>{{rupiah($row->money_received)}}</td>
                    <td>{{$row->created_at}}</td>
                </tr>
                @endforeach
        </div>    
    </div>

</div>
</body>
</html>
<script type="text/javascript">window.print();</script>