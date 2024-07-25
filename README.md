Here's a README file for your project:

---

# Form to PDF Converter

This project converts form data into a PDF on submit and allows the user to download the file to their computer. It uses the [mPDF library](https://github.com/mpdf/mpdf) for generating PDFs in PHP.

## Files

1. **data-form.php**: Contains the HTML form for user input.
2. **process.php**: Processes the form data, generates the PDF, and initiates the download.

## Setup

1. **Clone the repository:**

   ```bash
   git clone https://github.com/your-repository.git
   cd your-repository
   ```

2. **Install mPDF:**

   You can install mPDF via Composer. If you don't have Composer installed, you can download it from [here](https://getcomposer.org/).

   ```bash
   composer require mpdf/mpdf
   ```

3. **Create `data-form.php`:**

   ```php

   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            background-color: #f8f9fa;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
        .btn-custom {
            background-color: #007bff;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="form-header">Contact Us</h2>
            <form method="post" action="process.php">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter your message" required></textarea>
                </div>
                <button type="submit" class="btn btn-custom btn-block">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
?>
   ```

4. **Create `process.php`:**

   ```php
   <?php
    $path = (getenv("MPDF_ROOT")) ? getenv("MPDF_ROOT") : __DIR__;
//   var_dump($path);die;
  require_once $path . "/vendor/autoload.php";
  $pdfcontent = '<table class="form-data"><thead><tr> </tr></thead><tbody>';
  foreach($_POST as $key =>$value){
      $pdfcontent .= "<tr><td>" . ucwords(str_replace("_", " ",$key)) . "</td>:<td>" . $value . "</td></tr>";
  }
  $pdfcontent .= "</tbody></table>";
  $mpdf = new \Mpdf\Mpdf();
  $mpdf->WriteHTML(utf8_encode($pdfcontent));
  $mpdf->Output('formdata.pdf', 'D');
   ?>
   ```

## Usage

1. **Open `data-form.php` in your browser.**
2. **Fill out the form and submit.**
3. **The form data will be converted into a PDF and downloaded to your computer.**

## Credits

- This project uses the [mPDF library](https://github.com/mpdf/mpdf) for generating PDFs.
- Created by Umar Khtab (umarkhtab.te@gmail.com).

---

You can adjust the repository URL and other details as needed.