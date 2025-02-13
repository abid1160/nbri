<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .profile-card {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
        }

        .profile-img-container {
            width: 200px;
            height: 270px;
            border-radius: 10px;
            overflow: hidden;
            background: white;
        }

        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .form-label {
            color: var(--primary-color);
            font-weight: bold;
        }

        .accordion-button {
            background-color: var(--secondary-color);
            color: white;
        }

        .accordion-button:hover {
            background-color: var(--primary-color);
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card profile-card">
        <!-- Profile Header -->
        <div class="row d-flex align-items-center gap-2">
            <div class="col-md-3 text-center">
                <div class="profile-img-container ">
                    <img src="{{ asset('uploads/bookingimages/1739424698.jpg') }}" class="profile-img" alt="Profile Image">
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-borderless">
                    <tbody>
                        <tr>

                            
                        </tr>
                        <tr>
                            <td class="form-label">Full Name:</td>
                            <td class="form-label">Arvind Singh Negi</td>
                        </tr>
                        <tr>
                            <td class="form-label">Designation:</td>
                            <td class="form-label">Chief Scientist</td>
                        </tr>
                        <tr>
                            <td class="form-label">Address:</td>
                            <td class="form-label">CSIR-CIMAP Kukrail Picnic Spot Road, Lucknow 226015, India</td>
                        </tr>
                        <tr>
                            <td class="form-label">Email Address:</td>
                            <td class="form-label">as.negi@cimap.res.in</td>
                        </tr>
                        <tr>
                            <td class="form-label">Contact Number:</td>
                            <td class="form-label">9452158129</td>
                        </tr>
                        <tr>
                            <td class="form-label">Epabx Number:</td>
                            <td class="form-label">583</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-end">
                    <a href="#" class="btn btn-danger" onclick="downloadPDF()">
                        <i class="fas fa-file-pdf me-2"></i>Download Resume
                    </a>
                </div>
            </div>
        </div>

        <!-- Profile Details Accordion -->
        <div class="accordion mt-4" id="profileAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#specialization">
                        Area of Specialization
                    </button>
                </h2>
                <div id="specialization" class="accordion-collapse collapse show" data-bs-parent="#profileAccordion">
                    <div class="accordion-body">
                        Content about the employee's area of specialization.
                    </div>
                </div>
            </div>
        
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#academic">
                        Academic/Research Experience
                    </button>
                </h2>
                <div id="academic" class="accordion-collapse collapse show" data-bs-parent="#profileAccordion">
                    <div class="accordion-body">
                        Content about the employee's academic/research experience.
                    </div>
                </div>
            </div>
        
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#education">
                        Education
                    </button>
                </h2>
                <div id="education" class="accordion-collapse collapse" data-bs-parent="#profileAccordion">
                    <div class="accordion-body">
                        Content about the employee's education.
                    </div>
                </div>
            </div>
        
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#honours-awards">
                        Honours and Awards
                    </button>
                </h2>
                <div id="honours-awards" class="accordion-collapse collapse" data-bs-parent="#profileAccordion">
                    <div class="accordion-body">
                        Content about the employee's honours and awards.
                    </div>
                </div>
            </div>
        
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#publication">
                        Publication
                    </button>
                </h2>
                <div id="publication" class="accordion-collapse collapse" data-bs-parent="#profileAccordion">
                    <div class="accordion-body">
                        Content about the employee's publications.
                    </div>
                </div>
            </div>
        
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#patent">
                        Patent
                    </button>
                </h2>
                <div id="patent" class="accordion-collapse collapse" data-bs-parent="#profileAccordion">
                    <div class="accordion-body">
                        Content about the employee's patents.
                    </div>
                </div>
            </div>
        </div>
        

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
