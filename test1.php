<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recreated Table with Input Boxes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table td, .table th {
            vertical-align: middle;
            text-align: center;
        }
        .table th {
            font-weight: bold;
        }
        .table-input {
            width: 80px;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="7">1.2 Professional Growth (Maximum points – 80)</th>
                    <th>20</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="7">1.2.1 Advanced Training</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="6">MAM-S - 1 pt/6units</td>
                    <td>MAM-MS + SO - 40 points</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="7">1.2.2 Seminars (Maximum points – 25)</td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="2">International</td>
                    <td>Attended</td>
                    <td>2pts/8hrs</td>
                    <td>Echoed</td>
                    <td>3pts/8hrs</td>
                    <td>In Related Field</td>
                    <td>1pt/8hrs</td>
                    <td rowspan="2"></td>
                </tr>
                <tr>
                    <td>National</td>
                    <td>1pt/8hrs</td>
                    <td>2pts/8hrs</td>
                    <td>1<sup>2</sup> pt/8hrs</td>
                </tr>
                <tr>
                    <td rowspan="2">Regional</td>
                    <td>0.5pts/8hrs</td>
                    <td>1pt/8hrs</td>
                    <td><sup>1</sup>/<sub>4</sub> pt/8hrs</td>
                    <td rowspan="2"></td>
                </tr>
                <tr>
                    <td>Local</td>
                    <td>0.25pts/8hrs</td>
                    <td>0.5pts/8hrs</td>
                    <td><sup>1</sup>/<sub>8</sub> pt/8hrs</td>
                </tr>
                <tr>
                    <td colspan="7">1.2.3 As Resource Speaker (Maximum points – 15)</td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="2">Trainer / day</td>
                    <td>Nat'l</td>
                    <td>10</td>
                    <td>Reg'l</td>
                    <td>8</td>
                    <td>Prov'l</td>
                    <td>6</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>Resource Speaker/topic</td>
                    <td>8</td>
                    <td>6</td>
                    <td>5</td>
                    <td>3</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td colspan="7">1.2.4 Completed Certificate of Proficiency (Maximum of 5 points)</td>
                    <td>25</td>
                </tr>
                <tr>
                    <td colspan="7">2. TEACHING EXPERIENCE</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td colspan="7">2.1 Status of Employment (Maximum points – 100)</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="8">
                        <div class="d-flex justify-content-center">
                            <input type="text" class="form-control table-input mx-1" />
                            <input type="text" class="form-control table-input mx-1" />
                            <input type="text" class="form-control table-input mx-1" />
                            <input type="text" class="form-control table-input mx-1" />
                            <input type="text" class="form-control table-input mx-1" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <div class="d-flex justify-content-center">
                            <input type="text" class="form-control table-input mx-1" />
                            <input type="text" class="form-control table-input mx-1" />
                            <input type="text" class="form-control table-input mx-1" />
                            <input type="text" class="form-control table-input mx-1" />
                            <input type="text" class="form-control table-input mx-1" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <div class="d-flex justify-content-center">
                            <input type="text" class="form-control table-input mx-1" />
                            <input type="text" class="form-control table-input mx-1" />
                            <input type="text" class="form-control table-input mx-1" />
                            <input type="text" class="form-control table-input mx-1" />
                            <input type="text" class="form-control table-input mx-1" />
                        </div>
                    </td>
                </tr>
                <!-- Repeat the input rows as needed -->
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
