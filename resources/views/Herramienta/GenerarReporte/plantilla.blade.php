<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Reporte</title>

    <style>
        clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 20cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid  #5D6975;
            border-bottom: 1px solid  #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url();
        }

        #project {

            float: left;
            text-align: left;
        }
        #company {
            float: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;;
        }
        #firma{
            height: 345px;
            color: #5D6975;
            text-align: center;
            border-top: 20px;
            position: relative;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }


    </style>

</head><body><header class="clearfix">
    <div id="logo">
        <img src="img/doc.png">
    </div>
    <h1>Reporte de Documentos</h1>
    <div id="company" class="clearfix">
        <div>Nombre Institucion: PACEÑA</div>
        <div>Direccion: Km14 /Doble Via</div>
        <div>Telefono +591 3 3339999 </div>
        <div><a href="mailto:company@example.com">paceña@info.com</a></div>
    </div><div id="project">
    </div>
    <br>
    <br>
</header>
<br>
<br><main>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th class="service">Descripcion</th>
            <th class="service">Extension</th>
            <th class="service">Categoria</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach($data as $op){ ?>

        <tr>
            <td class="service"><?= $op->descripcion ?></td>
            <td class="service"><?= $op->extension ?></td>
            <td class="service"><?= $op->categoria  ?></td>

        </tr>

        <?php } ?>

        </tbody></table></main><footer>firma del responsable</footer></body></html>