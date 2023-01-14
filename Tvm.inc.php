<?php
$firstLineFlag = True;

echo "<input type='text' id='tvm_filter' onkeyup='filterFunction()' placeholder='Search for devices..'>";

echo "<html><body><table id='tvm_table'>\n\n";
$f = fopen("/opt/librenms/html/plugins/Data/file.csv", "r");
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
echo "\n</table></body></html>";

?>

<style>
* {
  box-sizing: border-box;
}

#tvm_filter {
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #e9e9e9;
  margin-bottom: 12px;
}

#tvm_table {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #e9e9e9;
  font-size: 18px;
}

#tvm_table th, #tvm_table td {
  text-align: left;
  padding: 12px;
}

#tvm_table tr {
  border-bottom: 1px solid #e9e9e9;
}

#tvm_table tr.header, #tvm_table tr:hover {
  background-color: #f8f8f8;
}

</style>

<script>

const tableCells = document.querySelectorAll("td");

tableCells.forEach((cell) => {
    if (cell.textContent === "False") {
        cell.style.backgroundColor = "rgba(250, 50, 50, 0.4)";
    }
    if (cell.textContent === "True") {
        cell.style.backgroundColor = "rgba(50, 205, 50, 0.4)";
    }
    if (cell.textContent === "Unknown") {
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