<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expandable Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        /* Expandable Button Styling */
        .expand-btn {
            cursor: pointer;
            background: darkorange;
            color: white;
            padding: 10px 15px; /* Reduced height */
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1rem;
            font-weight: bold;
            transition: background 0.3s ease-in-out, transform 0.2s;
        }
        .expand-btn:hover {
            transform: scale(1.02);
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.01);
        }

        /* Table Styling */
        .table-container {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 8px;
        }

        /* Icon Transition */
        .toggle-icon {
            transition: transform 0.3s ease-in-out;
        }
        .collapsed .toggle-icon {
            transform: rotate(0deg);
        }
        .toggle-icon.rotate {
            transform: rotate(180deg);
        }
    </style>
</head>
<body class="bg-light">

<div class="container mt-4">
    <!-- Director Section -->
    <div class="card mb-3">
        <div class="card-header expand-btn" data-bs-toggle="collapse" data-bs-target="#DirectorTable">
            <span>Director</span>
            <span><i class="bi bi-chevron-down toggle-icon"></i></span>
        </div>
        <div class="collapse table-container" id="DirectorTable">
            <table class="table table-hover table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Tel.no. (Code: 0522)</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dr. Ajit Kumar Shasany</td>
                        <td>Director</td>
                        <td>2297802, 04</td>
                        <td>director@nbri.res.in</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Chief Scientist Section -->
    <div class="card mb-3">
        <div class="card-header expand-btn" data-bs-toggle="collapse" data-bs-target="#ChiefScientistTable">
            <span>Chief Scientist</span>
            <span><i class="bi bi-chevron-down toggle-icon"></i></span>
        </div>
        <div class="collapse table-container" id="ChiefScientistTable">
            <table class="table table-hover table-bordered">
                <thead class="table-success">
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Tel.no. (Code: 0522)</th>
                        <th>Email</th>
                        <th>Area</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dr. Ajit Kumar Shasany</td>
                        <td>Director</td>
                        <td>2297802, 04</td>
                        <td>director@nbri.res.in</td>
                        <td>Botany</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Senior Scientist Section -->
    <div class="card mb-3">
        <div class="card-header expand-btn" data-bs-toggle="collapse" data-bs-target="#SeniorScientistTable">
            <span>Senior Scientist</span>
            <span><i class="bi bi-chevron-down toggle-icon"></i></span>
        </div>
        <div class="collapse table-container" id="SeniorScientistTable">
            <table class="table table-hover table-bordered">
                <thead class="table-danger">
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Tel.no. (Code: 0522)</th>
                        <th>Email</th>
                        <th>Area</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dr. Ajit Kumar Shasany</td>
                        <td>Director</td>
                        <td>2297802, 04</td>
                        <td>director@nbri.res.in</td>
                        <td>Botany</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- principal scientist section --}}
    <div class="card mb-3">
        <div class="card-header expand-btn" data-bs-toggle="collapse" data-bs-target="#PrincipalScientistTable">
            <span>Principal Scientist</span>
            <span><i class="bi bi-chevron-down toggle-icon"></i></span>
        </div>
        <div class="collapse table-container" id="PrincipalScientistTable">
            <table class="table table-hover table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Tel.no. (Code: 0522)</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dr. Ajit Kumar Shasany</td>
                        <td>Director</td>
                        <td>2297802, 04</td>
                        <td>director@nbri.res.in</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    {{-- scientist --}}
    <div class="card mb-3">
        <div class="card-header expand-btn" data-bs-toggle="collapse" data-bs-target="#ScientistTable">
            <span> Scientist</span>
            <span><i class="bi bi-chevron-down toggle-icon"></i></span>
        </div>
        <div class="collapse table-container" id="ScientistTable">
            <table class="table table-hover table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Tel.no. (Code: 0522)</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dr. Ajit Kumar Shasany</td>
                        <td>Director</td>
                        <td>2297802, 04</td>
                        <td>director@nbri.res.in</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(".expand-btn").click(function(){
            var icon = $(this).find(".toggle-icon");
            icon.toggleClass("rotate");
        });
    });
</script>

</body>
</html>
