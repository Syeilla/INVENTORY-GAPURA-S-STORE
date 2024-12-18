<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Print Example</title>
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #myForm, #myForm * {
                visibility: visible;
            }
            #myForm {
                position: absolute;
                top: 0;
                left: 0;
            }
        }
    </style>
</head>
<body>
    <form id="myForm">
        <h2>Form Example</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <button type="button" onclick="printForm()">Print Form</button>
    </form>

    <script>
        function printForm() {
            window.print();
        }
    </script>
</body>
</html>
