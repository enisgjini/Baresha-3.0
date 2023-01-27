<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script>
        $(document).ready(function() {
            $("#print-button").click(function() {
                $.ajax({
                    type: "GET",
                    url: "faturat2.php",
                    dataType: "json",
                    success: function(data) {
                        // Build and style the table with the retrieved data
                        // ...
                        // Print the table
                        window.print();
                    },
                    error: function() {
                        console.log("Error retrieving data");
                    }
                });
            });
        });
    </script>
</body>



</html>