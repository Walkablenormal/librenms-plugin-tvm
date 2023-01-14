<html>
    <head>
    <!-- Inline minified CSS stylesheet for table -->
    <style>
        #tvm_filter,#tvm_table{width:100%;border:1px solid #e9e9e9;font-size:15px}*{box-sizing:border-box}#tvm_filter{padding:12px 20px 12px 10px;margin-bottom:12px}#tvm_table{border-collapse:collapse}#tvm_table td,#tvm_table th{text-align:left;padding:8px;border:1px solid #000}#tvm_table tr{border:1px solid #000}#tvm_table tr.header,#tvm_table tr:hover{background-color:#f1f1f1}
    </style>
    </head>
    <body>
        
        <?php
        // SET THE VALUE OF THE VARIABLE TO THE FULL PATH TO THE .CSV-FILE.
        $csv = '/opt/librenms/html/plugins/Data/file.csv';

        if (!empty($csv)) {
            echo "<h2>Welcome to the Task Verification Monitor</h2>";
            echo "<input type='text' id='tvm_filter' onkeyup='filterFunction()' placeholder='Search for devices..'>";
        $firstLineFlag = True;
        echo "<table id='tvm_table'>\n\n";
        $f = fopen($csv, "r");
        while (($line = fgetcsv($f)) !== false) {
            if ($firstLineFlag) {
                $firstLineFlag = false;        
                echo "<tr class='header'>";
            } else {
                echo "<tr>";
            }
            foreach ($line as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>\n";
        }
        fclose($f);

        echo "\n</table>";
    } else {
            echo "<br></br>";
            echo "<h3 style='text-align:center;'> It seems like you forgot to set the CSV-variable in Tvm.inc.php. </h3>";
            echo "<h3 style='text-align:center;'> The variable should contain the full path to the CSV-file you want to read. </h3>";       
        }
        ?>

            <!-- Javascript for cell colour-coding and cell filtering -->
    <script>
    const tableCells = document.querySelectorAll("td");
    tableCells.forEach((cell) => {
        if (cell.textContent === "False") {
            // Red with 40% opacity
            cell.style.backgroundColor = "rgba(250, 50, 50, 0.4)";
        }
        if (cell.textContent === "True") {
            // Green with 40% opacity
            cell.style.backgroundColor = "rgba(50, 205, 50, 0.4)";
        }
        if (cell.textContent === "Unknown") {
            // Yellow with 40% opacity
            cell.style.backgroundColor = "rgba(250, 250, 51, 0.4)";
        }
    });
    
    function filterFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("tvm_filter");
        filter = input.value.toUpperCase();
        table = document.getElementById("tvm_table");
        tr = table.getElementsByTagName("tr");
        
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    </script>
    </body>
</html>